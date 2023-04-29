<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>bigBang</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://assets.mockflow.com/app/wireframepro/company/C60e51ff3180b4980a08450701f20806b/projects/M84VLDquVob/images/M21e210354201a0e956ded9da48a82c021679583773900">
    <script src="http://34.237.159.19/bigBang/scripts/aiFunctions.js"></script>
    <style>
      body {
        background-color: #ffe7cc;
      }

      

      #timer-display {
        font-size: 2em;
        text-align: center;
        margin-top: 20px;
      }

      #player-icon {
      width: 50px;
      height: 50px;
      background-image: url("http://34.237.159.19/bigBang/images/user.png");
      background-repeat: no-repeat;
      background-size: contain;}
      

      #black {
        fill: radial-gradient(circle, #808080, #111);
      }
  
      #white {
        fill: radial-gradient(circle, #fff, #ddd);
      }
      
      #game-result {
        font-family: 'Space Grotesk', sans-serif;
        line-height: 0.7em;
      }

      .hidden {
        display: none;
      }
      
      #floating-window {
        position: fixed;
        height: 500px;
        width: 600px;
        top: 20%;
        left: 50%;
        transform: translateX(-50%);
        background-color: white;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 100;
      }

      .question{
        height: 32px;
        width: 32px;
      }

      .window-content {
        margin-top: 10px;
      }
      .button {
        border: none;
	  color: white;
	    padding: 16px 32px;
	      text-align: center;
	        text-decoration: none;
		  display: inline-block;
		    font-size: 16px;
		      margin: 4px 2px;
		        transition-duration: 0.4s;
			  cursor: pointer;
      }
	.button_back {
	  background-color: white;
	  color: black;
	  border: 2px solid #4CAF50;
	}
    </style>


<style>
  @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500&display=swap');
</style>
  
  
</head>



<body style="height: 100%; margin: 0">


    <svg id="board" viewBox="-95,-95,190,190" style="position: fixed; top: 100; left: 160; height: 570; width: 570" xmlns="http://www.w3.org/2000/svg">
        <defs>

          <radialGradient id="black">
            <stop offset="0%" style="stop-color:#434141" />
            <stop offset="100%" style="stop-color:#111" />
          </radialGradient>

          <radialGradient id="white">
            <stop offset="0%" style="stop-color:#ffffff" />
            <stop offset="100%" style="stop-color:#ede7e7" />
          </radialGradient>

          <circle id="mark" r="1.3"/>
          <circle id="piece" r="4.2"/>
        </defs>
        <path stroke="black" stroke-width="0.5" fill="none" d="m-90,-90h180v180h-180zm10,0v180zm10,0v180zm10,0v180zm10,0v180zm10,0v180zm10,0v180zm10,0v180zm10,0v180zm10,0v180zm10,0v180zm10,0v180zm10,0v180zm10,0v180zm10,0v180zm10,0v180
        zm10,0v180zm10,0v180zm10,0v180zm0,10h-180zm0,10h-180zm0,10h-180zm0,10h-180zm0,10h-180zm0,10h-180zm0,10h-180zm0,10h-180zm0,10h-180zm0,10h-180zm0,10h-180
        zm0,10h-180zm0,10h-180zm0,10h-180zm0,10h-180zm0,10h-180zm0,10h-180zm0,10h-180"/>
        <use xlink:href="#mark"/>
        <use xlink:href="#mark" x="60" y="60"/>
        <use xlink:href="#mark" x="60" y="-60"/>
        <use xlink:href="#mark" x="-60" y="60"/>
        <use xlink:href="#mark" x="-60" y="-60"/>
        <use xlink:href="#mark" x="0" y="60"/>
        <use xlink:href="#mark" x="0" y="-60"/>
        <use xlink:href="#mark" x="60" y="0"/>
        <use xlink:href="#mark" x="-60" y="0"/>
      </svg>
      <!-- This part is used to draw the Goboard-->
      
 

      
      <svg id="left-timer-icon" width="45" height="45" style="position: fixed; top: 230px; left: 895px; ">
        <circle id="black-timer-circle" cx="22.5" cy="22.5" r="16" stroke="#7b6801" stroke-width="5.4" fill="none"/>
        <line id="black-timer-line1" x1="22.5" y1="22.5" x2="22.5" y2="11.5" stroke="#7b6801" stroke-width="2.8"/>
        <line id="black-timer-line2" x1="23.75" y1="22.5" x2="13.5" y2="22.5" stroke="#7b6801" stroke-width="2.8"/>
      </svg>
      <p id="timer-blackdisplay" style="position: fixed; top: 206px; left: 950px ;font-size: 28px; font-family: 'Space Grotesk', sans-serif;; font-weight: 500; color: #7b6801;"></p>
  
      <svg id="right-timer-icon" width="45" height="45" style="position: fixed; top: 230px; left: 1145px; ">
        <circle id="white-timer-circle" cx="22.5" cy="22.5" r="16" stroke="#7b6801" stroke-width="5.4" fill="none"/>
        <line id="white-timer-line1" x1="22.5" y1="22.5" x2="22.5" y2="11.5" stroke="#7b6801" stroke-width="2.8"/>
        <line id="white-timer-line2" x1="23.75" y1="22.5" x2="13.5" y2="22.5" stroke="#7b6801" stroke-width="2.8"/>
      </svg>
      <p id="timer-whitedisplay" style="position: fixed; top: 206px; left: 1200px;font-size: 28px; font-family: 'Space Grotesk', sans-serif;; font-weight: 500; color: #7b6801;"></p>
      <p id="timer-startdisplay" style="position: fixed; top: 66px; left:300px;font-size: 18px; font-family: 'Space Grotesk', sans-serif;; font-weight: 500; color: #7b6801;"></p >
      <p id="timer-elapseddisplay" style="position: fixed; top: 66px; left: 200px;font-size: 18px; font-family: 'Space Grotesk', sans-serif;; font-weight: 500; color: #7b6801;"></p>
      <!-- This part is to display the timer-->

      
      
      
    <div style="position: fixed; top: 310px; left: 950px;" id="player-icon"></div>
    <svg style="position: fixed; top: 286px; left: 921.5px; height: 100; width: 100" viewBox="0 0 60 60">
      <circle cx="30" cy="30" r="20" fill="transparent" stroke="#7b6801" stroke-width="1.6"/>
    </svg>

    <div style="position: fixed; top: 310px; left: 1200px;" id="player-icon"></div>
    <svg style="position: fixed; top: 286px; left: 1171.5px; height: 100; width: 100" viewBox="0 0 60 60">
      <circle cx="30" cy="30" r="20" fill="transparent" stroke="#7b6801" stroke-width="1.6"/>
    </svg>
    <!-- This part is to display the player icon-->
    
    <div id="vs" style="position: fixed; top: 310px; left: 1075px; font-size: 28px; font-family: 'Space Grotesk', sans-serif; font-weight: 500; color: #7b6801;">
      <span style="padding-right: 10px;">vs</span>
    </div>
    
    <div id="game-result" style="position: fixed; top: 490px; left: 1015px; font-size: 30px; font-family: 'Space Grotesk', sans-serif; font-weight: 500; color: brown; text-align: center;"></div>   
     
    <img id="undo-button" src="http://34.237.159.19/bigBang/images/back.png" style="position: fixed; top: 65px; left: 670px; width: 32px; height: 32px; cursor: pointer;"/>

    <button id="surrender-button" style="position: fixed; top: 500px; left: 995px; font-size: 18px; font-family: 'Space Grotesk', sans-serif; background-color: #c32c20; color: white; border: none; padding: 10px 60px; border-radius: 5px; text-align: center; cursor: pointer;">Surrender</button>

    <button id="exchange-button" style="position: fixed; top: 580px; left: 995px; font-size: 18px; font-family: 'Space Grotesk', sans-serif; background-color: #7b6801; color: white; border: none; padding: 10px 60px; border-radius: 5px; text-align: center; cursor: pointer;">Exchange</button>



    <button id="open-window-button" class= "question" style="position: fixed; top: 28px; left: 1370px; background: none; border: none; padding: 0; cursor: pointer;">
      <img class= "question" src="http://34.237.159.19/bigBang/images/question.png" alt="Open Floating Window">
    </button>
    
    <div id="floating-window" class="hidden">
      <svg id="close-window-button" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 20 20" style="color: #7b6801; cursor: pointer;">
        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" stroke-width="2"/>
      </svg>
      <div class="window-content" style="font-family: 'Space Grotesk', sans-serif;">
        <div class="subwindow">
          <h3>How to Play:</h3>
          <p>1. Black starts the game</p >
          <p>2. Place your stone on an intersection point</p >
          <p>3. The goal is to connect five stones in a row (vertically, horizontally, diagonolly)</p >
        </div>
        <div class="subwindow">
          <h3>Game Modes:</h3>
          <p>PVP, Easy, Medium, Hard</p >
        </div>
        <div class="subwindow">
          <h3>Game Controls:</h3>
          <p>Undo: Click the "Undo" button to undo the previous move</p >
          <p>Three Step Exchange(Optional): Second player can exchange side after third move</p >
          <p>Five Step Three Strikes(Optional): First player should choose three places for fifth move</p >
          <p>Surrender: Click the "Surrender" button to exit the game.</p >
        </div>
      </div>
    </div>
    
    <div id="help" style="position: fixed; top: 25px; left: 1300px; font-size: 28px; font-family: 'Space Grotesk', sans-serif; font-weight: 500; color: #7b6801;">
      <span style="padding-right: 10px;" alt="Open Floating Window">Help</span>
    </div>

        <!------------------------------------------------------------------------------------------------------->
    <div id="fiveStepThreeStrikes-black" style="position: fixed; top: 130px; left: 920px; font-size: 24px; font-family: 'Space Grotesk', sans-serif; font-weight: 500; color: #7b6801; text-align: center;">
      <span style="padding-right: 10px;">Please choose three places</span><br>
      <span>to drop the piece</span>
    </div>

    <div id="fiveStepThreeStrikes-white" style="position: fixed; top: 130px; left: 920px; font-size: 24px; font-family: 'Space Grotesk', sans-serif; font-weight: 500; color: #7b6801; text-align: center;">
      <span style="padding-right: 10px;">Please choose one place</span><br>
      <span>from three for the black side</span>
    </div>

    <div id="player1Name" style="position: fixed; top: 380px; left: 920px; font-size: 28px; font-family: 'Space Grotesk', sans-serif; font-weight: 500; color: #7b6801; text-align: center;">
    </div>

    <div id="player2Name" style="position: fixed; top: 380px; left: 1200px; font-size: 28px; font-family: 'Space Grotesk', sans-serif; font-weight: 500; color: #7b6801; text-align: center;">
    </div>

    <div id="currentPlayer" style="position: fixed; top: 65px; left: 180px; font-size: 20px; font-family: 'Space Grotesk', sans-serif; font-weight: 500; color: #7b6801; text-align: center;">
      current: player1Name, <span id="currentPlayerColor"></span>
    </div>
    
    <button id="accept-button" style="position: fixed; top: 580px; left: 925px; font-size: 16px; font-family: 'Space Grotesk', sans-serif; background-color: #186318c4; color: white; border: none; padding: 10px 40px; border-radius: 5px; text-align: center; cursor: pointer;">Accept</button>

    <button id="decline-button" style="position: fixed; top: 580px; left: 1115px; font-size: 16px; font-family: 'Space Grotesk', sans-serif; background-color: #c32c20; color: white; border: none; padding: 10px 40px; border-radius: 5px; text-align: center; cursor: pointer;">Decline</button>


    <script>
//-----------------------------------------------------------------------------------------------------------------------        
      
      function getURLParameter(paramName) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(paramName);
      }
      const userID = getURLParameter('userid');
	    const username = getURLParameter('username');
	    const roomNum = getURLParameter('roomNo');
	    const gameMode = getURLParameter('gameMode');
	    const isEarlyTermValid = (getURLParameter('termination')==="true");
	    const isThreeExchangeValid = (getURLParameter('threeStep')==="true");
	    const isFiveThreeHitValid = (getURLParameter('fiveStep')==="true");
	    let isTimeValid = (getURLParameter('timer')==="true");
	    const maxTimeSet = getURLParameter('totalSeconds');
	    if(maxTimeSet ==""){
	        isTimeValid = false;
	    }
      
      console.log('User id: ', userID);
      console.log('username: ', username);
      console.log('roomNum: ', roomNum);
      console.log('gameMode: ', gameMode);
      console.log('maxTimeSet: ', maxTimeSet);

//-----------------------------------------------------------------------------------------------------------------------      
    const fiveStepThreeStrikesBlack = document.getElementById("fiveStepThreeStrikes-black");
    fiveStepThreeStrikesBlack.style.display = "none";

    const fiveStepThreeStrikesWhite = document.getElementById("fiveStepThreeStrikes-white");
    fiveStepThreeStrikesWhite.style.display = "none";

    const acceptButton = document.getElementById("accept-button");
    acceptButton.style.display = "none";
    acceptButton.addEventListener('click', async () => {
      ws.send(JSON.stringify({type: 'Accept'}));
      acceptButton.style.display = "none";
      declineButton.style.display = "none";
    })

    const declineButton = document.getElementById("decline-button");
    declineButton.style.display = "none";
    declineButton.addEventListener('click', async () => {
      ws.send(JSON.stringify({type: 'Decline'}));
      acceptButton.style.display = "none";
      declineButton.style.display = "none";
    })
//-----------------------------------------------------------------------------------------------------------------------      
     
     document.getElementById('open-window-button').addEventListener('click', function() {
      document.getElementById('floating-window').classList.remove('hidden');
    });
    
    document.getElementById('close-window-button').addEventListener('click', function() {
      document.getElementById('floating-window').classList.add('hidden');
    });
     
     displayStartTime();
     class Timer {
      constructor(timeInSeconds) {
        this.totalTime = timeInSeconds;
        this.remainingTime = timeInSeconds;
        this.startingTime = 0;
        this.interval = null;
      }

      start(updateCallback) {
        this.interval = setInterval(() => {
          this.update();
          if (updateCallback) {
            updateCallback();
          }
        }, 1000);
      }
        
      stop() {
        clearInterval(this.interval);
      }
      
      reset() {
        this.remainingTime = this.totalTime;
      }

      update() {
        if (this.remainingTime > 0) {
          this.remainingTime -= 1;
        } else {
          this.stop();
        }
        this.startingTime += 1;
      }


      getFormattedStartTime() {
        const minutes = Math.floor(this.startingTime / 60);
        const seconds = this.startingTime % 60;
        return `${minutes}:${seconds.toString().padStart(2, '0')}`;
      }

      getFormattedTime() {
        const minutes = Math.floor(this.remainingTime / 60);
        const seconds = this.remainingTime % 60;
        return `${minutes}:${seconds.toString().padStart(2, '0')}`;
      }
    
      isTimeOut() {
        return this.remainingTime <= 0;
      }
    
    }
    // This is the structure of Timer

    
    class GameSettings {
      constructor(gameMode, earlyTermination, threeStepExchange, fiveStepThreeStrikes, timerStatus, timerTime) {
        this.gameMode = gameMode;
        this.earlyTermination = earlyTermination;
        this.threeStepExchange = threeStepExchange;
        this.fiveStepThreeStrikes = fiveStepThreeStrikes;
        this.timerStatus = timerStatus;
        this.timerTime = timerTime;
        this.player1Timer = new Timer(timerTime);
        this.player2Timer = new Timer(timerTime);
        this.elapsedTimer = new Timer(100000000000000);
        this.player1Name = player1Name;
        this.player2Name = player2Name;
      }
    }
    // This is the structure of game settings, and it is used to store game settings information


    class RoomInfor{
        roomNum = null;
        isVisitor = false;
        isReady = false;
        isBlack = false;
        iniColor = 1;
      }


      let gameSettings = null;
      let boardStatus = null;
      let ws = null;
      let roomInfor = new RoomInfor();
      let playerColor = 1; // The initial color is black
      let anotherDropped = 0;
      let anotherMovement = [];
      let gameStopped = false; // Set gameStopped to false as default
      let exchanged = false; // Set exchanged to false as default
      let player = 1;
      let playerCode;
      let previousBoard = new Array(3).fill().map(() => new Array(19).fill().map(() => new Array(19).fill(0)));
      console.log(previousBoard);
      let undoCount = -1;
      let count = 1; // Count used to count the turn
      let countBlack = 0;
      let agree = 0;
      let agreelock = 0;
      let haveGot5step3hitsChoice = 0;/////////////////////////////////////////////////////
      let getWhiteValidChoice = []/////////////////////////////////////////////////////
      var recordedStartTime;

      function initializeGame(gameMode, userID, roomNum, isEarlyTermValid, isThreeExchangeValid, isFiveThreeHitValid,isTimeValid, maxTimeSet) {
        //gameSettings = new GameSettings(gameMode, true, true, false, true, 300);
        console.log(gameMode);
			          console.log(isEarlyTermValid);
			          console.log(isThreeExchangeValid);
			          console.log(isFiveThreeHitValid);
			          console.log(isTimeValid);
			          console.log(maxTimeSet);
			          console.log(userID);
			          console.log(roomNum);
        gameSettings = new GameSettings(gameMode, isEarlyTermValid, isThreeExchangeValid, isFiveThreeHitValid,isTimeValid, maxTimeSet);
        boardStatus = new Array(19).fill().map(() => new Array(19).fill(0));

        if(gameMode == "PVP"){

          ws = new WebSocket(`ws://${window.location.host}`);

          ws.onopen = () => {
            console.log('onopen');
            ws.send(JSON.stringify({type: 'EnterRoom', id: userID, room: roomNum}));
          };

          ws.onclose = function(event){
            console.log("onClose");
            const simulatClickSurrenderButton = document.getElementById('surrender-button');///////////////////////********************
            simulatClickSurrenderButton.onclick;////////*********************
            if (event.code !== 1000) {
              if (event.code === 4000) {
                window.alert('您已在新的浏览器窗口中进入了该房间，本页面将转换为单机模式！');
              } else {
                window.alert('Disconnect!');
              }
              setOffline();
            }
          }

          
          ws.onmessage = function (ev){
            //console.log('onmessage');
            const data = JSON.parse(ev.data);
            const type = data['type'];

            if (type === 'InitializeRoomState') {
              console.log('onInitializeRoomState');
              roomInfor.isVisitor = data.visiting;
              roomInfor.isBlack = data.isBlack;
              //boardStatus = data.boardStatus;
              roomInfor.isReady = data.ready;

              if (!roomInfor.isVisitor) {
                if(roomInfor.isReady){
                  if(!roomInfor.isBlack){
                    roomInfor.iniColor = -1;
                    playerCode = 2;
                    alert('Hi, You are white piece');
                  }
                }
                else alert(`Hi, Please wait for another player`);
              }
              else {
              alert('Visitors are not allowed');
              window.open("about:blank","_self").close();
              }
            }

            else if(type === 'AddPlayer'){
              console.log('onAddPlayer');
              if (!roomInfor.isVisitor && data.ready && roomInfor.isBlack === true) {
                roomInfor.isReady = true;
                playerCode = 1;
                window.alert('You are black piece');
              }
            }

            else if(type === 'DropPiece'){
              console.log('onDropPiece');
              boardStatus = data.boardStatus;
              displayGoboard();
              //anotherMovement = data.movement;
              anotherDropped = 1;
              
            }

            else if (type === 'GameOver') {
              winStatus = data.winner;
              
              if (winStatus != 0){
                gameStopped = true;
              }
              /*const gameResult = document.getElementById("game-result");
              
              if (winner === 1) {
                gameResult.innerHTML = "Game Over! Black wins!";
              } else if (winner === -1) {
                gameResult.innerHTML = "Game Over! White wins!";
              }*/
              //gameStopped = true;
            }
/*******************************************************************************************************************/
            else if (type === 'TimeSet') {
              //console.log('onTimeSet, Get Time');
              if (data.p1Time < gameSettings.player1Timer.remainingTime){
                gameSettings.player1Timer.remainingTime = data.p1Time;
              }
              if (data.p2Time < gameSettings.player2Timer.remainingTime){
                gameSettings.player2Timer.remainingTime = data.p2Time;
              }
            }
            else if (type ==='ThreeChange'){
                console.log('onThreeChange')
                roomInfor.iniColor = -1;
                exchanged = true; 
                player = 1;
                count = 7;
                undoCount = 0;
                gameSettings.player2Timer.stop();
                gameSettings.player1Timer.start();  
                
            }
            else if (type === 'previousBoard') {
              //console.log('onTimeSet, Get Time');
              previousBoard = data.previousBoard;
              console.log('Received previousBoard:', data.previousBoard);
            }
            else if (type === 'onlyBoard') {
              //console.log('onTimeSet, Get Time');
              boardStatus = data.onlyBoard;
              displayGoboard();
              console.log('Received onlyBoard:', data.onlyBoard);
            }
            else if (type === 'undo') {
              //console.log('onTimeSet, Get Time');
              count = count - 2;
              countBlack = countBlack - 1;
              undoCount = 0;
            }
            else if (type === 'Request') {              
              acceptButton.style.display = "block";
              declineButton.style.display = "block";
            }
            else if (type === 'Accept') {              
              agree = 1;
              agreelock = 1;
            }
            else if (type === 'Decline') {    
              alert('Declined request');          
              agree = 0;
              agreelock = 1;
            }
            else if(type ==='5Step3Hits'){
              console.log('on5Step3Hits, Get threeStrikes');
              const blackPointsWhiteCanChoose = data.threeStrikes;
              console.log(blackPointsWhiteCanChoose);
              whiteChoose(blackPointsWhiteCanChoose);
              
            }
            else if (type === 'whiteValidChoice'){
              console.log('onThreeStrikes, get getWhiteValidChoice');
              getWhiteValidChoice = data.whiteValidChoice;
              console.log(getWhiteValidChoice);
              haveGot5step3hitsChoice = 1;
            }

            else{
              console.log('on ELSE message');
            }
/*******************************************************************************************************************/
            

        }
      }
    }
      
      
      initializeGame(gameMode, userID, roomNum, isEarlyTermValid, isThreeExchangeValid, isFiveThreeHitValid,isTimeValid, maxTimeSet);
      //initializeGame("PVP",Math.random(), 1 , false , true, true, true, 65);


      

    const lefttimerIcon = document.getElementById('left-timer-icon');
    const righttimerIcon = document.getElementById('right-timer-icon');

    if (gameSettings.timerStatus && gameSettings.gameMode == "PVP") {
      lefttimerIcon.style.display = 'block';
      righttimerIcon.style.display = 'block';
    } else {
      lefttimerIcon.style.display = 'none';
      righttimerIcon.style.display = 'none';
    }
    // Display the timer icons only when the timer is enabled

    //----------------------------------------------------------------------------------------------------------------------- 
    gameSettings.player1Name = "Player 1";
    gameSettings.player2Name = "Player 2"
    const player1NameElement = document.getElementById("player1Name");
    player1NameElement.textContent = gameSettings.player1Name;
    const player2NameElement = document.getElementById("player2Name");
    player2NameElement.textContent = gameSettings.player2Name;
    // Display player names*/
    const currentPlayerElement = document.getElementById("currentPlayer");
    currentPlayerElement.innerHTML = `Current: ${gameSettings.player1Name}, black`;
//-----------------------------------------------------------------------------------------------------------------------  


    async function play() {
      if (count == 1){
        await delay(2000);
      }
      
      
      let winStatus = 0; // Define winStatus, it is 0 when there is no winner.

   

  
      if (gameSettings.gameMode === 'PVP' && gameSettings.timerStatus) {
        checkTimeOut(); // Call the checkTimeOut() function after starting the timers
      }
      
      const timerBlackDisplay = document.getElementById('timer-blackdisplay');
      const timerWhiteDisplay = document.getElementById('timer-whitedisplay');
      
      const exchangeButton = document.getElementById("exchange-button");
      exchangeButton.addEventListener('click', () => {
                // Perform exchange functionality here
                exchanged = true; 
                undoCount = -1;
                player = -playerColor;
                count = 7;
                gameSettings.player2Timer.stop();
                gameSettings.player1Timer.start();  
                undoButton.style.display = "none";  
                displayPlayer();   
/*******************************************************************************************************************/
                playerColor = -1;
                roomInfor.iniColor = 1;
                ws.send(JSON.stringify({ type: 'ThreeChange', exchanged: exchanged}));

/*******************************************************************************************************************/
              });
      exchangeButton.style.display = "none";

      setInterval(() => {
        if (gameSettings.gameMode === 'PVP' && gameSettings.timerStatus) {
/*******************************************************************************************************************/
        if(playerColor == roomInfor.iniColor)
          ws.send(JSON.stringify({ type: 'TimeSet', p1Time: gameSettings.player1Timer.remainingTime, p2Time: gameSettings.player2Timer.remainingTime}));

/*******************************************************************************************************************/
          const player1TimerCircle = document.getElementById('black-timer-circle');
          const player1TimerLine1 = document.getElementById('black-timer-line1');
          const player1TimerLine2 = document.getElementById('black-timer-line2');
          const player2TimerCircle = document.getElementById('white-timer-circle');
          const player2TimerLine1 = document.getElementById('white-timer-line1');
          const player2TimerLine2 = document.getElementById('white-timer-line2');
          const elapsedTimerDisplay = document.getElementById('timer-elapseddisplay');
          elapsedTimerDisplay.innerHTML = `${gameSettings.elapsedTimer.getFormattedStartTime()}`;
          if (playerColor === 1) {
            let remainingTime = gameSettings.player1Timer.remainingTime;
            timerBlackDisplay.innerHTML = `${gameSettings.player1Timer.getFormattedTime()}`;
            if (remainingTime <= 60) {
              timerBlackDisplay.style.color = '#c32c20';
              document.getElementById('left-timer-icon').setAttribute('stroke', '#c32c20'); // set stroke color of left timer icon to red
              player1TimerCircle.setAttribute('stroke', '#c32c20');
              player1TimerLine1.setAttribute('stroke', '#c32c20');
              player1TimerLine2.setAttribute('stroke', '#c32c20');
            } else {
              timerBlackDisplay.style.color = '#7b6801';
            }
            timerWhiteDisplay.innerHTML = `${gameSettings.player2Timer.getFormattedTime()}`;
            } 
            else {
              let remainingTime = gameSettings.player2Timer.remainingTime;
              timerBlackDisplay.innerHTML = `${gameSettings.player1Timer.getFormattedTime()}`;
              timerWhiteDisplay.innerHTML = `${gameSettings.player2Timer.getFormattedTime()}`;
              if (remainingTime <= 60) {
                timerWhiteDisplay.style.color = '#c32c20';
                document.getElementById('right-timer-icon').setAttribute('stroke', '#c32c20'); // set stroke color of right timer icon to red
                player2TimerCircle.setAttribute('stroke', '#c32c20');
                player2TimerLine1.setAttribute('stroke', '#c32c20');
                player2TimerLine2.setAttribute('stroke', '#c32c20');
              } else {
                timerWhiteDisplay.style.color = '#7b6801';
              }
            }
        }
      }, 50);
      // Display the black timer and white timer time continuously, and when the time is less than a minute, display the time in red

      const undoButton = document.getElementById("undo-button");
      undoButton.addEventListener('click', async () => {
      // Perform undo functionality here
      undoButton.style.display = "none";
      ws.send(JSON.stringify({type: 'Request'}));

      const waitForAgreement = async () => {
                return new Promise((resolve) => {
                  const checkInterval = setInterval(() => {
                    if (agreelock) {
                      clearInterval(checkInterval);
                      resolve();
                    }
                  }, 100);
                });
              };

      await waitForAgreement();
      agreelock = 0;
        if(agree){
          undoMove(); 
        }
        if (count!= 6) exchangeButton.style.display = "none";
        });




        while (winStatus == 0) {

          if (gameStopped) {
            break;
          }


          console.log("player color", playerColor);
          console.log("initial color", roomInfor.iniColor);
          if ((playerColor == roomInfor.iniColor) && count > 2&&(undoCount >= 2 && gameSettings.gameMode == "PVP")){           
            undoButton.style.display = "block";
          }
          else{
            undoButton.style.display = "none";
          }


          if ((gameSettings.gameMode === 'PVP' && gameSettings.timerStatus)&&(count!= 1)) {
            if (player == 1) {
              gameSettings.player2Timer.stop();
              gameSettings.player1Timer.start();
            } else {       
              gameSettings.player1Timer.stop();       
              gameSettings.player2Timer.start();
            }
          }

          if ((count == 2) && (gameSettings.elapsedTimer.startingTime == 0)){
            gameSettings.elapsedTimer.start();
          }

          let validStatus = 0;
          let validMovement;
          let movement
          
          const surrenderButton = document.getElementById('surrender-button');
          
          
          surrenderButton.addEventListener('click', () => {
            console.log("1111111");
            surrenderButton.style.display = 'none';
            if (player === 1) {
              gameStopped = true;movement
              winStatus = 2; // player 2 wins
            } else {
              gameStopped = true;
              winStatus = 1; // player 1 wins
            }
          // Call the function to end the game and display the result
        });

          while (validStatus == 0) {
            if (gameStopped) {
              gameSettings.player1Timer.stop();
              gameSettings.player2Timer.stop();
              // If the game is stopped due to a timeout, break out of the loop
              break;
            }
//11111111111111111111111111111111111111111111
            if (exchanged) {
              exchanged = false;
            }

            if ((gameSettings.gameMode == "Random")&&(playerColor == -1)) {
              // Generate a random movement 
              const x = Math.floor(Math.random() * 19);
              const y = Math.floor(Math.random() * 19);
              movement = [x, y];}
            else if ((gameSettings.gameMode == "Medium")&&(playerColor == -1)){
              movement = mediumAI(boardStatus);
            }
            else if ((gameSettings.gameMode == "Hard")&&(playerColor == -1)){
              movement = mediumAI(boardStatus);
            }
            else if ( gameSettings.gameMode == "PVP" && gameSettings.fiveStepThreeStrikes && playerColor==1 && countBlack == 4 && roomInfor.iniColor == 1){
              movement = await fiveStepThreeStrikes();
            }
            else if ((gameSettings.gameMode == "PVP")&&((gameSettings.threeStepExchange) && (count == 6) && (roomInfor.iniColor == -1))){
              threeStepExchange();
              movement = await getMovement(playerColor);
              console.log(movement);
              exchangeButton.style.display = "none";
              console.log('player color print: 1');
              console.log(playerColor); 
              
              //After made a decision, hide the icon
            }

            
            else if (gameSettings.gameMode == "PVP" && playerColor != roomInfor.iniColor) {
              console.log("before while lock");
              console.log('player color print: 18');
              console.log(playerColor); 

              const waitForAnotherDrop = async () => {
                return new Promise((resolve) => {
                  const checkInterval = setInterval(() => {
                    if ((anotherDropped == 1)||(gameStopped)||(exchanged)) {
                      clearInterval(checkInterval);
                      resolve();
                    }
                  }, 100);
                });
              };

              await waitForAnotherDrop();
              console.log("after while lock");
              console.log('player color print: 19');
              console.log(playerColor); 
              anotherDropped = 0;
              if(!exchanged)
                break;
              else{
                displayPlayer();
                movement = [100,100];;
              }

            }

            else{
              console.log("IN ELSE!!!!!!!!");
              console.log(roomInfor.iniColor);
              movement = await getMovement(playerColor);       
              
            }

            console.log('player color print: 2');
            console.log(playerColor); 
                  console.log(exchanged);
            if(!((gameSettings.gameMode == "PVP")&&(playerColor != roomInfor.iniColor))){
              //console.log(`Clicked at coordinates: (${movement[0]}, ${movement[1]})`);
              validStatus = isValid(movement);
              console.log('player color print: 20');
              console.log(playerColor); // Corrected typo in console.log
              validMovement = movement;
            }
         else if((!((gameSettings.gameMode == "PVP")&&(playerColor == roomInfor.iniColor)))&&(!exchanged))
            {console.log('player color print: 3');
              console.log(playerColor); 
              break;}
            
            else{
              console.log('player color print: 4');
              console.log(playerColor); 
            validStatus = isValid(movement);
            validMovement = movement;
            }
          }
          // The inner game loop, place a piece until the location is valid

          if (gameStopped && checkWin() == 0) {
                break;
          }

          if(!((gameSettings.gameMode == "PVP")&&(playerColor != roomInfor.iniColor))){
            Update(validMovement,playerColor);  
            displayGoboard();
          }

          if ((count == 2)&&(player == 1)){
            gameSettings.player1Timer.start();
            gameSettings.player2Timer.stop();
          }

          console.log(count);
          undoCount++;
          if (playerColor == 1){
            countBlack++;
            console.log(countBlack);
          }
          count++;
          

          if (playerColor == roomInfor.iniColor){
          console.log(previousBoard);
          previousBoard[0] = JSON.parse(JSON.stringify(previousBoard[1]));
          previousBoard[1] = JSON.parse(JSON.stringify(previousBoard[2]));
          previousBoard[2] = JSON.parse(JSON.stringify(boardStatus));
          if (gameSettings.gameMode == "PVP"){
            ws.send(JSON.stringify({ type: 'previousBoard', previousBoard: previousBoard }));
            console.log(previousBoard);
          }
        }
          // add the current boardStatus to record and send and update the previous saved board 
          

          winStatus = checkWin();
          // Then update and delete the board, check if there is winner

          

          playerColor = -playerColor;
          
          if (player == 1){
            player = 2;
          }
          else{
            player = 1;
          }
          // Switch the player color
          console.log(player);
          displayPlayer();

          if (gameStopped && checkWin() != 0) {
                break;
          }
          
        }
        // The Outer game loop, when there is no winner the game continues

        gameSettings.elapsedTimer.stop();

        if (winStatus !== 0) {
          if (gameSettings.gameMode == "PVP") {
            ws.send(
              JSON.stringify({
                type: "GameOver",
                winner: -playerColor, 
              })
            );
          }
        }
        // Send the winner information to the server

        // Stop the timers and update the result
        gameSettings.player1Timer.stop();
        gameSettings.player2Timer.stop();
          

        
        undoButton.style.display = 'none';
        const surrenderButton = document.getElementById("surrender-button");
        surrenderButton.style.display = 'none';
        // When the game ends, hide the undo button and surrender button

        console.log(player);
        if (player == 1){
          winStatus = 2;
        }
        else if (player == 2){
          winStatus = 1;
        }
        // Determine who is the winner

        if (winStatus !== 0 && gameSettings.gameMode === "PVP") {
            ws.send(JSON.stringify({ type: 'GameOver', winner: winStatus }));
          }
          // Send game over message when the game ends
        
        const gameResult = document.getElementById("game-result");
        if (winStatus === 1) {
          gameResult.innerHTML = `Game Over!<br><span style='font-size:16px;'>${gameSettings.player1Name} wins!</span>`;         
        } 
        else if (winStatus === 2) {
          gameResult.innerHTML = `Game Over!<br><span style='font-size:16px;'>${gameSettings.player2Name} wins!</span>`;
        }
      

        const flattenedBoard = boardStatus.flat().join("");
        let winRecord;
        if (winStatus == playerCode){
          winRecord = 'Win';
        }
        else{
          winRecord = 'Lose';
        }
        const dataToPHP = {
          userid: userID,
          game_record: flattenedBoard,
          start_time: recordedStartTime,
          elapsed_time: gameSettings.elapsedTimer.startingTime,
          win_status: winRecord
        }

        ws.send(JSON.stringify({type: 'dataToPHP', dataToPHP: dataToPHP}));
        console.log("here send data");

      }
      // This part is the script of the game (Main structure)

      function delay(ms) {
        return new Promise((resolve) => setTimeout(resolve, ms));
      }

      play();
      




      function isValid(movement) {

        let x = movement[0];
        let y = movement[1];

        if (x > 18 || y > 18) return false;

        if (boardStatus[x][y]!=0){
          return false;
        }
        else{
          return true;
        }
      }
      //This function checks if the move is valid
    
      function displayGoboard() {
        const board = document.getElementById("board");
        // Remove existing pieces from the board
        const existingPieces = document.querySelectorAll(".black, .white");
        existingPieces.forEach((piece) => board.removeChild(piece));
        
        // Iterate through the boardStatus and add pieces to the board
        for (let i = 0; i < 19; i++) {
          for (let j = 0; j < 19; j++) {
            if (boardStatus[i][j] !== 0) {
              const piece = document.createElementNS("http://www.w3.org/2000/svg", "circle");
              piece.setAttribute("r", "4.2");
              piece.setAttribute("cx", (i - 9) * 10);
              piece.setAttribute("cy", (j - 9) * 10); 
//----------------------------------------------------------------------------------------------------------------------------
piece.setAttribute("fill", boardStatus[i][j] > 0 ? "black" : "white");
              if (boardStatus[i][j] == 0.5){
                piece.style.opacity = 0.3;
              }
              else if (boardStatus[i][j] == -0.5){
                piece.style.opacity = 0.68;
              }
              piece.setAttribute("class", boardStatus[i][j] > 0 ? "black" : "white");
//----------------------------------------------------------------------------------------------------------------------------
              board.appendChild(piece);
            }
          }
        }
      }
      //This function displays the board based on the boardStatus


      function Update(movement,playerColor) {
        let x = movement[0];
        let y = movement[1];
        boardStatus[x][y] = playerColor;

        if(gameSettings.gameMode == "PVP")  
          ws.send(JSON.stringify(  {type: 'DropPiece', boardStatus: boardStatus, movement: movement, turn: playerColor,}  ));

      }
      //This function updates the boardStatus according to new move
    

      function Update_for_53(movement,playerColor) {
        let x = movement[0];
        let y = movement[1];
        boardStatus[x][y] = playerColor;

        if(gameSettings.gameMode == "onlyBoard")  
          ws.send(JSON.stringify({ type: 'onlyBoard', onlyBoard: boardStatus }));

      }


      function checkWin() {
        const len = boardStatus.length;
        
        function checkLine(x, y, dx, dy) {
          const player = boardStatus[x][y];
          if (player === 0) return false;
          for (let i = 1; i < 5; i++) {
            const newX = x + dx * i;
            const newY = y + dy * i;
            if (
              newX < 0 || newX >= len ||
              newY < 0 || newY >= len ||
              boardStatus[newX][newY] !== player
              ) {
                return false;
              }
            }
            return true;
        }
        for (let i = 0; i < len; i++) {
          for (let j = 0; j < len; j++) {
            if (
              checkLine(i, j, 1, 0) ||
              checkLine(i, j, 0, 1) ||
              checkLine(i, j, 1, 1) ||
              checkLine(i, j, 1, -1)
              ) {
                return boardStatus[i][j];
              }
            }
          }
          return 0;
        }
        // This function will check if there is winner of this game

      function getMovement(playerColor) {
        return Promise.race([
          new Promise((resolve) =>  {
          const board = document.getElementById("board");
          
          const tempPiece = createTempPiece();
          board.appendChild(tempPiece);

          
          board.addEventListener("mousemove", function (event) {
            if (gameStopped||exchanged) {
              tempPiece.setAttribute("cx", -1000);
              tempPiece.setAttribute("cy", -1000);
              return; // If the game is stopped, return immediately and hide the tempPiece
            }

            const rect = board.getBoundingClientRect();
            const x = event.clientX - rect.left;
            const y = event.clientY - rect.top;
            
            newx = Math.floor(x/30);
            newy = Math.floor(y/30);

            if (boardStatus[newx][newy]== 0){
            tempPiece.setAttribute("cx", (newx-9)*10);
            tempPiece.setAttribute("cy", (newy-9)*10);
            if (playerColor==-1){
              tempPiece.style.opacity = "0.68";
            }
//----------------------------------------------------------------------------------------------------------------------------           
            if ((playerColor == 0)&&(countBlack == 4)){
              tempPiece.style.opacity = "0";
            }
//----------------------------------------------------------------------------------------------------------------------------   
            if (((roomInfor.iniColor == 1)&&(count == 7))&&((gameSettings.gameMode == "PVP")&&(playerColor == -1))){
              console.log(roomInfor.iniColor);
              tempPiece.style.opacity = "0";
            }
            tempPiece.setAttribute("fill", playerColor == 1 ? "black" : "white");
            }
            
            

          });

          function onClick(event) {
            
            if (gameStopped) {
              return; // If the game is stopped, return immediately without waiting for user input 
            }
            const rect = board.getBoundingClientRect();
            const x = event.clientX - rect.left;
            const y = event.clientY - rect.top;
            board.removeEventListener("click", onClick);
            board.removeChild(tempPiece);

            newx = Math.floor(x/30);
            newy = Math.floor(y/30);
            
            resolve([newx,newy]);
          }
    
          board.addEventListener("click", onClick);
        }),
        
        new Promise((resolve) => {
          const checkInterval = setInterval(() => {
            if (gameStopped||exchanged) {
              clearInterval(checkInterval);
              resolve([100, 100]);
            }
          }, 100);
        }),
      ]);


        function createTempPiece() {
          const piece = document.createElementNS("http://www.w3.org/2000/svg", "circle");
          piece.setAttribute("r", "4.2");
          piece.style.opacity = "0.3";
          piece.setAttribute("cx", -1000);
          piece.setAttribute("cy", -1000);
          return piece;
        }
      }
      // This function will get the position of the mouse on the board, as well as the position to drop the piece


      function checkTimeOut() {
        setInterval(() => {
          if (gameSettings.player1Timer.isTimeOut()) {
            gameStopped = true;
            winStatus = 2;
          } else if (gameSettings.player2Timer.isTimeOut()) {            
            gameStopped = true;
            winStatus = 1;
          }
        }, 1000);
      }


 
      function undoMove() {
        count = count - 2;
        countBlack = countBlack - 1;
        undoCount = 0;
        const undoButton = document.getElementById("undo-button");
        undoButton.style.display = 'none';
        
        boardStatus = JSON.parse(JSON.stringify(previousBoard[0]));
        ws.send(JSON.stringify({ type: 'onlyBoard', onlyBoard: boardStatus }));
        ws.send(JSON.stringify({ type: 'undo' }));
        previousBoard[0] = JSON.parse(JSON.stringify(boardStatus));
        previousBoard[1] = JSON.parse(JSON.stringify(boardStatus));
        previousBoard[2] = JSON.parse(JSON.stringify(boardStatus));
        ws.send(JSON.stringify({ type: 'previousBoard', previousBoard: previousBoard }));
        displayGoboard();
        
      }


      function threeStepExchange(){
        const exchangeButton = document.getElementById("exchange-button");
        exchangeButton.style.display = "block"; 
      }


      async function fiveStepThreeStrikes(){
        console.log('Enter fiveStepThreeStrikes');
        let lastboardStatus = JSON.parse(JSON.stringify(boardStatus));
        let threeStrikes;
        let validStatus = false;
        let movement1;
        let movement2;
        let movement3;
        const fiveStepThreeStrikesBlack = document.getElementById("fiveStepThreeStrikes-black");
        fiveStepThreeStrikesBlack.style.display = "block";
        
        const undoButton = document.getElementById("undo-button");
        undoButton.style.display = "none";

        while (!validStatus){
          movement1 = await getMovement(1);
          validStatus = isValid(movement1);
        }
        Update_for_53(movement1,0.5);////////////////////////
        displayGoboard();
        ws.send(JSON.stringify({ type: 'onlyBoard', onlyBoard: boardStatus }));//传送棋盘数据给白子
        validStatus = false;

        while (!validStatus){
          movement2 = await getMovement(1);
          validStatus = isValid(movement2);
        }
        Update_for_53(movement2,0.5);/////////////////////////
        displayGoboard();
        ws.send(JSON.stringify({ type: 'onlyBoard', onlyBoard: boardStatus }));//传送棋盘数据给白子
        validStatus = false;

        while (!validStatus){
          movement3 = await getMovement(1);
          validStatus = isValid(movement3);
        }
        Update_for_53(movement3,0.5);//////////////////////////
        displayGoboard();
        ws.send(JSON.stringify({ type: 'onlyBoard', onlyBoard: boardStatus }));//传送棋盘数据给白子

        threeStrikes = [movement1, movement2, movement3];
        ws.send(JSON.stringify({ type: '5Step3Hits', threeStrikes: threeStrikes }));//传送三子数据给白子
        //Black side chooses three places, then it's white side's turn
        ///////////////////////////////////////////////////////////////////////////////////
        //(等待)(加一个delay锁)
        //以haveGot5step3hitsChoice = 1 为解锁钥匙(这东西初值为0)
        const waitForAnotherDrop2 = async () => {
                return new Promise((resolve) => {
                  const checkInterval = setInterval(() => {
                    if (haveGot5step3hitsChoice == 1) {
                      clearInterval(checkInterval);
                      resolve();
                    }
                  }, 100);
                });
              };

        await waitForAnotherDrop2();
        ///////////////////////////////////////////////////////////////////////////////////
        fiveStepThreeStrikesBlack.style.display = "none";
        let position;
        position = getWhiteValidChoice;//得到的数据放到position里
        //position = await whiteChoose(threeStrikes);
        boardStatus = lastboardStatus;
        console.log(boardStatus);
        displayGoboard();
        undoButton.style.display = "block";

        return position;
      }


      async function whiteChoose(movements){
            
            console.log('Enter whiteChoose');
            if (player == 1){
              gameSettings.player1Timer.stop();
            }
            else{
              gameSettings.player2Timer.stop();
            }
            const fiveStepThreeStrikesWhite = document.getElementById("fiveStepThreeStrikes-white");
            fiveStepThreeStrikesWhite.style.display = "block";
            let validStatus = false;
            let choice
            while (!validStatus){
              choice = await getMovement(0);
              console.log(choice);
              console.log(movements[0]);
              console.log(movements[1]);
              console.log(movements[2]);
              if ((((choice[0] == movements[0][0])&&(choice[1] == movements[0][1]))||((choice[0] == movements[1][0])&&(choice[1] == movements[1][1])))||((choice[0] == movements[2][0])&&(choice[1] == movements[2][1]))){
                validStatus = true;
              }
              console.log(validStatus);
            }
            console.log(choice);
            fiveStepThreeStrikesWhite.style.display = "none";
            //////////////////////////////////////////////////////////////////////////////////////////
            const whiteValidChoice = choice;
            console.log('send whiteValidChoice');
            console.log(whiteValidChoice);
            ws.send(JSON.stringify({ type: 'whiteValidChoice', whiteValidChoice: whiteValidChoice }));
            //////////////////////////////////////////////////////////////////////////////////////////
            return choice;
            if (player == 1){
              gameSettings.player1Timer.start();
            }
            else{
              gameSettings.player2Timer.start();
            }
          }
      // This function is used in fiveStepThreeStrikes, white side choose which piece to place


      function displayPlayer(){

        if (playerColor == 1){
            if (player == 1){
              currentPlayerElement.innerHTML = `Current: ${gameSettings.player1Name}, black`;
            }
            else{
              currentPlayerElement.innerHTML = `Current: ${gameSettings.player2Name}, black`;
            }
          }else{
            if (player == 1){
              currentPlayerElement.innerHTML = `Current: ${gameSettings.player1Name}, white`;
            }
            else{
              currentPlayerElement.innerHTML = `Current: ${gameSettings.player2Name}, white`;
            }
          }
      }



      function checkEarlyTermination() {
        const len = boardStatus.length;
        let playerPriority = 0;

        function checkPattern(x, y, dx, dy, pattern) {
          const player = boardStatus[x][y];
          if (player === 0) return false;

          let count = 0;
          for (let i = 0; i < pattern.length; i++) {
            const newX = x + dx * i;
            const newY = y + dy * i;
            if (
              newX < 0 || newX >= len ||
              newY < 0 || newY >= len ||
              boardStatus[newX][newY] !== pattern[i] * player
            ) {
              return false;
            }
            if (pattern[i] === 1) count++;
          }
          return count === pattern.filter(e => e === 1).length;
        }

        function hasDoubleThree(x, y, player) {
          const patterns = [
            [1, 1, 0, 1],
            [1, 0, 1, 1],
            [1, 1, 1, 0]
          ];
          let count = 0;
          for (let dx = -1; dx <= 1; dx++) {
            for (let dy = -1; dy <= 1; dy++) {
              if (dx === 0 && dy === 0) continue;
              for (const pattern of patterns) {
                if (checkPattern(x, y, dx, dy, pattern)) {
                  count++;
                  if (count >= 2) return true;
                }
              }
            }
          }
          return false;
        }

        function hasOpenFour(x, y, player) {
          const patterns = [
            [1, 1, 1, 1, 0],
            [0, 1, 1, 1, 1],
            [1, 0, 1, 1, 1],
            [1, 1, 0, 1, 1],
            [1, 1, 1, 0, 1]
          ];
          for (let dx = -1; dx <= 1; dx++) {
            for (let dy = -1; dy <= 1; dy++) {
              if (dx === 0 && dy === 0) continue;
              for (const pattern of patterns) {
                if (checkPattern(x, y, dx, dy, pattern)) {
                  return true;
                }
              }
            }
          }
          return false;
        }

        for (let i = 0; i < len; i++) {
          for (let j = 0; j < len; j++) {
            if (boardStatus[i][j] !== 0) {
              const player = boardStatus[i][j];
              if (hasOpenFour(i, j, player)) {
                if (playerPriority === 0 || playerPriority === player) {
                  playerPriority = player;
                } else {
                  return false; // Both players have open four, no priority
                }
              } else if (hasDoubleThree(i, j, player)) {
                if (playerPriority === 0) {
                  playerPriority = player;
                } else if (playerPriority !== player) {
                  return false
                } else if (playerPriority !== player) {
                  return false; // Both players have double three, no priority
                }
              }
            }
          }
        }

  return playerPriority !== 0;
}

function displayStartTime(){
        const today = new Date();
        const year = today.getFullYear();
        const month = today.getMonth() + 1;
        const day = today.getDate();
        const hours = today.getHours();
        const minutes = today.getMinutes();

        const formattedTime = year + '-' + month + '-' + day + ' ' + hours + ':' + minutes;
        recordedStartTime = formattedTime;
        console.log(formattedTime);
        const displayStartTime = document.getElementById("timer-startdisplay");
        displayStartTime.innerHTML = `Start Time: ${formattedTime}`;
      }


    </script>
    <div onclick="redirectToStartPage()">
    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16" style="
    margin-left: 5px;
    margin-top: 5px;
    color: 7B6801;
">
  <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"></path>
</svg>
    
  </div>

    <script>
	function redirectToStartPage() {
			      console.log('Redirecting to StartPage...');
			      var urlParams = new URLSearchParams(window.location.search);
			      var userid = urlParams.get('userid');
			      var username = urlParams.get('username');
			      console.log('userid:', userid);
			      var newUrl = 'http://34.237.159.19/bigBang/user/StartPage.html?userid=' + userid + '&username=' + username;
			      console.log('new URL:', newUrl);
			      window.location.href = newUrl;
		    }

    </script>




    

</body>
</html>