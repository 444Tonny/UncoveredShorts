<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
   
 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Uncovered Shorts</title>

    <link rel="stylesheet" href="{{ asset('css/header.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/game.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}?t={{ time() }}">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
  </head>

  <body>

    <header>
      <img class='h-logo' src="{{ asset('img/logo.png') }}" alt="">
      <div class="header-links">
        <button class='hl-icon' onclick=openModalById('rulesModal')> 
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"><g id="_01_align_center" data-name="01 align center"><path d="M12,24A12,12,0,1,1,24,12,12.013,12.013,0,0,1,12,24ZM12,2A10,10,0,1,0,22,12,10.011,10.011,0,0,0,12,2Z"/><path d="M14,19H12V12H10V10h2a2,2,0,0,1,2,2Z"/><circle cx="12" cy="6.5" r="1.5"/></g></svg>
        </button>

        <button class='hl-icon' onclick=openModalById('statsModal')> 
          <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="20" height="20"><path d="M13,0h-2c-1.1,0-2,.9-2,2V24h6V2c0-1.1-.9-2-2-2Zm0,22h-2V2h2V22ZM22,6h-2c-1.1,0-2,.9-2,2V24h6V8c0-1.1-.9-2-2-2Zm0,16h-2V8h2v14ZM4,12H2c-1.1,0-2,.9-2,2v10H6V14c0-1.1-.9-2-2-2Zm0,10H2V14h2v8Z"/></svg>
        </button>

        <button class='hl-icon' onclick=openModalById('feedbackModal')> 
          <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="20" height="20"><path d="m13.5,10.5c0,.828-.672,1.5-1.5,1.5s-1.5-.672-1.5-1.5.672-1.5,1.5-1.5,1.5.672,1.5,1.5Zm3.5-1.5c-.828,0-1.5.672-1.5,1.5s.672,1.5,1.5,1.5,1.5-.672,1.5-1.5-.672-1.5-1.5-1.5Zm-10,0c-.828,0-1.5.672-1.5,1.5s.672,1.5,1.5,1.5,1.5-.672,1.5-1.5-.672-1.5-1.5-1.5Zm17-5v12c0,2.206-1.794,4-4,4h-2.852l-3.848,3.18c-.361.322-.824.484-1.292.484-.476,0-.955-.168-1.337-.507l-3.749-3.157h-2.923c-2.206,0-4-1.794-4-4V4C0,1.794,1.794,0,4,0h16c2.206,0,4,1.794,4,4Zm-2,0c0-1.103-.897-2-2-2H4c-1.103,0-2,.897-2,2v12c0,1.103.897,2,2,2h3.288c.235,0,.464.083.645.235l4.048,3.41,4.171-3.416c.179-.148.404-.229.637-.229h3.212c1.103,0,2-.897,2-2V4Z"/></svg>
        </button>
      </div>
    </header>

    <main>
      <div class='game-section'>
        <div class="game-block">
          <div class="question-block">
            <span class="numero">Q1</span>
            <h2 class="question">Name a global city with a major ($1 trillion market market cap or greater) stock exchange ?</h2>
            <div class="answer-block">
              <input class='answer' type="text" name="answer" value='TOKYO' placeholder='ANSWER HERE...' readonly>
              <span class='point point-set'>90</span>
            </div>
          </div>

          <div class="question-block">
            <span class="numero">Q2</span>
            <h2 class="question">Name a company with a single letter stock ticker ?</h2>
            <div class="answer-block">
              <input onclick=openModalById('searchModal') class='answer' type="text" name="answer" value='' placeholder='ANSWER HERE...' readonly>
              <span class='point point-unset'>00</span>
            </div>
          </div>

          <div class="question-block">
            <span class="numero">Q3</span>
            <h2 class="question">Name the shortest tenured company in the DJIA?</h2>
            <div class="answer-block">
              <input class='answer' type="text" name="answer" value='CITIGROUP' placeholder='ANSWER HERE...' readonly>
              <span class='point point-set'>90</span>
            </div>
          </div>

          <div class="question-block">
            <span class="numero">Q4</span>
            <h2 class="question">Name the largest company by market cap in Germany?</h2>
            <div class="answer-block">
              <input class='answer' type="text" name="answer" value='SAP SE' placeholder='ANSWER HERE...' readonly>
              <span class='point point-set'>90</span>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Windows -->

    <div class="modal-background" id="modalBackground">

      <!-- Answers list modal -->
      <div class="modal" id="searchModal">
        <button class="close-modal" onclick=closeModalById('searchModal')>×</button>
        <div class="search-bar">
          <input type="text" class='search' name="" id="" placeholder="Type here...">
        </div>
        <div class="suggestions">
          <span class="single-suggestion">
            <p>Argentina</p>
            <button>Select</button>
          </span>
          <span class="single-suggestion">
            <p>Albania</p>
            <button>Select</button>
          </span>
          <span class="single-suggestion">
            <p>Andorre</p>
            <button>Select</button>
          </span>
          <span class="single-suggestion">
            <p>Armenia</p>
            <button>Select</button>
          </span>
          <span class="single-suggestion">
            <p>Angola</p>
            <button>Select</button>
          </span>
        </div>
      </div>

      <!-- Rules modal -->
      <div class="modal" id="rulesModal">
        <button class="close-modal" onclick=closeModalById('rulesModal')>×</button>
        <h3>RULES</h3>
        <div class="rules-text">
          <p>
          The goal is to get the highest score possible.
          <br>
          You will be presented with four questions, which will be of two question types:  
          <br>
          <br>
          <strong>"Unique"</strong> questions will have multiple correct answers.  Points for correct answers will be based on how unique your answer is compared to other participants.
          <br>
          For example:
          <br>
          <strong>&bull;</strong> Name a company in the S&P 500?
          <br>
          <strong>&bull;</strong> Apple, while being a correct answer, will likely yield less points than Hershey
          </br>          
          <br>
          <strong>"Ranked List"</strong> questions will challenge you to name the top ranking of a list.  The top 10 will score points in descending order.  
          <br>
          For example:
          <br>
          <strong>&bull;</strong> Name the largest country by total area?
          <br>
          <strong>&bull;</strong> Answering Russia will be worth the maximum 100pts, Canada (#2) will score 90pts, Algeria (#10) will score 10pts
          <br>  
          <br>
          Share your results and compete with friends!
          </p>
        </div>
        <button class="play" onclick=closeModalById('rulesModal')>PLAY</button>
      </div>

      <!-- Rules modal -->
      <div class="modal" id="feedbackModal">
        <button class="close-modal" onclick=closeModalById('feedbackModal')>×</button>
        <h3>FEEDBACK</h3>
        <span class='feedback-text'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi hic vero facilis quibusdam. </span>
        <form class='feedback-form' action="" method="get">
          <label for="">Name</label>
          <input type="text" placeholder="Name...">
          <label for="">Your email</label>
          <input type="email" placeholder="youremail@example.com">
          <label for="">Message</label>
          <textarea name="" id="" cols="30" rows="10" placeholder="Message..."></textarea>
          <input type="submit" class='send' value="SEND">
        </form>
      </div>

      <!-- Stats -->
      <div class="modal" id="statsModal">
        <button class="close-modal" onclick=closeModalById('statsModal')>×</button>
        <h3 style="text-align: center;">STATISTICS</h3>
        <span class='statsModal-text smt1'>
          Today's game stats 
        </span>
        <span class='statsModal-text smt2'>
          UNCOVERED SHORTS #25 
        </span>
        <div class="boxes-container">
          <div class="box">
            <p class="stats-value">166.4</p>
            <label>Average <br> score</label>
          </div>
          <div class="box scale">
            <p class="stats-value">56</p>
            <label>Games <br> played</label>
          </div>
          <div class="box">
            <p class="stats-value">239.6</p>
            <label>Top <br> score</label>
          </div>
        </div>
      </div>
    
    <script src="{{ asset('js/game.js') }}"></script>

  </body>

</html>