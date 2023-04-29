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

    <?php 
    session_start();
    $game_record = $_SESSION['game_record'];
    // define board variable for js
    echo '<script>var board_record = "' . $game_record . '";</script>';
    // echo '<script>console.log(board_record);</script>';
    ?>
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
      

    <script>
//-----------------------------------------------------------------------------------------------------------------------        
      

//-----------------------------------------------------------------------------------------------------------------------      

      console.log('board_record' + board_record);
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

      displayGoboard();


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