import json

# Open the index.html file in binary mode and read its contents into the `html` variable
with open('index.html', 'rb') as fp:
    html = fp.read()

# Create an empty dictionary to store data about the houses
house = {}

# Define an async function that will handle WebSocket and HTTP requests
async def application(scope, receive, send):

    if scope['type'] == 'websocket':#接受类似一级头文件的东西,看看是不是websocket类型的东西
        event = await receive()#接受类似二级头文件的东西,看看是不是websocket类型的东西
        
        if event['type'] != 'websocket.connect':#不是就滚
            return
        
        await send({'type': 'websocket.accept'})#是的话告诉server我准备好了
        event = await receive()#接受剩余信息
        data = json.loads(event['text'])#不知道为什么, 但是当作送来的信息永远是JSON格式

        if data['type'] != 'EnterRoom' or not data['id'] or not data['room']:#如果数据里*没有*玩家id, 房间号, 或种类*不是*EnterRoom
            await send({'type': 'websocket.close', 'code': 403})#如果不是进入房间就关闭webSocket
            return
        
        room_id = data['room']#记录房间id
        user_id = data['id']#记录玩家id
        
        if room_id not in house:#如果给的房间号还没有被创建, 在id位置创建一个新的房间
            house[room_id] = {#这是个dictionary
                'black': None,
                'white': None,
                'pieces': [],
                'sends': [],
                'users': [],
            }
        
        # Get the room data from the `house` dictionary
        room = house[room_id]#从房间号得到房间信息, 赋值到room
        old = False#此变量检测是不是已经有用户在房间里了
        
        #禁止用户进入同一个房间
        if room['black'] == user_id or room['white'] == user_id:#如果房间里*有*这个用户的id
            old = True#赋值为True,代表此人已经在房间里

            if user_id in room['users']:#检查user是不是已经被放入房间信息,如果是,则应该删除
                old_send = room['sends'][room['users'].index(user_id)]#不知道怎么样反正就是获得了这人之前的send数据
                room['sends'].remove(old_send)#从sends中删除之前的数据
                room['users'].remove(user_id)#删除user_id
                await old_send({'type': 'websocket.close', 'code': 4000})#把'有人进入同一房间'信息传给server, 让websocket关闭

        else:#如果房间里*没有*这个用户的id
            if room['black'] is None:#黑棋没人就执黑
                room['black'] = user_id
            elif room['white'] is None:#黑有人就执白
                room['white'] = user_id
        
        visiting = (room['black'] != user_id and room['white'] != user_id)#看看用户是不是既不是执黑也不是执白, 如果用户是观众, visiting = True
        room['sends'].append(send) #在要发送的信息里加入这个人的信息
        room['users'].append(user_id) #在room里加入这个用户的id
        await send({'type': 'websocket.send', 'text': json.dumps({ #向server发送现在更新完了的新的房间数据,以JSON形式
            'type': 'InitializeRoomState',
            'pieces': room['pieces'],
            'visiting': visiting,
            'black': room['black'] == user_id if not visiting else bool(len(room['pieces']) % 2),
            'ready': bool(room['black'] and room['white']),
        })})
        
        if not old and (room['black'] == user_id or room['white'] == user_id): # 如果*没有*用户进入了同一个房间, 并且这个用户是执黑或者执白的(即并非visiting)
            for _send in room['sends']:#检查有没有send的内容被更新
                if _send == send:#如果没有,继续检查
                    continue
                await _send({'type': 'websocket.send', 'text': json.dumps({#如果被更新了, 就传送新的内容
                    'type': 'AddPlayer',#种类是新增玩家
                    'ready': bool(room['black'] and room['white']),#检查是否两个位置都有人, 如果都有则ready = True
                })})

        while True:
            event = await receive()#持续接收信息

            if event['type'] == 'websocket.disconnect':#有人断开连接了?
                if send in room['sends']:#移除用户传送的数据?
                    room['sends'].remove(send)
                    room['users'].remove(user_id)
                    if len(room['pieces']) == 0 and len(room['sends']) == 0:#如果移除完了就删除房间
                        del house[room_id]
                break

            data = json.loads(event['text'])
            if data['type'] == 'DropPiece':#如果有人落子了
                room['pieces'].append((data['x'], data['y']))#存储棋子数据
                for _send in room['sends']:#如果数据更新了
                    if _send == send:
                        continue
                    await _send({'type': 'websocket.send', 'text': json.dumps({#传送新的xy数据到server
                        'type': 'DropPiece',
                        'x': data['x'],
                        'y': data['y'],
                    })})
    
    
    elif scope['type'] == 'http':#已经抄上了
        request = await receive()
        if request['type'] == 'http.request':
            await send({'type': 'http.response.start', 'status': 200})
            await send({'type': 'http.response.body', 'body': html})
