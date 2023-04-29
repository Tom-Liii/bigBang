import json
with open('index.html', 'rb') as fp:
    html = fp.read()
house = {}
async def application(scope, receive, send):

    if scope['type'] == 'websocket':#接受类似一级头文件的东西,看看是不是websocket类型的东西
        event = await receive()#接受类似二级头文件的东西

        if event['type'] != 'websocket.connect':#看看是不是websocket类型的东西
            return#不是就直接结束
        
        await send({'type': 'websocket.accept'})#是的话告诉server我准备好了
        event = await receive()#接受剩余信息
        data = json.loads(event['text'])#格式转化为JSON

        #如果数据里*没有*玩家id, 房间号, 或种类*不是*EnterRoom
#需要接收信息......ok
        if data['type'] != 'EnterRoom' or not data['id'] or not data['room']:
            await send({'type': 'websocket.close', 'code': 403})
            return
        
        room_id = data['room']#记录房间id
        user_id = data['id']#记录玩家id

        if room_id not in house:#如果给的房间号还没有被创建, 在id位置创建一个新的房间
            house[room_id] = {#这是个dictionary
                'black': None,
                'white': None,
                'boardStatus': [],#改了
                'sends': [],
                'users': [],
                'movement': [],###
                'turn': 1,
                'winner': None,
                'p1Time': None,
                'p2Time': None,
                'exchanged': None,
                'previousBoard':[],
                'onlyBoard':[],
                'undo': 1,
            }

        room = house[room_id]#从房间号得到房间信息, 赋值到room
        old = False#此变量检测是不是已经有用户在房间里了

        #禁止用户进入同一个房间
        if room['black'] == user_id or room['white'] == user_id:#如果房间里*有*这个用户的id
            old = True#赋值为True,代表此人已经在房间里

            if user_id in room['users']:#检查user是不是已经被放入房间信息,如果是,则应该删除
                old_send = room['sends'][room['users'].index(user_id)]
                room['sends'].remove(old_send)#从sends中删除之前的数据
                room['users'].remove(user_id)#删除user_id
#发送信息, 需要处理......ok
                await old_send({'type': 'websocket.close', 'code': 4000})#把'有人进入同一房间'信息传给每个人, 让websocket关闭

        else:#如果房间里*没有*这个用户的id
            if room['black'] is None:#黑棋没人就执黑
                room['black'] = user_id
            elif room['white'] is None:#黑有人就执白
                room['white'] = user_id

        visiting = (room['black'] != user_id and room['white'] != user_id)#看看用户是不是既不是执黑也不是执白, 如果用户是观众, visiting = True
        room['sends'].append(send) #在要发送的信息里加入这个人的信息
        room['users'].append(user_id) #在room里加入这个用户的id
#发送信息, 需要处理......ok
        await send({'type': 'websocket.send', 'text': json.dumps({ #向server发送现在更新完了的新的房间数据,以JSON形式
            'type': 'InitializeRoomState',
            'boardStatus': room['boardStatus'],
            'visiting': visiting,
            'isBlack': room['black'] == user_id,# if not visiting else bool(len(room['pieces']) % 2),
            'ready': bool(room['black'] and room['white']),
            'turn': room['turn'],
            'winner': room['winner'],
            'p1Time': room['p1Time'],
            'p2Time': room['p2Time'],
        })})
        
        if not old and (room['black'] == user_id or room['white'] == user_id): # 如果*没有*用户进入了同一个房间, 并且这个用户是执黑或者执白的(即并非visiting)
            for _send in room['sends']:#检查send的对象是不是刚加进来的
                if _send == send:#如果正是, 不发送, 否则发送
                    continue
#发送信息, 需要处理......ok
                await _send({'type': 'websocket.send', 'text': json.dumps({#如果被更新了, 就传送新的内容
                    'type': 'AddPlayer',#种类是新增玩家
                    'ready': bool(room['black'] and room['white']),#检查是否两个位置都有人, 如果都有则ready = True
                })})

        while True:
            event = await receive()#持续接收信息

            if event['type'] == 'websocket.disconnect':#有人断开连接了
                if send in room['sends']:#移除用户的数据
                    room['sends'].remove(send)
                    room['users'].remove(user_id)
                    if len(room['boardStatus']) == 0 and len(room['sends']) == 0:#如果人走完了且没有棋子就删除房间
                        del house[room_id]
                break
#需要接收信息......ok
            data = json.loads(event['text'])

            if data['type'] == 'GameOver':
                winner = data['winner']
                for _send in room['sends']:
                    if _send == send:
                        continue
                    await _send({'type': 'websocket.send', 'text': json.dumps({
                        'type': 'GameOver',
                        'winner': winner,
                    })})
#*******************************************************************************************************************/
            if data['type'] == 'TimeSet':
                room['p1Time'] = data['p1Time']
                room['p2Time'] = data['p2Time']
                for _send in room['sends']:
                    if _send == send:
                        continue
                    await _send({'type': 'websocket.send', 'text': json.dumps({
                        'type': 'TimeSet',
                        'p1Time': data['p1Time'],
                        'p2Time': data['p2Time'],
                    })})
            if data['type'] == 'ThreeChange':
                room['exchanged'] = data['exchanged']
                for _send in room['sends']:
                    if _send == send:
                        continue
                    await _send({'type': 'websocket.send', 'text': json.dumps({
                        'type': 'ThreeChange',
                        'exchanged': data['exchanged']
                    })})
            if data['type'] == 'previousBoard':
                room['previousBoard'] = data['previousBoard']
                for _send in room['sends']:
                    if _send == send:
                        continue
                    await _send({'type': 'websocket.send', 'text': json.dumps({
                        'type': 'previousBoard',
                        'previousBoard': data['previousBoard']
                    })})
            if data['type'] == 'onlyBoard':
                room['onlyBoard'] = data['onlyBoard']
                for _send in room['sends']:
                    if _send == send:
                        continue
                    await _send({'type': 'websocket.send', 'text': json.dumps({
                        'type': 'onlyBoard',
                        'onlyBoard': data['onlyBoard']
                    })})   
            if data['type'] == 'undo':
                for _send in room['sends']:
                    if _send == send:
                        continue
                    await _send({'type': 'websocket.send', 'text': json.dumps({
                        'type': 'undo',
                        #'undo': data['undo']
                    })})  
            if data['type'] == 'Request':
                for _send in room['sends']:
                    if _send == send:
                        continue
                    await _send({'type': 'websocket.send', 'text': json.dumps({
                        'type': 'Request',
                        
                    })})  
            if data['type'] == 'Accept':
                for _send in room['sends']:
                    if _send == send:
                        continue
                    await _send({'type': 'websocket.send', 'text': json.dumps({
                        'type': 'Accept',
                        
                    })}) 
            if data['type'] == 'Decline':
                for _send in room['sends']:
                    if _send == send:
                        continue
                    await _send({'type': 'websocket.send', 'text': json.dumps({
                        'type': 'Decline',
                        
                    })}) 
            if data['type'] == '5Step3Hits':
                room['threeStrikes'] = data['threeStrikes']
                for _send in room['sends']:
                    if _send == send:
                        continue
                    await _send({'type': 'websocket.send', 'text': json.dumps({
                        'type': '5Step3Hits',
                        'threeStrikes': data['threeStrikes'],
                    })})

            if data['type'] == 'whiteValidChoice':
                room['whiteValidChoice'] = data['whiteValidChoice']
                for _send in room['sends']:
                    if _send == send:
                        continue
                    await _send({'type': 'websocket.send', 'text': json.dumps({
                        'type': 'whiteValidChoice',
                        'whiteValidChoice': data['whiteValidChoice'],
                    })})

            if data['type'] == 'dataToPHP':
                import requests
                dataToPHP = data['dataToPHP']
                url = 'http://34.237.159.19/bigBang/user/record.php'
                #print(dataToPHP)
                #response = requests.post(url, data=dataToPHP)
                payload = {
                    'userid': 67800,
                    'game_record': '1101010100010',
                    'start_time': '2023-04-28T10:30',
                    'elapsed_time': 60,
                    'win_status': 'Win'
                }

                response = requests.post(url, data=payload)
#*******************************************************************************************************************/
            if data['type'] == 'DropPiece':#如果有人落子了
                room['boardStatus'] =  data['boardStatus']#存储棋盘数据
                room['movement'] = data['movement']###
                room['turn'] = data['turn']
                for _send in room['sends']:
                    if _send == send:
                        continue
#发送信息, 需要处理......ok
                    await _send({'type': 'websocket.send', 'text': json.dumps({#传送新的xy数据到每个人
                        'type': 'DropPiece',
                        'boardStatus': data['boardStatus'],
                        'movement': data['movement'],
                        'turn':data['turn'],
                        })})

    elif scope['type'] == 'http':
        request = await receive()
        if request['type'] == 'http.request':
            await send({'type': 'http.response.start', 'status': 200})
            await send({'type': 'http.response.body', 'body': html})
          

