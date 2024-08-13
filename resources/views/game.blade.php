<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Tonny Andriambololona">
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Uncovered Shorts : The goal of the game is to get the highest score possible. You will be presented with four questions, which will be of two question types 'Unique' and 'Ranked'">


  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Uncovered Shorts - Daily quiz game</title>

    <!-- Open Graph meta tags -->
    <meta property="og:title" content="Uncovered Shorts">
    <meta property="og:description" content="Uncovered Shorts : The goal of the game is to get the highest score possible. You will be presented with four questions, which will be of two question types 'Unique' and 'Ranked'">
    <meta property="og:image" content="{{ asset('img/square-logo.png') }}">
    <meta property="og:url" content="https://www.uncoveredshorts.com">
    <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Tonny Andriambololona">
    <link rel="icon" href="https://uncoveredshorts.com/img/favicon.png" type="image/x-icon">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="OCq1FDkkyZYJuM8jhOHEA0jxQ8r5vQ48kE2TF1eg">
    <meta name="description" content="Uncovered Shorts : The goal of the game is to get the highest score possible. You will be presented with four questions, which will be of two question types 'Unique' and 'Ranked'">


  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Uncovered Shorts - Daily quiz game</title>

    <!-- Open Graph meta tags -->
    <meta property="og:title" content="Uncovered Shorts">
    <meta property="og:description" content="Uncovered Shorts : The goal of the game is to get the highest score possible. You will be presented with four questions, which will be of two question types 'Unique' and 'Ranked'">
    <meta property="og:image" content="https://uncoveredshorts.com/img/square-logo.png">
    <meta property="og:url" content="https://www.uncoveredshorts.com">
    
    <!-- Twitter Card meta tags -->
    <meta name="twitter:card" content="uncovered_shorts_image">
    <meta name="twitter:title" content="Uncovered Shorts">
    <meta name="twitter:description" content="Uncovered Shorts : The goal of the game is to get the highest score possible. You will be presented with four questions, which will be of two question types 'Unique' and 'Ranked' ">
    

    <link rel="stylesheet" href="https://uncoveredshorts.com/css/layout.css?t=">
    <link rel="stylesheet" href="https://uncoveredshorts.com/css/game.css?t=1.02">
    <link rel="stylesheet" href="https://uncoveredshorts.com/css/modal.css?t=1.138">

    <!-- Fonts -->
    <link href="https://fonts.cdnfonts.com/css/switzer" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
  </head>

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-P5M59RPS65"></script>
  <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());


  gtag('config', 'G-P5M59RPS65');
  </script>

  <body>
    <header>
      <img class='h-logo' src="https://uncoveredshorts.com/img/logo.png" alt="uncovered-short-logo">
      <div class="header-links">
        <button class='hl-icon' onclick=openModalById('rulesModal')> 
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22"><g id="_01_align_center" data-name="01 align center"><path d="M12,24A12,12,0,1,1,24,12,12.013,12.013,0,0,1,12,24ZM12,2A10,10,0,1,0,22,12,10.011,10.011,0,0,0,12,2Z"/><path d="M14,19H12V12H10V10h2a2,2,0,0,1,2,2Z"/><circle cx="12" cy="6.5" r="1.5"/></g></svg>
        </button>

        <button class='hl-icon' onclick=openModalById('gameOverModal')> 
          <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="22" height="22"><path d="M13,0h-2c-1.1,0-2,.9-2,2V24h6V2c0-1.1-.9-2-2-2Zm0,22h-2V2h2V22ZM22,6h-2c-1.1,0-2,.9-2,2V24h6V8c0-1.1-.9-2-2-2Zm0,16h-2V8h2v14ZM4,12H2c-1.1,0-2,.9-2,2v10H6V14c0-1.1-.9-2-2-2Zm0,10H2V14h2v8Z"/></svg>
        </button>

        <button class="hl-icon" onclick=openModalById('LeaderboardModal')>
          <svg fill="#FFFFFF" width="25" height="25" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" style="enable-background:new 0 0 1024 1024" xml:space="preserve"><path d="M918.4 201.6c-6.4-6.4-12.8-9.6-22.4-9.6H768V96c0-9.6-3.2-16-9.6-22.4C752 67.2 745.6 64 736 64H288c-9.6 0-16 3.2-22.4 9.6C259.2 80 256 86.4 256 96v96H128c-9.6 0-16 3.2-22.4 9.6-6.4 6.4-9.6 16-9.6 22.4 3.2 108.8 25.6 185.6 64 224 34.4 34.4 77.56 55.65 127.65 61.99 10.91 20.44 24.78 39.25 41.95 56.41 40.86 40.86 91 65.47 150.4 71.9V768h-96c-9.6 0-16 3.2-22.4 9.6-6.4 6.4-9.6 12.8-9.6 22.4s3.2 16 9.6 22.4c6.4 6.4 12.8 9.6 22.4 9.6h256c9.6 0 16-3.2 22.4-9.6 6.4-6.4 9.6-12.8 9.6-22.4s-3.2-16-9.6-22.4c-6.4-6.4-12.8-9.6-22.4-9.6h-96V637.26c59.4-7.71 109.54-30.01 150.4-70.86 17.2-17.2 31.51-36.06 42.81-56.55 48.93-6.51 90.02-27.7 126.79-61.85 38.4-38.4 60.8-112 64-224 0-6.4-3.2-16-9.6-22.4zM256 438.4c-19.2-6.4-35.2-19.2-51.2-35.2-22.4-22.4-35.2-70.4-41.6-147.2H256v182.4zm390.4 80C608 553.6 566.4 576 512 576s-99.2-19.2-134.4-57.6C342.4 480 320 438.4 320 384V128h384v256c0 54.4-19.2 99.2-57.6 134.4zm172.8-115.2c-16 16-32 25.6-51.2 35.2V256h92.8c-6.4 76.8-19.2 124.8-41.6 147.2zM768 896H256c-9.6 0-16 3.2-22.4 9.6-6.4 6.4-9.6 12.8-9.6 22.4s3.2 16 9.6 22.4c6.4 6.4 12.8 9.6 22.4 9.6h512c9.6 0 16-3.2 22.4-9.6 6.4-6.4 9.6-12.8 9.6-22.4s-3.2-16-9.6-22.4c-6.4-6.4-12.8-9.6-22.4-9.6z"/></svg>
        </button>
        
        <button class='hl-icon' onclick=openModalById('feedbackModal')> 
          <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="22" height="22"><path d="m13.5,10.5c0,.828-.672,1.5-1.5,1.5s-1.5-.672-1.5-1.5.672-1.5,1.5-1.5,1.5.672,1.5,1.5Zm3.5-1.5c-.828,0-1.5.672-1.5,1.5s.672,1.5,1.5,1.5,1.5-.672,1.5-1.5-.672-1.5-1.5-1.5Zm-10,0c-.828,0-1.5.672-1.5,1.5s.672,1.5,1.5,1.5,1.5-.672,1.5-1.5-.672-1.5-1.5-1.5Zm17-5v12c0,2.206-1.794,4-4,4h-2.852l-3.848,3.18c-.361.322-.824.484-1.292.484-.476,0-.955-.168-1.337-.507l-3.749-3.157h-2.923c-2.206,0-4-1.794-4-4V4C0,1.794,1.794,0,4,0h16c2.206,0,4,1.794,4,4Zm-2,0c0-1.103-.897-2-2-2H4c-1.103,0-2,.897-2,2v12c0,1.103.897,2,2,2h3.288c.235,0,.464.083.645.235l4.048,3.41,4.171-3.416c.179-.148.404-.229.637-.229h3.212c1.103,0,2-.897,2-2V4Z"/></svg>
        </button>

      </div>
    </header>

    <main>
      <h1>Uncovered shorts</h1>
      <div class='game-section'>
        <div class="game-block">
          <div class="question-block">
            <span class="numero">Q1 <b class='letter-type'>U</b> </span>
            <h2 class="question" data="Name a US city with a stock exchange">Name a US city with a stock exchange</h2>
            <div class="answer-block">
              <input id='us-ipt1' onclick="updateCurrentSearchQuestion(event), setActivePlayerInput('us-ipt1'), openModalById('searchModal'), displaySuggestions(suggestions1)"  class='answer' type="text" name="answer" value='' placeholder='ANSWER HERE...' readonly>
              <span id='us-pts1' class='points'>-</span>
            </div>
          </div>

          <div class="question-block">
            <span class="numero">Q2 <b class='letter-type'>U</b></span>
            <h2 class="question" data="Citigroup was formed in 1998, name any CEO in its history since then">Citigroup was formed in 1998, name any CEO in its history since then</h2>
            <div class="answer-block">
              <input id='us-ipt2' onclick="updateCurrentSearchQuestion(event), setActivePlayerInput('us-ipt2'), openModalById('searchModal'), displaySuggestions(suggestions2)" class='answer' type="text" name="answer" value='' placeholder='ANSWER HERE...' readonly>
              <span id='us-pts2' class='points'>-</span>
            </div>
          </div>

          <div class="question-block">
            <span class="numero">Q3 <b class='letter-type'>R</b></span>
            <h2 class="question" data="What is the largest life insurance company by premiums written?">What is the largest life insurance company by premiums written?</h2>
            <div class="answer-block">
              <input id='us-ipt3' onclick="updateCurrentSearchQuestion(event), setActivePlayerInput('us-ipt3'), openModalById('searchModal'), displaySuggestions(suggestions3)" class='answer' type="text" name="answer" value='' placeholder='ANSWER HERE...' readonly>
              <span id='us-pts3' class='points'>-</span>
            </div>
          </div>

          <div class="question-block">
            <span class="numero">Q4 <b class='letter-type'>R</b></span>
            <h2 class="question" data="What is the most recently founded company in the S&P 500?">What is the most recently founded company in the S&P 500?</h2>
            <div class="answer-block">
              <input id='us-ipt4' onclick="updateCurrentSearchQuestion(event), setActivePlayerInput('us-ipt4'), openModalById('searchModal'), displaySuggestions(suggestions4)" class='answer' type="text" name="answer" value='' placeholder='ANSWER HERE...' readonly>
              <span id='us-pts4' class='points'>-</span>
            </div>
          </div>
        </div>
      </div>
    </main>

    <footer>
      <div class="footer-s1">© 2024 Uncovered Shorts</div>
      <div class="footer-s2">
        <?xml version="1.0" encoding="iso-8859-1"?>
          <span class="folllow-us">Find us on</span>
          <a href="https://www.instagram.com/uncoveredshorts/" target='_blank'>
            <svg fill="#161616" color="" style='background:#EDEDED;' height="35px" width="35px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
            viewBox="0 0 455.73 455.73" xml:space="preserve">
          <path d="M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31c0,24.99,20.34,45.33,45.32,45.33c24.99,0,45.32-20.34,45.32-45.33
            C273.18,202.88,252.85,182.55,227.86,182.55z M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31c0,24.99,20.34,45.33,45.32,45.33
            c24.99,0,45.32-20.34,45.32-45.33C273.18,202.88,252.85,182.55,227.86,182.55z M303.36,108.66H152.37
            c-24.1,0-43.71,19.61-43.71,43.71v150.99c0,24.1,19.61,43.71,43.71,43.71h150.99c24.1,0,43.71-19.61,43.71-43.71V152.37
            C347.07,128.27,327.46,108.66,303.36,108.66z M227.86,306.35c-43.27,0-78.48-35.21-78.48-78.49c0-43.27,35.21-78.48,78.48-78.48
            c43.28,0,78.49,35.21,78.49,78.48C306.35,271.14,271.14,306.35,227.86,306.35z M308.87,165.61c-10.24,0-18.57-8.33-18.57-18.57
            s8.33-18.57,18.57-18.57s18.57,8.33,18.57,18.57S319.11,165.61,308.87,165.61z M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31
            c0,24.99,20.34,45.33,45.32,45.33c24.99,0,45.32-20.34,45.32-45.33C273.18,202.88,252.85,182.55,227.86,182.55z M303.36,108.66
            H152.37c-24.1,0-43.71,19.61-43.71,43.71v150.99c0,24.1,19.61,43.71,43.71,43.71h150.99c24.1,0,43.71-19.61,43.71-43.71V152.37
            C347.07,128.27,327.46,108.66,303.36,108.66z M227.86,306.35c-43.27,0-78.48-35.21-78.48-78.49c0-43.27,35.21-78.48,78.48-78.48
            c43.28,0,78.49,35.21,78.49,78.48C306.35,271.14,271.14,306.35,227.86,306.35z M308.87,165.61c-10.24,0-18.57-8.33-18.57-18.57
            s8.33-18.57,18.57-18.57s18.57,8.33,18.57,18.57S319.11,165.61,308.87,165.61z M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31
            c0,24.99,20.34,45.33,45.32,45.33c24.99,0,45.32-20.34,45.32-45.33C273.18,202.88,252.85,182.55,227.86,182.55z M0,0v455.73h455.73
            V0H0z M380.23,303.36c0,42.39-34.48,76.87-76.87,76.87H152.37c-42.39,0-76.87-34.48-76.87-76.87V152.37
            c0-42.39,34.48-76.87,76.87-76.87h150.99c42.39,0,76.87,34.48,76.87,76.87V303.36z M303.36,108.66H152.37
            c-24.1,0-43.71,19.61-43.71,43.71v150.99c0,24.1,19.61,43.71,43.71,43.71h150.99c24.1,0,43.71-19.61,43.71-43.71V152.37
            C347.07,128.27,327.46,108.66,303.36,108.66z M227.86,306.35c-43.27,0-78.48-35.21-78.48-78.49c0-43.27,35.21-78.48,78.48-78.48
            c43.28,0,78.49,35.21,78.49,78.48C306.35,271.14,271.14,306.35,227.86,306.35z M308.87,165.61c-10.24,0-18.57-8.33-18.57-18.57
            s8.33-18.57,18.57-18.57s18.57,8.33,18.57,18.57S319.11,165.61,308.87,165.61z M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31
            c0,24.99,20.34,45.33,45.32,45.33c24.99,0,45.32-20.34,45.32-45.33C273.18,202.88,252.85,182.55,227.86,182.55z M227.86,182.55
            c-24.98,0-45.32,20.33-45.32,45.31c0,24.99,20.34,45.33,45.32,45.33c24.99,0,45.32-20.34,45.32-45.33
            C273.18,202.88,252.85,182.55,227.86,182.55z M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31c0,24.99,20.34,45.33,45.32,45.33
            c24.99,0,45.32-20.34,45.32-45.33C273.18,202.88,252.85,182.55,227.86,182.55z M303.36,108.66H152.37
            c-24.1,0-43.71,19.61-43.71,43.71v150.99c0,24.1,19.61,43.71,43.71,43.71h150.99c24.1,0,43.71-19.61,43.71-43.71V152.37
            C347.07,128.27,327.46,108.66,303.36,108.66z M227.86,306.35c-43.27,0-78.48-35.21-78.48-78.49c0-43.27,35.21-78.48,78.48-78.48
            c43.28,0,78.49,35.21,78.49,78.48C306.35,271.14,271.14,306.35,227.86,306.35z M308.87,165.61c-10.24,0-18.57-8.33-18.57-18.57
            s8.33-18.57,18.57-18.57s18.57,8.33,18.57,18.57S319.11,165.61,308.87,165.61z M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31
            c0,24.99,20.34,45.33,45.32,45.33c24.99,0,45.32-20.34,45.32-45.33C273.18,202.88,252.85,182.55,227.86,182.55z M227.86,182.55
            c-24.98,0-45.32,20.33-45.32,45.31c0,24.99,20.34,45.33,45.32,45.33c24.99,0,45.32-20.34,45.32-45.33
            C273.18,202.88,252.85,182.55,227.86,182.55z M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31c0,24.99,20.34,45.33,45.32,45.33
            c24.99,0,45.32-20.34,45.32-45.33C273.18,202.88,252.85,182.55,227.86,182.55z M303.36,108.66H152.37
            c-24.1,0-43.71,19.61-43.71,43.71v150.99c0,24.1,19.61,43.71,43.71,43.71h150.99c24.1,0,43.71-19.61,43.71-43.71V152.37
            C347.07,128.27,327.46,108.66,303.36,108.66z M227.86,306.35c-43.27,0-78.48-35.21-78.48-78.49c0-43.27,35.21-78.48,78.48-78.48
            c43.28,0,78.49,35.21,78.49,78.48C306.35,271.14,271.14,306.35,227.86,306.35z M308.87,165.61c-10.24,0-18.57-8.33-18.57-18.57
            s8.33-18.57,18.57-18.57s18.57,8.33,18.57,18.57S319.11,165.61,308.87,165.61z M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31
            c0,24.99,20.34,45.33,45.32,45.33c24.99,0,45.32-20.34,45.32-45.33C273.18,202.88,252.85,182.55,227.86,182.55z"/>
          </svg>
          <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
        </a>
      </div>
    </footer>

    <!-- Modals --> 
      <div class="modal" id="gameOverModal">
        <button class="close-modal" onclick=closeModalById('gameOverModal')>×</button>
        <div class="go-box">
          <img src="https://uncoveredshorts.com/img/logo.png" width='180' alt="uncovered-shorts-logo" class="gameOverLogo">
          <p class="go-text"><b id='congrats-text'>Your score today:</b></p>
          <div class='go-finalscore'><span id="go-points">0</span><b id="go-percentile">(0%)</b></div>
          <div class="two-column">
            <span>Today's <br> Average <br> Score <br><b id='AverageScoreResults'>168</b></span>
            <span>Today's <br> Top <br>Score <br><b id='TopScoreResults'>373</b></span>
            <span>Personal <br> Average <br> Score <br><b id='personalAverage'>0</b></span>
          </div>
          <span>Games played = <b id='personalGameCount'>0</b>/<b id='trackedGameCount'>64</b> </span>
          <span><br><b>YOU'RE STREAKING!</b><br> <b id="personalStreak">0 day</b> played in a row <br></span>
          <div class="go-buttons">
            <button class="go-share" onclick="openModalById('shareModal'), shareGame()">SHARE</button>
            <button class="go-leaderboard" onclick="openModalById('LeaderboardModal')">LEADERBOARD</button>
          </div>
          <div class="subscribing">
            <label for="">Get a recap of the most popular answers</label>
            <form id='subscribe-form' class="row sf-form" method="POST">
              <input class='sf-email' name='sf-email' type="email" placeholder="Your email...">
              <input class='sf-submit' type="submit" value="I'm In!">
            </form>
            <div id="sf-message" style="color: rgb(202, 59, 59); display: none;"></div>
          </div>
          <div id="go-bestanswers" class="go-bestanswers">
            <p class="go-text"><b>Q1 - Best answers</b></p>
            <span class='go-best-answer'><b>#1 :</b> Miami</span>
            <span class='go-best-answer'><b>#2 :</b> Jersey City</span>
            <span class='go-best-answer'><b>#3 :</b> Boston</span>
          </div>
          <br>
          <div  class="go-bestanswers">
            <p class="go-text"><b>Q2 - Best answers</b></p>
            <span class='go-best-answer'><b>#1 :</b> Michael Corbat</span>
            <span class='go-best-answer'><b>#2 :</b> Charles Prince</span>
            <span class='go-best-answer'><b>#3 :</b> Vikram Pandit</span>
          </div>
          <br>
          <div class="go-bestanswers">
            <p class="go-text"><b>Q3 - Top answers</b></p>
            <span class='go-best-answer'><b>#1 :</b> New York Life Insurance</span>
            <span class='go-best-answer'><b>#2 :</b> Northwestern Mutual</span>
            <span class='go-best-answer'><b>#3 :</b> MetLife</span>
          </div>
          <br>
          <div class="go-bestanswers">
            <p class="go-text"><b>Q4 - Top answers</b></p>
            <span class='go-best-answer'><b>#1 :</b> CrowdStrike</span>
            <span class='go-best-answer'><b>#2 :</b> Moderna</span>
            <span class='go-best-answer'><b>#3 :</b> Uber</span>
          </div>
        </div>
      </div>

      <!-- LEADERBOARD -->
      <div class="modal" id="LeaderboardModal">
        <button class="close-modal" onclick=closeModalById('LeaderboardModal')>×</button>
        <img class='lb-logo' src="https://uncoveredshorts.com/img/logo.png" width='180' alt="uncovered-shorts-logo">

        <div class="list-leaderboard">
          <div class="lb-box">
            <span class="spacing-20"></span>
            <p class="lb-text"><b>TODAY'S TOP SCORES</b></p>
            <span class="spacing-10"></span>
            <div class="ranking-bloc">
                              <div class="ranking-row ">
                    <span class="ranking-number">#1</span>
                    <span class="ranking-initial" id="ranking-initial-1">CDS</span>
                    <span class="ranking-score" id="ranking-score-1">373</span>
                </div>
                              <div class="ranking-row  rr-dark ">
                    <span class="ranking-number">#2</span>
                    <span class="ranking-initial" id="ranking-initial-2">Cjm</span>
                    <span class="ranking-score" id="ranking-score-2">367</span>
                </div>
                              <div class="ranking-row ">
                    <span class="ranking-number">#3</span>
                    <span class="ranking-initial" id="ranking-initial-3">Jmt</span>
                    <span class="ranking-score" id="ranking-score-3">356</span>
                </div>
                              <div class="ranking-row  rr-dark ">
                    <span class="ranking-number">#4</span>
                    <span class="ranking-initial" id="ranking-initial-4">Rgb</span>
                    <span class="ranking-score" id="ranking-score-4">341</span>
                </div>
                              <div class="ranking-row ">
                    <span class="ranking-number">#5</span>
                    <span class="ranking-initial" id="ranking-initial-5">PRB</span>
                    <span class="ranking-score" id="ranking-score-5">326</span>
                </div>
                              <div class="ranking-row  rr-dark ">
                    <span class="ranking-number">#6</span>
                    <span class="ranking-initial" id="ranking-initial-6">Meg</span>
                    <span class="ranking-score" id="ranking-score-6">318</span>
                </div>
                              <div class="ranking-row ">
                    <span class="ranking-number">#7</span>
                    <span class="ranking-initial" id="ranking-initial-7">VFP</span>
                    <span class="ranking-score" id="ranking-score-7">317</span>
                </div>
                              <div class="ranking-row  rr-dark ">
                    <span class="ranking-number">#8</span>
                    <span class="ranking-initial" id="ranking-initial-8">CCS</span>
                    <span class="ranking-score" id="ranking-score-8">313</span>
                </div>
                              <div class="ranking-row ">
                    <span class="ranking-number">#9</span>
                    <span class="ranking-initial" id="ranking-initial-9">SPR</span>
                    <span class="ranking-score" id="ranking-score-9">299</span>
                </div>
                              <div class="ranking-row  rr-dark ">
                    <span class="ranking-number">#10</span>
                    <span class="ranking-initial" id="ranking-initial-10">ANT</span>
                    <span class="ranking-score" id="ranking-score-10">293</span>
                </div>
                          </div>
          </div>
  
          <!-- PERSONNALIZED LEADERBOARD -->
          <div class="lb-box">
            <span class="spacing-20"></span>
            <form action="" class="form-group-selection">
              <select name='playerGroup' id='playerGroup' required>
                <option value="Group Leaderboard" disabled selected>Group Leaderboard</option>
                <option value="No Group">No Group</option>
                                    <option value="Davilla">Davilla</option>
                                    <option value="Expect Equity">Expect Equity</option>
                                    <option value="Female In Finance">Female In Finance</option>
                                    <option value="FS Interns">FS Interns</option>
                                    <option value="JPM Credit Portfolio">JPM Credit Portfolio</option>
                                    <option value="JPM Equities">JPM Equities</option>
                                    <option value="JPM Priv Bank">JPM Priv Bank</option>
                                    <option value="PH-A">PH-A</option>
                                    <option value="Polska &lt;&gt; Texas">Polska &lt;&gt; Texas</option>
                                    <option value="Speedos">Speedos</option>
                                    <option value="The Rosen Report">The Rosen Report</option>
                                    <option value="Trail Roots">Trail Roots</option>
                                    <option value="UM Ross Alums">UM Ross Alums</option>
                              </select>
              <div class="help-tip">
                <p>If you want a specific group leaderboard added, please contact
                  <a href="mailto:tucker@uncoveredshorts.com">tucker@uncoveredshorts.com</a>
                </p>
            </div>
            </form>
            <span class="spacing-10"></span>
            <div class="ranking-bloc" id='rb-groupleaderboard'>
                              <div class="ranking-row ">
                    <span class="ranking-number">#1</span>
                    <span class="ranking-initial" id="perso-ranking-initial-1">???</span>
                    <span class="ranking-score" id="perso-ranking-score-1">0</span>
                </div>
                              <div class="ranking-row  rr-dark ">
                    <span class="ranking-number">#2</span>
                    <span class="ranking-initial" id="perso-ranking-initial-2">???</span>
                    <span class="ranking-score" id="perso-ranking-score-2">0</span>
                </div>
                              <div class="ranking-row ">
                    <span class="ranking-number">#3</span>
                    <span class="ranking-initial" id="perso-ranking-initial-3">???</span>
                    <span class="ranking-score" id="perso-ranking-score-3">0</span>
                </div>
                              <div class="ranking-row  rr-dark ">
                    <span class="ranking-number">#4</span>
                    <span class="ranking-initial" id="perso-ranking-initial-4">???</span>
                    <span class="ranking-score" id="perso-ranking-score-4">0</span>
                </div>
                              <div class="ranking-row ">
                    <span class="ranking-number">#5</span>
                    <span class="ranking-initial" id="perso-ranking-initial-5">???</span>
                    <span class="ranking-score" id="perso-ranking-score-5">0</span>
                </div>
                          <!-- icon info leaderboard -->
            </div>
          </div>
  
          <!-- STREAK LEADERBOARD -->
          <div class="lb-box">
            <span class="spacing-20"></span>
            <p class="lb-text"><b>TOTAL STREAK</b></p>
            <span class="spacing-10"></span>
            <div class="ranking-bloc">
                              <div class="ranking-row ">
                    <span class="ranking-number">#1</span>
                    <span class="ranking-initial" id="streak-ranking-initial-1">Djs</span>
                    <span class="ranking-score" id="streak-ranking-score-1">64</span>
                </div>
                              <div class="ranking-row  rr-dark ">
                    <span class="ranking-number">#2</span>
                    <span class="ranking-initial" id="streak-ranking-initial-2">PRB</span>
                    <span class="ranking-score" id="streak-ranking-score-2">64</span>
                </div>
                              <div class="ranking-row ">
                    <span class="ranking-number">#3</span>
                    <span class="ranking-initial" id="streak-ranking-initial-3">Jch</span>
                    <span class="ranking-score" id="streak-ranking-score-3">64</span>
                </div>
                              <div class="ranking-row  rr-dark ">
                    <span class="ranking-number">#4</span>
                    <span class="ranking-initial" id="streak-ranking-initial-4">MRF</span>
                    <span class="ranking-score" id="streak-ranking-score-4">52</span>
                </div>
                              <div class="ranking-row ">
                    <span class="ranking-number">#5</span>
                    <span class="ranking-initial" id="streak-ranking-initial-5">Iss</span>
                    <span class="ranking-score" id="streak-ranking-score-5">51</span>
                </div>
                              <div class="ranking-row  rr-dark ">
                    <span class="ranking-number">#6</span>
                    <span class="ranking-initial" id="streak-ranking-initial-6">MFF</span>
                    <span class="ranking-score" id="streak-ranking-score-6">31</span>
                </div>
                              <div class="ranking-row ">
                    <span class="ranking-number">#7</span>
                    <span class="ranking-initial" id="streak-ranking-initial-7">NIK</span>
                    <span class="ranking-score" id="streak-ranking-score-7">29</span>
                </div>
                              <div class="ranking-row  rr-dark ">
                    <span class="ranking-number">#8</span>
                    <span class="ranking-initial" id="streak-ranking-initial-8">JLV</span>
                    <span class="ranking-score" id="streak-ranking-score-8">29</span>
                </div>
                              <div class="ranking-row ">
                    <span class="ranking-number">#9</span>
                    <span class="ranking-initial" id="streak-ranking-initial-9">TCS</span>
                    <span class="ranking-score" id="streak-ranking-score-9">26</span>
                </div>
                              <div class="ranking-row  rr-dark ">
                    <span class="ranking-number">#10</span>
                    <span class="ranking-initial" id="streak-ranking-initial-10">HDL</span>
                    <span class="ranking-score" id="streak-ranking-score-10">26</span>
                </div>
                          </div>
          </div>

        </div>
      </div>

    <div class="modal-background" id="modalBackground">

      <!-- Subscribing -->
      <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('subscribe-form').addEventListener('submit', function (e) {
                e.preventDefault();
        
                const email = document.querySelector('input[name="sf-email"]').value;
                const token = 'OCq1FDkkyZYJuM8jhOHEA0jxQ8r5vQ48kE2TF1eg';
                const messageDiv = document.getElementById('sf-message');
        
                fetch('https://uncoveredshorts.com/subscribe', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                    body: JSON.stringify({ email: email })
                })
                .then(response => response.json())
                .then(data => {
                  messageDiv.style.display = 'block';
                  if (data.status === 'success') {
                      messageDiv.style.color = '#78ad7a';
                      messageDiv.textContent = data.message;
                  } else {
                      messageDiv.style.color = '#d55353';
                      messageDiv.textContent = data.message;
                  }
                })
                .catch(error => {
                  messageDiv.style.display = 'block';
                  messageDiv.style.color = '#d55353';
                  messageDiv.textContent = 'An unexpected error occurred. Please try again.';
                  console.error('Error:', error);
                });
            });
        });
        </script>

      <!-- Answers list modal -->
      <div class="modal" id="searchModal">
        <button class="close-modal" onclick=closeModalById('searchModal')>×</button>
        <div class="search-bar">
          <span id='current-search-question' class="search-question">Choose an answer.</span>
          <input id="us-search" type="text" class='search' oninput="filterSuggestions(this.value)" placeholder="Type here...">
        </div>
        <div id="suggestions" class="suggestions">
          <span class="single-suggestion">
            <p>-</p>
            <button>Select</button>
          </span>
        </div>
      </div>

      <script>
        
        /* Initialiser le text dans share quand l'use n'a pas encore joué */
        var currentGameId = 87
        var currentGameName = "Uncovered Shorts #54";

        /* new statistics */
        var trackedGameCount = 64

        /* Leaderboard feature */
        var personalInitial = localStorage.getItem('personalInitial') ?? "???"
        var personalUID = localStorage.getItem('personalUID') ?? "???"
        
        /* Top score */
        var leaderboard1 = [{"id":2440,"initial":"CDS","unique_identifier":"CDS20240730162700174","game_id":87,"total_score":"373","created_at":"2024-08-12T12:37:48.000000Z","updated_at":"2024-08-12T12:41:39.000000Z","id_category":null,"category_name":"Group Leaderboard"},{"id":2405,"initial":"Cjm","unique_identifier":"Cjm20240727115451126","game_id":87,"total_score":"367","created_at":"2024-08-12T10:27:03.000000Z","updated_at":"2024-08-13T00:22:15.000000Z","id_category":null,"category_name":"Group Leaderboard"},{"id":2491,"initial":"Jmt","unique_identifier":"Jmt20240811032742435","game_id":87,"total_score":"356","created_at":"2024-08-12T15:06:03.000000Z","updated_at":"2024-08-12T19:57:47.000000Z","id_category":null,"category_name":"Group Leaderboard"},{"id":2476,"initial":"Rgb","unique_identifier":"Rgb20240722122132864","game_id":87,"total_score":"341","created_at":"2024-08-12T14:31:11.000000Z","updated_at":"2024-08-12T20:50:12.000000Z","id_category":null,"category_name":"Group Leaderboard"},{"id":2426,"initial":"PRB","unique_identifier":"PRB20240716123834067","game_id":87,"total_score":"326","created_at":"2024-08-12T11:56:45.000000Z","updated_at":"2024-08-12T11:57:54.000000Z","id_category":null,"category_name":"UM Ross Alums"},{"id":2452,"initial":"Meg","unique_identifier":"Meg20240719122107916","game_id":87,"total_score":"318","created_at":"2024-08-12T13:21:52.000000Z","updated_at":"2024-08-12T13:21:52.000000Z","id_category":null,"category_name":"Group Leaderboard"},{"id":2468,"initial":"VFP","unique_identifier":"VFP20240801125751492","game_id":87,"total_score":"317","created_at":"2024-08-12T13:54:18.000000Z","updated_at":"2024-08-12T20:52:18.000000Z","id_category":null,"category_name":"JPM Credit Portfolio"},{"id":2484,"initial":"CCS","unique_identifier":"CCS20240731174736853","game_id":87,"total_score":"313","created_at":"2024-08-12T14:43:20.000000Z","updated_at":"2024-08-12T14:43:20.000000Z","id_category":null,"category_name":"Davilla"},{"id":2448,"initial":"SPR","unique_identifier":"SPR20240721154318925","game_id":87,"total_score":"299","created_at":"2024-08-12T13:01:41.000000Z","updated_at":"2024-08-12T13:01:41.000000Z","id_category":null,"category_name":"Group Leaderboard"},{"id":2411,"initial":"ANT","unique_identifier":"ANT20240730113746671","game_id":87,"total_score":"293","created_at":"2024-08-12T11:06:16.000000Z","updated_at":"2024-08-12T23:05:04.000000Z","id_category":null,"category_name":"The Rosen Report"}];
        var leaderboard1LastPlace = leaderboard1.length > 9 ? leaderboard1[9].total_score : 0;
        
        /* Top score */
        var leaderboard2streak = [{"id":42,"initial":"Djs","unique_identifier":"Djs20240718102954694","last_game_id":87,"streak":64,"created_at":"2024-07-22T13:44:26.000000Z","updated_at":"2024-08-12T12:29:23.000000Z"},{"id":36,"initial":"PRB","unique_identifier":"PRB20240716123834067","last_game_id":87,"streak":64,"created_at":"2024-07-22T13:01:02.000000Z","updated_at":"2024-08-12T11:56:45.000000Z"},{"id":12,"initial":"Jch","unique_identifier":"Jch20240717073835336","last_game_id":87,"streak":64,"created_at":"2024-07-22T07:00:26.000000Z","updated_at":"2024-08-12T08:28:07.000000Z"},{"id":17,"initial":"MRF","unique_identifier":"MRF20240716091902923","last_game_id":87,"streak":52,"created_at":"2024-07-22T09:16:25.000000Z","updated_at":"2024-08-12T11:01:53.000000Z"},{"id":20,"initial":"Iss","unique_identifier":"Iss20240717150543252","last_game_id":74,"streak":51,"created_at":"2024-07-22T10:17:09.000000Z","updated_at":"2024-07-30T09:04:02.000000Z"},{"id":19,"initial":"MFF","unique_identifier":"MFF20240718125015879","last_game_id":87,"streak":31,"created_at":"2024-07-22T09:54:40.000000Z","updated_at":"2024-08-12T11:46:43.000000Z"},{"id":56,"initial":"NIK","unique_identifier":"NIK20240717115036525","last_game_id":87,"streak":29,"created_at":"2024-07-22T17:21:13.000000Z","updated_at":"2024-08-12T11:45:24.000000Z"},{"id":27,"initial":"JLV","unique_identifier":"JLV20240716120739110","last_game_id":87,"streak":29,"created_at":"2024-07-22T11:48:50.000000Z","updated_at":"2024-08-12T11:15:52.000000Z"},{"id":16,"initial":"TCS","unique_identifier":"TCS20240719041635677","last_game_id":87,"streak":26,"created_at":"2024-07-22T08:54:30.000000Z","updated_at":"2024-08-12T08:51:02.000000Z"},{"id":13,"initial":"HDL","unique_identifier":"HDL20240716113430130","last_game_id":87,"streak":26,"created_at":"2024-07-22T07:07:57.000000Z","updated_at":"2024-08-12T13:28:44.000000Z"}];
        var leaderboard2LastPlace = leaderboard2streak.length > 9 ? leaderboard2streak[9].total_score : 0;

        var personalGameCount = parseInt(localStorage.getItem('personalGameCount') ?? 0);
        var personalAverage = parseInt(localStorage.getItem('personalAverage') ?? 0);
        var personalStreak = parseInt(localStorage.getItem('personalStreak') ?? 0);

        localStorage.setItem('personalLeaderboardGroup', localStorage.getItem('personalLeaderboardGroup') || 'Group Leaderboard');

        /* Mettre le select par defaut, sa derniere selection */
        const playerGroupSelect = document.getElementById('playerGroup');
        // Définit la valeur sélectionnée de l'élément <select>
        //alert(localStorage.getItem('personalLeaderboardGroup'));
        playerGroupSelect.value = localStorage.getItem('personalLeaderboardGroup');

        /* Cacher le classement par defaut */
        var rbGroupLeaderboard = document.getElementById('rb-groupleaderboard');
        if (playerGroupSelect.value === "Group Leaderboard" || this.value === "No Group") 
        {
          rbGroupLeaderboard.style.display = 'none';
        }
        else rbGroupLeaderboard.style.display = 'flex';

        var personalGameCountHtml = document.getElementById('personalGameCount');
        var personalAverageHtml = document.getElementById('personalAverage');
        var lastPlayedGameID = localStorage.getItem('lastPlayedGameID') ?? 0;
        var personalStreakHtml = document.getElementById('personalStreak');
        var previousGameID = 86

        verifyStreak();
        refreshHtmlInLocalStorage();
        /* --------------- */

        var suggestions1 = ["Aba","Abeokuta","Abidjan","Abomey-Calavi","Abu Dhabi","Abuja","Acapulco de Juarez","Accra","Ad Dammam","Adachi","Adana","Addis Ababa","Adelaide","Agege","Agra","Aguascalientes","Ahmedabad","Ahvaz","Akure","Al `Ayn","Al Basrah","Al Hufuf","Al Mijlad","Albuquerque","Aleppo","Alexandria","Algiers","Aligarh","Almaty","Amman","Amritsar","Amsterdam","An Najaf","Andorra la Vella","Androtsy","Ankang","Ankara","Anlu","Anqing","Anqiu","Ansan","Anshan","Anshun","Antananarivo","Antipolo","Ar Ramadi","Aracaju","Arequipa","As Sulaymaniyah","Ashgabat","Ashmun","Asmara","Astana","Athens","Atlanta","Auckland","Aurangabad","Austin","Awka","Baardheere","Bacoor","Bagam","Bagcilar","Baghdad","Bahar","Bahawalpur","Baicheng","Baidoa","Baishan","Baiyin","Baku","Balandougou","Balikesir","Baltimore","Bamako","Bamenda","Bandar Lampung","Bangalore","Bangkok","Bangui","Banjarmasin","Baoding","Baojishi","Baoshan","Baotou","Barcelona","Bareilly","Barinas","Barquisimeto","Barranquilla","Batam Centre","Bauchi","Bazhou","Beidao","Beihai","Beijing","Beirut","Bekasi","Bekasi Kota","Belem","Belgrade","Belo Horizonte","Bengbu","Benin City","Benxi","Berlin","Bern","Bhangar","Bhayandar","Bhiwandi","Bhopal","Bhubaneshwar","Bien Hoa","Bijie","Bilaspur","Bilbao","Binzhou","Birmingham","Bishkek","Blantyre","Boankra","Bobo-Dioulasso","Bogor","Bogota","Boosaaso","Bordeaux","Borvayeh-ye Al Bu `Aziz","Boston","Bouake","Bozhou","Brampton","Brasilia","Bratislava","Brazzaville","Bridgeport","Brisbane","Bristol","Bronx","Brooklyn","Brussels","Bucaramanga","Bucharest","Bucheon","Budapest","Buenos Aires","Buffalo","Bujumbura","Bukavu","Bulawayo","Bunia","Bursa","Busan","Cabinda","Cacuaco","Cagayan de Oro","Cairo","Calgary","Cali","Caloocan City","Campinas","Campo Grande","Can Tho","Canagatan","Cancun","Cangzhou","Cankaya","Cape Coral","Cape Town","Caracas","Cartagena","Casablanca","Catia La Mar","Cazenga","Cebu City","Cencheng","Ch'onan","Ch'ongjin","Chandigarh","Changchun","Changde","Changsha","Changshu","Changwon","Changzhi","Changzhou","Chaohucun","Chaoyang","Chaozhou","Charleston","Charlotte","Chattogram","Chelyabinsk","Chengdu","Chengguan","Chengtangcun","Chengxiang","Chennai","Chenzhou","Cheongju","Chiang Mai","Chiba","Chicago","Chifeng","Chihuahua","Chisinau","Chizhou","Chongqing","Chongzuo","Chuzhou","Cilacap","Cincinnati","City of Paranaque","Ciudad Guayana","Ciudad Nezahualcoyotl","Cleveland","Cochabamba","Cocody","Coimbatore","Cologne","Colombo","Columbus","Comayaguela","Comodoro Rivadavia","Conakry","Concepcion","Copenhagen","Cordoba","Cotonou","Cucuta","Cuiaba","Culiacan","Curitiba","Dadukou","Daegu","Daejeon","Dakar","Dali","Dalian","Dallas","Damascus","Dandong","Danyang","Daqing","Dar es Salaam","Dashiqiao","Dasmarinas","Davao","Dayan","Daye","Dayrut","Dayton","Dazhou","Dehui","Delhi","Dengtalu","Denizli","Denpasar","Denver","Depok","Detroit","Deyang","Dezhou","Dhaka","Dhanbad","Dhulia","Dingxi","Dingzhou","Diyarbakir","Dnipro","Doha","Domaa-Ahenkro","Donetsk","Dongguan","Dongtai","Dongyang","Douala","Dubai","Dublin","Durango","Durban","Dushanbe","Ecatepec","Edinburgh","Edmonton","Edogawa","El Alto","El Dorado","El Paso","Enugu","Erbil","Erer Sata","Erzurum","Esenyurt","Esfahan","Eskisehir","Ezhou","Faisalabad","Fangchenggang","Faridabad","Feicheng","Fes","Fort Worth","Fortaleza","Foshan","Frankfurt","Freetown","Fresno","Fukuoka","Fuqing","Fushun","Fuxin","Fuyang","Fuzhou","Gaalkacyo","Gaizhou","Ganzhou","Gaomi","Gaoping","Gaoyou","Gaozhou","Gazipura","General Santos","George Town","Ghaziabad","Giza","Glasgow","Goiania","Gongzhuling","Gorakhpur","Goyang","Gqeberha","Guadalajara","Guadalupe","Guang'an","Guangshui","Guangyuan","Guangzhou","Guankou","Guarulhos","Guatemala City","Guayaquil","Guigang","Guilin","Guiping","Guiyang","Gujranwala","Guli","Gulou","Guntur","Gurgaon","Guwahati","Guyuan","Gwalior","Gwangju","Hai'an","Haicheng","Haikou","Hailun","Haiphong","Haldwani","Hamah","Hamamatsu","Hamburg","Hamhung","Hamilton","Hanchuan","Handan","Hangzhou","Hanoi","Hanzhong","Haora","Harare","Harbin","Hargeysa","Hartford","Havana","Hebi","Hechi","Hefei","Hegang","Heihe","Hejian","Helsinki","Hempstead","Hengshui","Hengyang","Hengzhou","Hermosillo","Heyuan","Heze","Hezhou","Hiroshima","Ho Chi Minh City","Hohhot","Homs","Hong Kong","Houston","Huai'an","Huaibei","Huaihua","Huainan","Huaiyin","Huambo","Huanggang","Huanglongsi","Huangshan","Huangshi","Huazhou","Hubli","Hue","Huilong","Huizhou","Huludao","Huzhou","Hwasu-dong","Hyderabad","Hyderabad City","Ibadan","Iguacu","Ikare","Ikeja","Ilorin","Incheon","Indianapolis","Jersey City","Lenexa","Indore","Ipoh","Islamabad","Istanbul","Izmir","Jabalpur","Jaboatao","Jacksonville","Jaipur","Jakarta","Jalandhar","Jalingo","Jamshedpur","Jeddah","Jerusalem","Ji'an","Jiamusi","Jiancheng","Jiangguanchi","Jiangmen","Jianguang","Jiangyin","Jianshe","Jiaozhou","Jiaozuo","Jiaxing","Jieshou","Jieyang","Jilin","Jinan","Jincheng","Jingcheng","Jingdezhen","Jingling","Jinhua","Jining","Jinzhou","Jiujiang","Jixi","Joao Pessoa","Jodhpur","Johannesburg","Juarez","Kabul","Kaduna","Kaifeng Chengguanzhen","Kaiyuan","Kalyan","Kampala","Kananga","Kano","Kanpur","Kansas City","Kaohsiung","Karachi","Karaikandi","Karaj","Karbala'","Kashgar","Katako-Kombe","Kathmandu","Kawasaki","Kayseri","Kazan","Kecioren","Kerman","Kermanshah","Kharkiv","Khartoum","Khartoum North","Khowrhesht","Khujand","Khulna","Kibanseke Premiere","Kigali","Kinshasa","Kirkuk","Kisangani","Kismaayo","Kitakyushu","Klang","Kobe","Kochi","Kolkata","Konya","Korla","Kota","Kotla Qasim Khan","Kowloon","Krakow","Krasnodar","Krasnoyarsk","Kuaidamao","Kuala Lumpur","Kumamoto","Kumasi","Kumul","Kunming","Kuwait City","Kyaukse","Kyiv","Kyoto","La Paz","Lagos","Lahore","Laibin","Laiwu","Laixi","Laiyang","Langfang","Langzhong","Lanzhou","Las Vegas","Latakia","Leeds","Leiyang","Leizhou","Leling","Leon de los Aldama","Leping","Leshan","Lhasa","Liangshi","Lianjiang","Lianshan","Lianyuan","Liaocheng","Liaoyang","Liaoyuan","Libreville","Licheng","Lichuan","Lilongwe","Lima","Lincang","Linfen","Lingbao Chengguanzhen","Lingcheng","Linhai","Linyi","Lisbon","Lishui","Liuzhou","Liverpool","Ljubljana","Lodz","Lokoja","London","Longba","Longyan","Los Angeles","Loudi","Louisville","Lu'an","Luanda","Lubango","Lubumbashi","Lucknow","Ludhiana","Luocheng","Luohe","Luoyang","Lusaka","Luxembourg","Luzhou","Lviv","Ma'anshan","Maceio","Macheng","Madrid","Madurai","Maiduguri","Makassar","Makhachkala","Malaga","Malang","Mamak","Managua","Manaus","Manchester","Mandalay","Manhattan","Manila","Maoming","Maputo","Mar del Plata","Maracaibo","Marka","Marrakech","Marseille","Mashhad","Masqat","Masvingo","Matola","Mbandaka","Mbuji-Mayi","McAllen","Mecca","Medan","Medellin","Medina","Meerut","Meishan","Meizhou","Melbourne","Memphis","Merida","Mersin","Mexicali","Mexico City","Miami","Mianyang","Milan","Miluo Chengguanzhen","Milwaukee","Minneapolis","Minsk","Mirzapur","Mississauga","Mizhou","Mogadishu","Mombasa","Monaco","Monrovia","Monterrey","Montevideo","Montreal","Moradabad","Morelia","Moscow","Mosul","Mudanjiang","Multan","Mumbai","Munich","Murcia","Muscat","Mushin","Mwanza","N'Djamena","Nada","Nagoya","Nagpur","Nairobi","Najafgarh","Nampo","Nampula","Nanchang","Nanchong","Nangandao","Nanjing","Nanning","Nanping","Nantong","Nanyang","Naples","Narayanganj","Narela","Nashville","Nasik","Natal","Naucalpan de Juarez","Nay Pyi Taw","Nehe","Neijiang","Nerima","New Orleans","New York","Nezahualcoyotl","Niamey","Nicosia","Niigata","Ningbo","Ningde","Nizhniy Novgorod","Nneyi-Umuleri","Nottingham","Nouakchott","Novosibirsk","Odesa","Ogbomoso","Okayama","Oklahoma City","Omaha","Omdurman","Omsk","Onitsha","Orlando","Orumiyeh","Osaka","Osasco","Oslo","Osmangazi","Osogbo","Ota-ku","Ottawa","Ouagadougou","Owerri","Padang","Palembang","Palermo","Panama City","Paris","Pasig City","Patiala","Patna","Pekanbaru","Pendik","Perm","Perth","Peshawar","Philadelphia","Phnom Penh","Phoenix","Pietermaritzburg","Pikine","Pimpri-Chinchwad","Pingdingshan","Pingdu","Pinghu","Pingliang","Pingxiang","Pishbar","Pittsburgh","Pizhou","Podgorica","Pointe-Noire","Port Harcourt","Port Moresby","Port-au-Prince","Portland","Porto","Porto Alegre","Portsmouth","Prague","Prayagraj","Pretoria","Pristina","Providence","Pudong","Puebla","Pune","Puning","Putian","Puxi","Puyang","Puyang Chengguanzhen","Pyongyang","Qamdo","Qom","Quang Ha","Quanzhou","Quebec City","Queens","Queretaro","Quetta","Quezon City","Quito","Qujing","Quzhou","Raipur","Rajkot","Rajshahi","Raleigh","Ranchi","Rangapukur","Rangoon","Rasht","Rawalpindi","Recife","Renqiu","Reykjavik","Ribeirao Preto","Richmond","Riga","Rio de Janeiro","Riverside","Riyadh","Rizhao","Rochester","Rome","Rongcheng","Rongjiawan","Rosario","Rostov","Rotterdam","Rucheng","Rui'an","Sacramento","Sagamihara","Saharanpur","Saint Petersburg","Saitama","Sakai","Sale","Salem","Salt Lake City","Saltillo","Salvador","Samara","Samarinda","Samsun","San Antonio","San Cristobal","San Diego","San Francisco","San Jose","San Jose del Monte","San Juan","San Luis Potosi","San Pedro Sula","Sanaa","Sangereng","Sanhe","Sanmenxia","Sanming","Santa Clara","Santa Cruz","Santa Cruz de la Sierra","Santiago","Santiago del Estero","Santo Andre","Santo Domingo","Santo Domingo Este","Santos","Sanya","Sanzhou","Sao Bernardo do Campo","Sao Goncalo","Sao Jose dos Campos","Sao Luis","Sao Paulo","Sapporo","Sarajevo","Saratov","Sargodha","Seattle","Seberang Jaya","Selcuklu","Semarang","Sendai","Seoul","Setagaya","Sevilla","Seyhan","Shache","Shagamu","Shanghai","Shangqiu","Shangrao","Shangzhou","Shanhu","Shantou","Shanwei","Shaoguan","Shaoxing","Shaoyang","Sharjah","Sheffield","Shengli","Shenyang","Shenzhen","Shihezi","Shijiazhuang","Shiliguri","Shiraz","Shishgarh","Shishi","Shiyan","Shizuoka","Shouguang","Shuangqiao","Shuangyashan","Shubra al Khaymah","Shuizhai","Shulan","Shuozhou","Shuyangzha","Shymkent","Singapore","Sinnuris","Siping","Sizhan","Skopje","Sofia","Solapur","Soledad","Songnam","Songyang","Songzi","Sorocaba","Southampton","Soweto","Srinagar","St. Louis","Stockholm","Stuttgart","Suihua","Suining","Sumedang","Suohe","Supaul","Suqian","Surabaya","Surat","Suwon","Suzhou","Sydney","Tabriz","Tabuk","Taguig City","Tai'an","Taichung","Taihe","Taihecun","Tainan","Taipei","Taishan","Taixing","Taiyuan","Taizhou","Tallinn","Tamale","Tampa","Tangerang","Tangier","Tangshan","Tashkent","Tasikmalaya","Tbilisi","Tegucigalpa","Tehran","Tel Aviv-Yafo","Teresina","Thane","Thessaloniki","Thiruvananthapuram","Thu Duc","Tianjin","Tieling","Tijuana","Tilburg","Tirana","Tiruppur","Tlalnepantla","Tlaquepaque","Tokyo","Tolyatti","Tondo","Tongchuan","Tongjin","Tongliao","Tongren","Tongshan","Toronto","Trabzon","Trichinopoly","Tripoli","Trujillo","Tshikapa","Tucson","Tulsa","Turin","Tyumen","Uberlandia","Ubungo","Ufa","Ulaanbaatar","Ulsan","Umraniye","Urumqi","Vadodara","Vaduz","Valencia","Valenzuela","Valletta","Vancouver","Varanasi","Vasai-Virar","Vatican City","Vienna","Vientiane","Vijayawada","Villavicencio","Vilnius","Virginia Beach","Vishakhapatnam","Volgograd","Voronezh","Wafangdian","Warangal","Warsaw","Washington","Weichanglu","Weifang","Weihai","Weinan","Wenchang","Wenling","Wenzhou","Winnipeg","Wroclaw","Wu'an","Wuchang","Wuchuan","Wugang","Wuhan","Wuhu","Wusong","Wutong","Wuwei","Wuxi","Wuzhong","Wuzhou","Xi'an","Xiamen","Xiangshui","Xiangtan","Xiangxiang","Xiangyang","Xiantao","Xianyang","Xiaoganzhan","Xiaoxita","Xiashi","Xibeijie","Xichang","Xigaze","Ximeicun","Xin'an","Xindi","Xingcheng","Xingtai","Xingyi","Xinhualu","Xining","Xinmin","Xinpu","Xintai","Xinyang","Xinyi","Xinyu","Xinzhou","Xiping","Xishan","Xuanzhou","Xushan","Yan'an","Yancheng","Yangchun","Yanggok","Yangjiang","Yangquan","Yangshe","Yangzhou","Yanjiang","Yantai","Yaounde","Yatou","Yekaterinburg","Yenimahalle","Yerevan","Yibin","Yicheng","Yichun","Yinchuan","Yingcheng","Yingchuan","Yingkou","Yingtan","Yiwu","Yiyang","Yokohama","Yongcheng","Yongzhou","Yopougon","Yucheng","Yuci","Yulin","Yulinshi","Yuncheng","Yunfu","Yushan","Yushu","Yutan","Yuxi","Yuyao","Zagreb","Zamboanga City","Zaoyang","Zaozhuang","Zapopan","Zaporizhzhia","Zaragoza","Zhangjiajie","Zhangjiakou","Zhangye","Zhangzhou","Zhanjiang","Zhaodong","Zhaoqing","Zhaotong","Zhengzhou","Zhenjiang","Zhongba","Zhongli","Zhongshan","Zhongshu","Zhongwei","Zhongxiang","Zhoukou","Zhoushan","Zhuanghe","Zhufeng","Zhuhai","Zhuji","Zhumadian","Zhuzhou","Zibo","Zigong","Zijinglu","Zouping","Zunhua","Zunyi","Zurich"];
        var suggestions2 = ["Aaron Jayson Adair","Adam Schechter","Adena T. Friedman","Ajei S. Gopal","Alan D. Schnitzer","Alan H. Shaw","Alan S. Armstrong","Albert Bourla","Albert H. Nahmad","Alex Gorsky","Alfred F. Kelly Jr.","Anant Bhalla","Andr\u00e9s Ricardo Gluski Weilert","Andrew Anagnost","Andrew C. Florance","Andrew J. Cecere","Andrew P. Power","Andrew Wilson","Andrew Witty","Andy Jassy","Aneel Bhuri","Anirudh Devgan","Anna Manning","Anthony Capuano","Antonio Neri","Ari Bousbib","Arnold W. Donald","Arvind Krishna","Badrinarayanan Kothandaraman","Barbara R. Smith","Barbara Rentler","Barry Stuart Sternlicht","Barton R. Brookman Jr,","Benno Dorer","Bill McDermott","Bill Nash","Blake Moret","Bob Chapek","Bob Sulentic","Bobby Martin","Brendan M. McCracken","Brian Armstrong","Brian Chesky","Brian Cornell","Brian D. Chambers","Brian Doubles","Brian Humphries","Brian L. Roberts","Brian Moynihan","Brian R. Niccol","Brian S. Tyler","Bruce D. Broussard?","Bruce Winfield van","Bryan B. DeBoer","Bryan C. Hanson","Bryan Jordan","C. Howard Nye","Carl Henry Lindner, III, S. Craig Lindner, Jr.","Carlos A. Rodriguez","Carol Tom\u00e9","Charles Andrew Eidson","Charles Frederick Lowrey Jr.","Charles J. Meyers","Charles Prince","Charles William Scharf","Chris M. Crane","Chris Nassetta","Christian Ulbrich","Christine A. Leahy","Christophe Beck","Christopher D. Kastner","Christopher E. Kubasik","Christopher J. Kempczinski","Christopher J. Swift","Christopher L. Winfrey","Christopher M. Doyle","Christopher M. Gorman","Chuck Magro","Chuck Robbins","Clint Stein","Connor David Teskey","Corie Barry","Craig Menear","Craig R. Smiddy","Cristiano R. Amon","Curtis C. Farmer","Cyrus Madon","D. James Bidzos","Dallas B. Tanner","Dan Amos","Dan Hogan Arnold Jr.","Dan Schulman","Daniel E. Brown","Daniel J. Houston","Daniel L. Florness","Daniel O'Day","Daniel S. Glaser","Daniel W. Fisher","Dara Khosrowshahi","Darius Adamczyk","Darren M. Rebelez","Darren W. Woods","Daryl A. Kenningham","Dave Calhoun","Dave Kimbell","David A. Campbell","David A. Jackson","David A. Ricks","David A. Zapico","David B. Baszucki","David B. Burritt","David C. Jukes","David Christian Koch","David Cordani","David E. Rush","David J. Lesar","David L. Finkelstein","David L. Gitlin","David L. Lamp","David Michael Solomon","David Nord","David R. Epstein","David Simon","David V. Auld","David V. Goeckeler","David W. Gibbs","David W. Hult","David Zalman","David Zaslav","Debra A. Cafaro","Dennis L. Degner","Dennis Polk","Devin W. Stockfish","Dexter G. Goei","Dirk van de Put","Dominic Ng","Dominick Paul Zarcone","Donald G. Macpherson","Donnie King","Doug McMillon","Douglas C. Yearley, Jr.","Douglas H. Shulman","Douglas L. Peterson","Dr. Aart de Geus","Dr. Lisa Su","Drew Marsh","E.Scott Santi","Earl C. Austin Jr.","Ed Bastian","Edward Baltazar Pitoniak","Edward Breen","Edward J. Shoen","Edward Joseph Wehmer","Ellen Gail Cooper","Elon Musk","Enrique Lores","Eric D. Ashleman","Eric Mark Green","Eric P. Hansotia","Eric Thomas Steigerwalt","Ernie L. Herrman","Eugene A. Hall","Eugene James Bredow","Ezra Y. Yacob","Fabrizio Freda","Francis A. deSouza","Frank B. Holding, Jr.","Frank C. Sullivan","Frank J. Bisignano","Frank Slootman","Franklin K. Clyburn","Fr\u00e9d\u00e9ric B. Lissdale","Gail K. Boudreaux","Ganesh Moorthy","Garrick J. Rochow","Gary A. Shiffman","Gary E. Dickerson","Gary L. Coleman Larry M. Hutchison","Gary S. Guthart","Gavin D. K. Hattersley","George Gleason","George Kurian","George L. Holm","George P. Kurtz Jr.","Gina Boswell","Giovanni Caforio","Glenn D. Fogel","Greg C. Gantt","Greg D. Carmichael","Greg Peters Ted Sarandos","Gregory A. Heckman","Gregory Ben Maffei","Gregory D. Johnson","Gregory J. Hayes","Gregory Q. Brown","Gregory Stephen Smith","H. Eric Bolton Jr.","H. Lawrence Culp, Jr.","Hal Lawton","Hamid R. Moghadam","Hans Vestberg","Harris H. Simmons","Harvey Mitchell Schwartz","Hassane El-Khoury","Henry A. Fernandez","Herbert S. Vogel","Heyward R. Donigan","Hock E. Tan","Horacio D. Rozanski","Howard Schultz","Ignacio Alvarez","Ira D. Robbins","J. Alexander M. Douglas Jr.","J. Patrick Gallagher Jr.","J. Powell Brown","J. Scott Kirby","J. Thomas Hill","Jacek Olczak","Jack A. Fusco","Jack Patrick Dorsey","Jack Remondi","James A. Burke","James A. Lico","James C. Grech","James Calvin O'Rourke","James D. Farley Jr.","James D. Rollins","James D. Taiclet","James F. Risoleo","James J. Judge","James M. Cracchiolo","James M. Loree","James Quincey","James R. Hollingshead","James Ryan","James S. Tisch","James Umpleby","Jamie Dimon","Jamie Iannone","Jane Fraser","Jason E. Fox","Jason Liberty","Javier J. Rodriguez","Jay A. Brown","Jay Mazelsky","Jay Snowden","Jayshree V. Ullal","Jeff Genette","Jeff Green","Jeff Miller","Jeff Storey","Jeffrey A. Stoops","Jeffrey Craig Sprecher","Jeffrey J. Brown","Jeffrey L. Harmening","Jeffrey S. Musser","Jeffrey Steven Sloan","Jeffrey W. Martin","Jennifer Ramsey","Jenny Johnson","Jensen Huang","Jerry E. Gahlhoff Jr.","Jerry Norcia","Jim Fish","Jim Fitterling","Jim Snee","Joanne Crevoiserat","Joe Ferraro","John B. Hess","John C. May","John C. Plant","John Donahoe II","John G. Morikis","John J. Engel","John J. Zillmer","John K. Reinhart","John M. Hairston","John M. Turner, Jr.","John N. Roberts","John O. Larsen","John R. Ciulla","John Stankey","John W. Eaves","John W. Ketchum","John W. Somerhalder","John Wren","Jon R. Moeller","Jon Vander Ark","Jonas Prising","Jose E. Almeida","Joseph C. Gatto Jr.","Joseph D. Margolis","Joseph D. Russell","Joseph Dominguez","Joseph Hinrichs","Joseph M. Hogan","Joseph W. Gorder","Joseph Zubretsky","Juan Ricardo Luciano","Judith F. Marks","Julia A. Sloat","Karen S. Lynch","Karla Renee Lewis","Kathy Warden","Keith J. Allman","Keith W. Demmings","Ken Xie","Kenneth A. Vecchione","Kenneth S. Wilson","Kent Masters","Kevin A. Lobo","Kevin Akers","Kevin M. Stein","Kevin P. Hourican","Kevin S. Blair","Kevin Sayer","Kevin T. Hogan","Kristin C. Peck","Lachlan Keith Murdoch","Lal Karsanbhai","Lance M. Fritz","Larry Fink","Laura Alber","Laura L. Prieskorn","Laurans A. Mendelson","Lauren R. Hobart","Laurence Neil Hunn","Lawrence Erik Kurzius","Lawson Whiting","Lee M. Shavel","Lee Tillman","Leon J. Topalian","Leonard S. Schleifer","Liam K. Griffin","Linda Rendle","Lloyd Yates","Lorenzo Simonelli","Lori J. Ryerkerk","Lourenco Goncalves","Lynn J. Good","M. Jay Allison","M. Susan Hardwick","M.Terry Turner","Marc Benioff","Marc D. Miller","Marc Jeffrey Rowan","Marc N. Casper?","Marc R. Bitzer","Mark A. Clouse","Mark A. Douglas","Mark Begor","Mark E. Lashier","Mark J. Costa","Mark J. Parrell","Mark Millet","Mark Pearson","Mark S. Hoplamazian","Mark S. Sutton","Mark Smucker","Mark W. Kowlzan","Mark Zuckerberg","Martin Flanagan","Martin J. Lyons JR.","Martin J. Schroeter","Martin Mucci","Martine A. Rothblatt","Marvin Ellison","Mary T. Barra","Matthew J. Meloy","Matthew J. Murphy","Matthew P. Wagner","Matthew T. Farrell","Mauricio Gutierrez","Max Kolysh","Michael A. Mussallem","Michael B. O'Sullivan","Michael Cannon, Scott Farquhar","Michael Corbat","Michael D. Hsu","Michael Dell","Michael DeVito","Michael F. Mahoney","Michael G. O'Grady","Michael H. McGarry","Michael J. Arougheti","Michael J. Hennigan","Michael J. Kasbar","Michael J. Kneeland","Michael K. Wirth","Michael Mark Manley","Michael Miebach","Michael P. Doss","Michael R. Hsing","Michael R. McMullen","Michael Rapino","Michael Stubblefield","Michael T. Speetzen","Michael Witynski","Michel A. Khalaf","Michel Vounatsos","Michele Buck","Mick Farrell","Miguel Patricio","Mike Kaufmann","Mike Nolan","Mike Roman","Mike Salvino","Milan Galik","Mitch Butier","NA","Nicholas J. DeIuliis","Nicholas O'Grady","Nicholas T. Pinchuck","Nick Dell\u2019Osso Jrl","Nikesh Arora MBA","Olivier Le Peuch","Olivier Pomel","Owen D. Thomas","Pablo Gerardo Legorreta","Patricia K. Poppe","Patrick E. Bowe","Patrick Gelsinger","Patrick K. Decker","Patrick K. Kaltenbach","Paul C. Reilly","Paul D. Donahue","Paul M. Rady","Pedro J. Pizarro","Peter D. Arvan","Peter J. Arduini","Peter J. Federico","Peter M. Carlino","Peter M. Kern","Peter M. Moglia","Peter P. Gassner","Peter S. Zaffino","Phebe N. Novakovic","Philip R. Gallagher","Philippe Krakowsky","Phillip D. Green","Pierce H. Norton II","Pietro Satriano","Prahlad Ramadhar Singh","Preston Feight","Priscilla Almodovar","R. Andrew Clyde","Rafael O. Santana","Raffaele Annecchino","Raghu Raghuram","Rainer M. Blair","Raj Subramaniam","Ralph A. LaRossa","Ramon L. Laguarta","Randall C. Stuewe","Ray Scott","Ren\u00e9 F. Jones","Reshma Kewalramani","Revathi Advaithi","Ric Campo","Rich Handler MBA","Richard (Rich) K. Templeton","Richard A. Gonzalez","Richard Adam Norwitt","Richard Adkerson","Richard Fairbank","Richard J. Kramer","Richard P. McKenney","Rick Beckwitt Jon Jaffe","Rick Cardenas","Rick Muncrief","Rick Wallace","Robert A. Bradway","Robert A. Kotick","Robert B. Ford","Robert Biesterfeld","Robert E. Jordan","Robert E. Sanchez","Robert Frenzel","Robert Gamgort","Robert Glen Goldstein","Robert Isom","Robert James Thomson","Robert M. Blue","Robert M. Davis","Robert Mehrabian","Robert R. Hill, Jr.","Robert Scott Fauber","Robert W. Eddy","Robert W. Martin","Robert W. Sharps","Robin Vince","Rodney Cyril Sacks","Rodney O. Martin, Jr.","Roger C. Hochschild","Roger Krone","Roger S. Penske","Roger W. Jenkins","Ronald F. Clarke","Ronald James Kruszewski","Ronald Philip O'Hanley III","Ryan Lance","Ryan Marshall","Safra A. Catz","Samuel N. Hazen","Sandy Weill","Sanjay Mehrotra","Sarah London","Sasan Goodarzi","Satish Dhanasekaran","Satya Nadella","Saumya Sutaria","Scott Andrew Smith","Scott C. Donnelly","Scott Douglas Sheffield","Scott Lauber","Scott M. Brinker","Scott McDougald Sutton","Scott Nuttall Joseph Bae","Sean Connolly","Sean J. Kerins","Sean Michael O'Connor","Seifi Ghasemi","Shankh Mitra","Shantanu Narayen","Sheryl D. Palmer","Stacy C. Kymes","Stanley M. Bergman","Stefano Pessina","St\u00e9phane Bancel","Stephanie Ferris","Stephen Allen Schwarzman","Stephen D. Steinour","Stephen H. Rusckowski","Stephen J. Squeri","Stephen M. Scherr","Stephen P. MacMillan","Steve Demetriou","Steven Cahillane","Steven H. Collis","Steven J. Johnston","Steven J. Kean","Strauss Zelnick","Sumit Roy","Sumit Singh","Sundar Pichai","Susan Patricia Griffith","Ted Pick","Terrence A. Duffy","Thibaut Mongon","Thomas Caulfield","Thomas E. Jorden","Thomas E. Salmon","Thomas J. McInerney","Thomas J. Nimbley","Thomas L. Williams","Thomas R. Greco","Thomas Robert Cangemi","Thomas Sinnickson Gayner","Tim Archer","Tim Cook","Tim Gokey","Timothy Go","Timothy J. Naughton","Timothy Joseph Donahue","Timothy P. Cawley","Toby Z. Rice","Todd Schneider","Todd Vasos","Tom Bartlett","Tom Fanning","Tom Kingsbury","Tom Palmer","Tom Polen","Tom Reeg","Tom Werner","Tom Wilson II","Tony Will","Tony Xu","Travis D. Stice","Udit Batra","Uzi Yemin","Vicente Reynal","Vicki A. Hollub","Vikram Pandit","Vincent J. Delie, Jr.","Vincent Sorgi MBA","Vincent T. Roche","Vivek Sankaran","W. Craig Jelinek","W. Erik Carlson","W. Rodney McMullen","W. Troy Rudd","Walt Bettinger","Warren Edward Buffett","Wendell P. Weeks","William A. Newlands Jr.","William C. Pate","William C. Rhodes, III","William Charles Stone","William Dillard II","William H. Rogers Jr.","William J. Hornbuckle","William J. Way","William Meaney","William Robert Berkley Jr.","William S. Demchak","Yamini Rangan","Yuan Chao","Yvonne L. Greenstreet"];
        var suggestions3 = ["3i Group","3M","77 Bank","A. O. Smith","A2A","Aareal Bank","ABB","Abbott Laboratories","AbbVie","Abercrombie & Fitch","Absa Group","Abu Dhabi Commercial Bank","Abu Dhabi Islamic Bank","Accenture","Acciona","Activision Blizzard","ACWA Power","Adani Enterprises","Adani Ports & Special Economic Zone","Adani Power Limited","Adaro Energy","Adecco Group","Adidas","ADNOC Drilling","Adobe","Advance Auto Parts","Advanced Info Service","Advanced Micro Devices","Advanced Micro-Fabrication Equipment Inc. China","Advantest","Adyen","AECOM Technology","Aegon","Aena","Aeon","AerCap Holdings","Aeroports de Paris","AES","Aflac","AGC","AGCO","Ageas","Agile Group Holdings","Agilent Technologies","AGNC Investment","Agnico Eagle Mines","Agricultural Bank of China","AIA Group","AIB Group","Aier Eye Hospital Group","Air Canada","Air France-KLM","Air Liquide","Air Products & Chemicals","AirAsia X","AirBnB","AIRBUS","Airports of Thailand","Aisin Seiki","Ajinomoto","Akamai","Akbank","Aker","Akzo Nobel","Al Rajhi Bank","Albemarle","Albertsons","Alcon","Aldar Properties","Alexandria Real Estate Equities","ALFA","Alfa Laval","Alfresa Holdings","Alibaba Group","Align Technology","Alinma Bank","All Nippon Airways","Allegion","Alliant Energy","Allianz","Allstate","Ally Financial","Almarai","Alnylam Pharmaceuticals","Alpha Bank","Alpha Dhabi Holding","Alpha Metallurgical Resources","Alphabet","Alstom","Altice USA","Altria","Aluminum Corp of China","Amadeus IT Group","Amazon","Amcor","Ameren","Am\u00e9rica M\u00f3vil","American Airlines Group","American Electric","American Equity Investment","American Express","American Financial Group","American International Group (AIG)","American Tower","American Water Works","Ameriprise Financial","Ametek","Amgen","Amphenol","Ampol","Analog Devices","Andersons","Andon Health","Angang Steel","Anglo American","Anheuser-Busch InBev","Anhui Conch Cement","Anhui Gujing Distillery","Anhui Water Resources Development","Annaly Capital Management","Ansys","Anta Sports Products","AntarChile","Antero Resources","Antofagasta","ANZ - Australia and New Zealand Banking Group","Aon","Aozora Bank","APA","Apollo Global Management","Apple","Applied Materials","Aptiv","Arab Bank","Arab National Bank","Aramark","ARC Resources","Arca Continental","ArcBest","ArcelorMittal","Arch Capital Group","Arch Resources","Archer Daniels Midland","Ares Management","arGEN-X","Arista Networks","Aristocrat Leisure","Arkema","Arrow Electronics","Arthur J. Gallagher & Co.","Asahi Group Holdings","Asahi Kasei","Asbury Automotive Group","ASE Technology Holding","Ashtead Group","Asian Paints","ASM International","ASML Holding","Asr Nederland","Assa Abloy","Associated British Foods","Assurant","Astellas Pharma","AstraZeneca","Asustek Computer","AT&T","ATI","Atlas Copco","Atlassian","Atmos Energy","ATOS","Attijariwafa Bank","Aurubis","Autodesk","Automatic Data Processing","AutoNation","AutoZone","AvalonBay Communities","Avantor","Avenue Supermarts","Avery Dennison","AVIC Capita","AviChina Industry & Technology","Avis Budget Group","Aviva","Avnet","AXA Group","Axis Bank","Axon Enterprise","B3","BAE Systems","BAIC Motor","Baidu","Bajaj Auto","Bajaj Finserv","Baker Hughes Company","Ball","B\u00e2loise Group","Banca Mediolanum","Banca MPS","Banca Popolare di Sondrio","Banco BPM","Banco Bradesco","Banco Btg Pactual","Banco Comercial Portugues","Banco de Sabadell","Banco do Brasil","Bancolombia","Bandai Namco Holdings","Bangkok Bank","Bank Albilad","Bank Central Asia","Bank Hapoalim","Bank Leumi","Bank Mandiri","Bank Muscat","Bank Negara Indonesia","Bank of America","Bank of Baroda","Bank of Beijing","Bank of Changsha","Bank Of Chengdu","Bank of China","Bank of Chongqing","Bank of Communications","Bank of East Asia","Bank Of Gansu","Bank of Greece","Bank Of Guiyang","Bank of Guizhou","Bank Of Hangzhou","Bank of India","Bank of Ireland","Bank Of Jiangsu","Bank of Jiujiang","Bank of Kyoto","Bank of Lanzhou","Bank of Montreal","Bank of Nanjing","Bank of New York Mellon","Bank of Ningbo","Bank of Nova Scotia","Bank of Qingdao","Bank of Queensland","Bank Of Shanghai","Bank of Suzhou","Bank of Tianjin","Bank of Xi'an","Bank of Zhengzhou","Bank OZK","Bank Pekao","Bank Rakyat Indonesia (BRI)","Bankinter","Banorte","Banpu","Banque Cantonale Vaudoise","Banque Centrale Populaire","Banque Saudi Fransi","Baoshan Iron & Steel","Barclays","Barrick Gold","Barry Callebaut","BASF","Basler Kantonalbank","Bath & Body Works","Bausch Health Companies","Bawag Group","Baxter International","Bayan Resources","Bayer","BayWa","BBMG","BBVA-Banco Bilbao Vizcaya","BCE","BCI-Banco Credito","BDO Unibank","Becton Dickinson","Beiersdorf","BeiGene","Beijing Capital Development","Beijing Enterprises","Beijing Kingsoft Office Software.","Beijing Shougang","Beijing Wantai Biological Pharmacy Enterprise","Beijing-Shanghai High-Speed Railway","BEKB-BCBE","Bendigo & Adelaide Bank","Berkshire Hathaway","Berry Global Group","Best Buy","Bharat Petroleum","Bharti Airtel","BHP Group Ltd","Bio-Rad","Bio-Techne","Biogen","BJ's Wholesale Club","BlackRock","Blackstone","Block","Bluescope Steel","BMW Group","BNK Financial Group","BNP Paribas","BOE Technology Group","Boeing","BOK Financial","Boliden","Booking Holdings","Booz Allen Hamilton Holding","BorgWarner","Borouge","Boston Properties","Boston Scientific","Bouygues","BP","BPER Banca","Brambles","Braskem","Brenntag","Bridgestone","Brighthouse Financial","Bristol Myers Squibb","British American Tobacco","Broadcom","Broadridge Financial Solutions","Brookfield Business","Brookfield Corporation","Brookfield Reinsurance","Brookfield Renewable","Brown & Brown","Brown-Forman","BT Group","Builders FirstSource","Bunge Global SA","Bunzl","Burlington Stores","BYD","C.H. Robinson","Cadence Bank","Cadence Design Systems","Caesars Entertainment","CaixaBank","Callon Petroleum","Camden Property Trust","Campbell Soup","Canadian Imperial Bank","Canadian National Railway","Canadian Natural Resources","Canadian Pacific Kansas City","Canadian Tire Corporation","Canara Bank","Canon","Capgemini","Capital One","CapitaLand Investment","CapitaMall Trust","Cardinal Health","Carlisle Cos","Carlsberg","Carlyle Group","CarMax","Carnival Corporation","Carrefour","Carrier Global","Casey's General Stores","Catalent","Caterpillar","Cathay Financial","Cboe Global Markets","CBRE Group","CDW","Ceconomy","Celanese","Cellnex Telecom","Cemex","Cencora","Cencosud","Cenovus Energy","Centene","CenterPoint Energy","Central Bank of India","Central Japan Railway","Centrica","CEZ Group","CF Industries Holdings","CGI","CGN Power","Chailease Holding","Chang Hwa Bank","Charles River Laboratories","Charles Schwab","Charoen Pokphand Foods","Charter Communications","Check Point Software","Chemours","Cheniere Energy","Chesapeake Energy","Chevron","Chewy","Chiba Bank","China Aviation Oil","China Bohai Bank","China Cinda Asset Management","China Citic Bank","China Coal Energy","China Communications Construction","China Communications Services","China Construction Bank","China CSSC Holdings","China Development Bank Financial Leasing","China Development Financial","China Eastern Airlines","China Energy Engineering","China Everbright Bank","China Fortune Land Development","China Galaxy Securities","China Gas Holdings","China Grand Automotive Services","China Hongqiao Group","China Huarong Asset Management","China Industrial Securities","China International Capital","China International Marine","China Jinmao","China Jushi","China Life Insurance","China Longyuan Power","China Mengniu Dairy","China Merchants Bank","China Merchants Expressway Network & Technology Holdings","China Merchants Port Group","China Merchants Port Holdings","China Merchants Securities","China Merchants Shekou Industrial Zone Holdings","China Minsheng Bank","China Mobile","China Molybdenum","China National Building","China National Chemical","China National Nuclear Power","China Northern Rare Earth High-Tech","China Nuclear Engineering Corporation","China Overseas Grand Oceans Group","China Pacific Insurance","China Railway Construction","China Railway Group","China Reinsurance Group","China Resources Beer (Holdings)","China Resources Gas Group","China Resources Land","China Resources Pharmaceutical Group","China Resources Power","China Shenhua Energy","China Shipbuilding Industry","China Southern Airlines","China State Construction Engineering","China Steel","China Taiping Insurance","China Telecom","China Three Gorges Renewables (Group)","China Tourism Group Duty Free","China Tower Corp.","China Unicom","China Vanke","China Yangtze Power","China Zheshang Bank","Chipotle Mexican Grill","Chongqing Changan Auto","Chongqing Rural Bank","Chongqing Zhifei Biological Products","Chord Energy","Chow Tai Fook Jewellery","CHS","Chubb","Chubu Electric Power","Chugin Financial Group,Inc.","Chugoku Electric Power","Chunghwa Telecom","Church & Dwight","Cigna","CIMB Group Holdings","Cincinnati Financial","Cintas","Cisco Systems","CITIC","Citic Securities","Citigroup","Citizens Financial Group","City Developments","Civitas Resources","CJ Cheiljedang","CJ Corporation","CK Asset Holdings","CK Hutchison","Cleveland-Cliffs","Clorox","CLP Holdings","CME Group","CMS Energy","CNH Industrial","CNOOC","CNPC Capital","CNX Resources","Coal India","Coca-Cola","Coca-Cola Europacific Partners","Coca-Cola HBC","Cognizant","Coinbase","Coinshares International","Coles Group","Colgate-Palmolive","Coloplast","Columbia Bank","Comcast","Comerica","Commercial Bank For Investment & Development Of Vietnam","Commercial Bank of Qatar","Commercial International Bank","Commercial Metals","Commerzbank","Commonwealth Bank","Compal Electronics","Compass Group","Comstock Resources","Conagra Brands","Concordia Financial Group","ConocoPhillips","Consolidated Edison","Constellation Brands","Constellation Energy","Constellation Software","Contemporary Amperex Technology","Continental","CooperCompanies","Copart","Corebridge Financial","Cornerstone Building Brands","Corning","Corpay","Corteva","Cosan","Cosco Shipping","Cosmo Energy Holdings","CoStar Group","Costco Wholesale","Coterra Energy","Coty","Couche Tard","Country Garden Holdings","Coupang","Covestro","Covivio","CP All","CPFL Energia","CPI Property Group","Credicorp","Credit Agricole","Credit Suisse Group","Credito Emiliano","CRH","Croda International Plc","CrowdStrike","Crown Castle International","Crown Holdings","CRRC","Csc Financial","CSL","CSPC Pharmaceutical Group","CSX","CTBC Financial","CTP","Cullen\/Frost Bankers","Cummins","CVR Energy","CVS Health","D.R. Horton","Dai Nippon Printing","Dai-ichi Life Insurance","Daiichi Sankyo","Daikin Industries","Daimler Truck Holding","Daishi Hokuetsu Financial Group","Daito Trust Construction","Daiwa House Industry","Daiwa Securities","Danaher","Dangote Cement","Danone","Danske Bank","Daou Data","Daou Technology","Daqin Railway","Darden Restaurants","Darling Ingredients","Dassault Aviation","Dassault Systemes","Datadog","Datang International Power","DaVita","Dayforce","Db Insurance","DBS","DCC","Deckers Brands","Deere & Company","Delek US Holdings","Delivery Hero","Dell Technologies","Delta Air Lines","Delta Electronics","Denso","Dentsu","Deutsche Bank","Deutsche Boerse","Deutsche Lufthansa","Deutsche Pfandbriefbank","Deutsche Post","Deutsche Telekom","Devon Energy","DexCom","DGB Financial Group","Diageo","Diamondback Energy","Dick's Sporting Goods","DiDi Global","Digital China Group","Digital Realty","Dillard's","DISCO Corp.","Discover Financial","DISH Network","DNB Bank","Dollar General","Dollar Tree","Dollarama","Dominion Energy","Domino's","Dongfeng Motor Group","Dongguan Rural Commercial Bank","DoorDash","Doosan","Dover","Dow","Dr. Sulaiman Al-Habib Medical Services Group","DSM","DSV Panalpina","DTE Energy","Dubai Islamic Bank","Duke Energy","DuPont","DXC Technology","E-mart","E.ON","E.Sun Financial","East Japan Railway","East Money Information","East West Bancorp","Eastman Chemical Company","Eaton","eBay","Ecolab","Ecopetrol","EDF","Edison International","Edp-energias De Portugal","Edward Jones","Edwards Lifesciences","EFG International","Eiffage","El Puerto de Liverpool","Electric Power Development","Electronic Arts","Eletrobr\u00e1s","Elevance Health","Eli Lilly","Emaar Properties","Emera","Emerson Electric","Emirates NBD","Empire","Empresas CMPC","EMS-Chemie Holding","Enbridge","EnBW-Energie Baden","Enel","ENEOS Holdings","Energy Transfer","ENGIE","Eni","ENN Energy Holdings","ENN Natural Gas","Enphase Energy","Entergy","Enterprise Products Partners","EOG Resources","EPAM Systems","Epiroc","EQT","EQT AB","Equifax","Equinix","Equinor","Equitable Holdings","Equity Residential","Ericsson","Erste Group Bank","Essex Property Trust","EssilorLuxottica","Essity","Etisalat","Etsy","Eurobank Ergasias","Eurofins Scientific Societe Europeenne","Euronext","Eve Energy","Everest Re Group","Evergreen Marine Corp. (Taiwan)","Evergy","Eversource Energy","Evolution Gaming Group AB","Evonik Industries","Exelon","EXOR","Expedia Group","Expeditors International","Experian","Extra Space Storage","ExxonMobil","F.N.B.","F5","FactSet","Fair Isaac","Fairfax Financial","Falabella","Fannie Mae","Fanuc","Far East Horizon","Fast Retailing","Fastenal","Fastighets Balder","Faurecia","FCC","Federal Realty","FedEx","Femsa","Ferguson","Ferrari","Ferrovial","Fertiglobe","FIBI Holdings","Fibra Uno","Fidelity National Financial","Fidelity National Information (FIS)","Fifth Third Bank","Financiere de l'Odet","Finatis","FinecoBank","First Abu Dhabi Bank","First Citizens Bank (NC)","First Financial Holding","First Horizon","First Pacific","First Quantum Minerals","First Solar","FirstEnergy","FirstRand","Fiserv","Flex","Flutter Entertainment","FMC","Foot Locker","Ford Motor","Ford Otosan","Formosa Chemicals","Formosa Petrochemical","Formosa Plastics","Fortescue Metals Group","Fortinet","Fortis (Canada)","Fortive","Fortum","Foshan Haitian Flavouring and Food","Fosun International","Fox","Franco-Nevada","Franklin Templeton","Frasers Property","Freddie Mac","Freeport-McMoRan","Fresenius","Fubon Financial","Fujifilm Holdings","Fujitsu","Fukuoka Financial Group","Fuyao Glass Industry Group","GAIL India","Galaxy Entertainment","Galp Energia","Gaming And Leisure Properties","Ganfeng Lithium","Gap","Garmin","Gartner","GCL Technology Holdings","GD Power Development","GE Healthcare","GE Vernova","Geberit","Geely Automobile Holdings","Gemdale","Gen Digital","Generac","General Dynamics","General Electric","General Insurance Corporation Of India","General Mills","General Motors","Generali Group","Genmab","Genuine Parts","Genworth Financial","George Weston","Gerdau (Cosigua)","GF Securities","Gilead Sciences","Givaudan","Glencore International","Global Payments","Globalfoundries","Globe Life","GoDaddy","Goertek","Gold Fields","Golden Agri-Resources","Goldman Sachs","Goodman Group","Goodyear","Grandjoy Holdings Group","Graphic Packaging","Grasim Industries","Graybar Electric","Great Wall Motor","Gree Electric Appliances","Greenland Holdings Group","Greentown China Holdings","Group 1 Automotive","Grupa PZU","Grupo ACS","Grupo Aval","Grupo Bimbo","Grupo Bolivar","Grupo Carso","Grupo Elektra","Grupo Inbursa","Grupo Mexico","GS Holdings","GSK","Guangdong Haid Group","Guanghui Energy Co. Ltd.","Guangzhou Automobile Group","Guangzhou Baiyunshan Pharmaceutical Holdings","Guangzhou R&F","Guangzhou Rural Commercial Bank","Guangzhou Tinci Materials Technology","Guardian Life","Gulfport Energy","Gunma Bank","Guosen Securities","Guotai Junan Securities","H&M - Hennes & Mauritz","Hachijuni Bank","Haier Smart Home","Haitong Securities","HAL Trust","Haleon","Halkbank","Halliburton","Halyk Bank","Hana Financial Group","Hangzhou Binjiang Real Estate Group Co., Ltd.","Hanwa","Hanwha","Harbin Bank","Harbour Energy","Hartford Financial Services","Hasbro","HBIS","HCA Healthcare","HCL Technologies","HD HYUNDAI","HDFC","HDFC Bank","Healthpeak Properties","Heico","HeidelbergCement","Heineken","Hellenic Petroleum","Helvetia Holding","Henderson Land","Hengli Petrochemical","Hengyi Petrochemical","Henkel","Henry Schein","Hera","Hermes International","Hertz Global Holdings","Hess","Hewlett Packard Enterprise","Hexagon","HF Sinclair","Hikvision","Hilton Worldwide","Hindalco Industries","Hirogin Holdings","Hitachi","HMM","Hokuhoku Financial Group","Holcim","Hologic","Hon Hai Precision","Honda Motor","Honeywell","Hong Kong Exchanges","Hong Leong Financial","Hopson Development Holdings","Horizon Therapeutics Public Limited Company","Hormel Foods","Hoshine Silicon Industry","Host Hotels & Resorts","Hotai Motor","Howmet Aerospace","Hoya","HP","HSBC Holdings","Hua Nan Financial","Huadian Power International","Huafa Industrial","Huaibei Mining Holdings","Huaneng Power International","Huatai Securities","Huaxia Bank","Hubbell","Hubei Biocause Pharmaceutical","HubSpot","Huishang Bank","Humana","Hunan Valin Steel","Huntington Bank","Huntington Ingalls Industries","Hyakugo Bank","Hyatt Hotels","Hydro One","Hygon Information Technology","Hyundai Engineering","Hyundai Glovis","Hyundai Marine & Fire","Hyundai Mobis","Hyundai Motor","Hyundai Steel","iA Financial Corporation","Iberdrola","IBM","ICBC","ICICI Bank","ICON (Ireland)","IDBI Bank","Idemitsu Kosan","IDEX","IDEXX Laboratories","iflytek","Iida Group Holdings","Illinois Tool Works","Illumina","Impala Platinum Holdings","Imperial Brands","Incyte","Indian Bank","Indian Oil","Indian Railway Finance","Inditex","Indorama Ventures","IndusInd Bank","Industrial Bank","Industrial Bank of Korea","Industries Qatar","Industrivarden","Infineon Technologies","Infosys","ING Group","Ingersoll Rand","Inner Mongolia Baotou Steel","Inner Mongolia Yili","Inner Mongolia Yitai Coal","Inpex","Insight Enterprises","Insulet Corp","Intact Financial","Intel","Interactive Brokers Group","Intercontinental Exchange","International Airlines","International Distributions Services","International Flavors & Fragrances","International Holding Company","International Paper","Interpublic Group","Intesa Sanpaolo","Intuit","Intuitive Surgical","Inventec","Invesco","Investec","Investor AB","Invitation Homes","Ipsen SA","IQVIA","Iron Mountain","Isbank","Israel Corp","Israel Discount Bank","Isuzu Motors","Ita\u00fa Unibanco Holding","Ita\u00fasa","ITC","Itochu","Iveco Group","Iyogin Holdings,Inc.","J Sainsbury","J.B. Hunt Transport Services","JA Solar Technology","Jabil Circuit","Jack Henry & Associates","Jackson Financial","Jacobs Solutions","Japan Airlines","Japan Exchange Group","Japan Post Holdings","Japan Securities","Japan Tobacco","Jardine Matheson","JB Financial Group","JBS","JD Sports Fashion","JD.com","JDE Peet's","Jefferies Financial","Jeronimo Martins","JetBlue Airways","JFE Holdings","Jiangsu Changshu Rural Commercial Bank","Jiangsu Eastern Shenghong","Jiangsu Hengrui Medicine","Jiangsu Yanghe Brewery","Jiangsu Zhongnan Construction Group","Jiangxi Bank","Jiangxi Copper","Jinke Property Group","Jinko Solar","Jinshang Bank","JM Smucker","John Hancock Group","Johnson & Johnson","Johnson Controls","Johnson Matthey","Joint Stock Commercial Bank for Foreign Trade of Vietnam","Jointown Pharmaceutical Group","Jones Lang LaSalle","JPMorgan Chase","JSW Group","JSW Steel","Julius Baer Group","Juniper Networks","Juroku Financial Group","Jyske Bank","K+S","Kajima","Kakao","KakaoBank","Kangmei Pharmaceutical","Kansai Electric Power","Kao","Kasikornbank","Kaspi.kz JSC","Kawasaki Heavy Industries","Kawasaki Kisen Kaisha","KB Financial Group","KBC Group","KDDI","KE Holdings","Keiyo Bank","Kellanova (Kellogg's)","Kenvue","Keppel","Kering","Kerry Group","Kesko","Keurig Dr Pepper","KeyCorp","Keyence","Keysight Technologies","KGHM Polska Miedz","KIA","Kimberly-Clark","Kimco Realty","Kinder Morgan","Kingdom Holding","Kingfisher","Kingspan Group PLC","Kintetsu","KION Group","Kirin Holdings","Kiyo Bank","KKR","KLA","Knight-swift Transportation Holdings","Knorr-Bremse","Kobe Steel","Ko\u00e7 Holding","Kohl's","Komatsu","Kone","Korea Electric Power","Korea Gas","Korea Investment Holdings","Korea Shipbuilding & Offshore Engineering","Korea Zinc","Korean Air","Kotak Mahindra Bank","KPN","Kraft Heinz","Kroger","Krung Thai Bank","KT","Kuaishou Technology","Kubota","Kuehne & Nagel International","Kuwait Finance House","Kweichow Moutai","Kyndryl Holdings","Kyocera","Kyushu Electric Power","Kyushu Financial Group","L'Oreal","L3Harris Technologies","Labcorp","Lam Research","Lamb Weston","Land O'Lakes","Larsen & Toubro","Las Vegas Sands","Latam Airlines","Lear","Legal & General Group","Legend Holding","Legrand","Leidos","Lennar","Lenovo Group","Leonardo","Levi Strauss","LG","LG Chem","LG Display","LG Electronics","LG Innotek Co.,","LG Uplus","Li Auto","Li Ning","Liberty Broadband","Liberty Global","Liberty Media Corporation Series A Liberty Formula One","Liberty Mutual Insurance Group","Life Insurance Corp. of India","Lincoln National","Linde plc","Lindt & Sprungli","Link REIT","Lithia Motors","Live Nation Entertainment","LKQ","Lloyds Banking Group","Lockheed Martin","Loews","Logan Property Holdings","London Stock Exchange","Longfor Group Holdings","Longi Green Energy Technology","Lonza Group","Lotte Chemical","Lotte Shopping","Lowe's","LPL Financial Holdings","Lufax Holding","Lululemon Athletica","Lumen Technologies","Lundbergs","Luxshare Precision Industry","Luzerner Kantonalbank","Luzhou Lao Jiao","LVMH Mo\u00ebt Hennessy Louis Vuitton","LyondellBasell Industries","M&G","M&T Bank","Macquarie Group","Macy's","Magna International","Mahindra & Mahindra","Manpower","Manulife","Mapfre","Marathon Oil","Marathon Petroleum","Marfrig Global Foods","Markel","MarketAxess","Marriott International","Marsh & McLennan","Martin Marietta Materials","Marubeni","Marvell Technology","Masco","Mashreq Bank","Masraf Al Rayan","Massachusetts Mutual Life Insurance (MassMutual)","Mastercard","Match Group","Maybank","Mazda Motor","McCormick & Company","McDonald's","McKesson","MDU Resources Group","Mebuki Financial Group","MediaTek","Mediobanca","Medipal Holdings","Medtronic","Mega Financial Holding","Meituan","MercadoLibre","Mercedes-Benz Group","Merck & Co.","Merck KGaA, Darmstadt, Germany and its affiliates","Mercuries & Associates","Meritz Financial Group","Meta Platforms","Metallurgical Corp of China","Metalurgica Gerdau","MetLife","Metro","Metro Group","Metropolitan Bank & Trust","Mettler-Toledo International","MGM Resorts","Michelin Group","Microchip Technology","Micron Technology","Microsoft","Mid-america Apartment Communities","Midea Group","Midea Real Estate Holding","Migdal Insurance","Military Commercial Joint Stock Bank","Minnesota Mutual Life Insurance","Mirae Asset Financial Group","Mitsubishi","Mitsubishi Chemical","Mitsubishi Electric","Mitsubishi Estate","Mitsubishi Heavy Industries","Mitsubishi Motors","Mitsubishi UFJ Financial","Mitsubishi UFJ Lease","Mitsui","Mitsui Chemicals","Mitsui Fudosan","Mitsui OSK Lines","Mizrahi Tefahot Bank","Mizuho Financial","Mobileye Global","Moderna","Mohawk Industries","MOL Hungarian Oil","Molina Healthcare","M\u00f8ller-Maersk","Molson Coors Brewing","Moncler SpA","Mondelez International","Mondi","Monolithic Power Systems","Monster Beverage","Moody's","Morgan Stanley","Motor Oil","Motorola Solutions","Mowi ASA","MS&AD Insurance","MSCI","MTN Group","MTR","Multiply Group","Munich Re","Murata Manufacturing","Murphy Oil","Murphy USA","Muyuan Foodstuff","NAB - National Australia Bank","Nan Ya Plastics","Nanto Bank","NARI Technology Development","NASDAQ","Naspers","National Bank of Canada","National Bank of Greece","National Bank of Kuwait","National Grid","Nationwide","Naturgy Energy Group","NatWest Group","NAURA Technology GroupLtd","Naver","Navient","NEC","Nedbank","Neste","Nestl\u00e9","NetApp","NetEase","Netflix","New China Life Insurance","New Hope Liuhe","New World Development","New York Community Bancorp","New York Life Insurance","Newcrest Mining","Newmont Mining","News Corp","Nexi S.p.A.","NEXON","Next","NextEra Energy","NIBE Industrier","Nidec","Nike","Ningbo Port","Ningxia Baofeng Energy Group","Nintendo","NIO","NIPPON EXPRESS HOLDINGS","Nippon Paint","Nippon Steel","Nippon Steel Trading","Nippon Telegraph & Tel","Nippon Yusen","Nishi-nippon Financial Holdings","NiSource","Nissan Motor","Nitori Holdings","Nitto Denko","NN Group","Nokia","Nomura","Nomura Research Institute","Nongfu Spring","Nordea Bank","Nordson","Nordstrom","Norfolk Southern Railway","Norsk Hydro","North Pacific Bank","Northern Oil and Gas","Northern Trust","Northrop Grumman","Northwestern Mutual","Norwegian Cruise Line Holdings","Novartis","Novo Nordisk","NRG Energy","NTPC","Nu Holdings","Nucor","Nutrien","NVIDIA","NVR","NXP Semiconductors","O'Reilly Automotive","Obayashi","Occidental Petroleum","OCI","Ogaki Kyoritsu Bank","Oil & Natural Gas","Oji Holdings","Olam Group","Old Dominion Freight Line","Old Mutual","Old National Bank","Old Republic International","Olin","Olympus","Omnicom Group","OMRON","OMV Group","ON Semiconductor","OneMain Holdings","Oneok","ONO Pharmaceutical","Ooredoo Q.P.S.C","Opendoor Technologies","Oracle","Orange","Orient Securities","Oriental Land","Origin Energy","Orix","Orsted","Osaka Gas","OSB Group","Oshkosh","Otis Worldwide","OTP Bank","Otsuka Holding","Outokumpu","Oversea-Chinese Banking","Ovintiv","Owens Corning","Pac Life Group","Paccar","Packaging Corp of America","PacWest Bancorp","Pakistan State Oil","Palo Alto Networks","Pan Pacific International Holdings","Panasonic","Par Pacific Holdings","Paramount","Parker-Hannifin","Parkland","Parsons","Partners Group Holding","Paychex","Paycom","PayPal","PBF Energy","Pdc Energy","PDD Holdings","Peabody Energy","Pegatron","Pembina Pipeline","Penn Entertainment","Penske Automotive","Pentair","PepsiCo","Performance Food Group","PerkinElmer","Pernod Ricard","Petro Rabigh","Petrobras","PetroChina","Petronas Chemicals","Pfizer","PG&E","PGE Polska Grupa Energetyczna","Philip Morris International","Philips","Phillips 66","Phoenix Group Holdings","PICC","Pilbara Minerals","Ping An Insurance Group","Pinnacle Bank","Pinnacle West","Pioneer Natural Resources","Piraeus Financial Holdings","PKN Orlen","PKO Bank Polski","Plains GP Holdings","PNC Financial Services","Polaris Inc.","Poly Developments & Holdings Group","Pool","Popular","Porsche Automobil Holding","Posco","Postal Savings Bank Of China (PSBC)","Poste Italiane","Power Assets Holdings","Power Construction Corporation of China","Power Corp of Canada","Power Finance","Power Grid of India","PPG","PPL","Prada","President Chain Store","Principal Financial Group","Procter & Gamble","Progressive","Prologis","Prosperity Bancshares","Prudential","Prysmian","PT Garuda Indonesia (Persero)","PTC","PTT","PTT Global Chemical","Public Bank","Public Power","Public Service Enterprise Group","Public Storage","Publicis Groupe","Publix Super Markets","Puget Energy","PulteGroup","Punjab National Bank","Qatar Islamic Bank","Qatar National Bank","QBE Insurance Group","Qilu Bank","Qingdao Rural Commercial Bank","Qinghai Salt Lake Industry","Qorvo","Qualcomm","Quanta Computer","Quanta Services","Quest Diagnostics","Quilter","Quinenco","Raiffeisen Bank International","Raizen","Rajesh Exports","Rakuten","Ralph Lauren","Randstad N.V.","Range Resources","Raymond James Financial","RBC","Realty Income","Reckitt Benckiser Group","Recruit Holdings","Red El\u00e9ctrica","Regal Rexnord","Regency Centers","Regeneron Pharmaceuticals","Regions Financial","Reinsurance Group of America","Reliance Industries","Reliance Steel","RELX","RenaissanceRe Holdings","Renault","Renesas Electronics","Rentokil Initial","Repsol","Republic Services","ResMed","Resona Holdings","Restaurant Brands International","Revvity","Rexel","RHB Bank","Rheinmetall","Richemont","Ricoh","Rio Tinto","RiseSun Real Estate Development","Rite Aid","Riyad Bank","Roblox","Roche Holding","Rockwell Automation","Rogers Communications","Rollins","Rolls-Royce Holdings","Rongsheng Petrochemical","Roper Technologies","Ross Stores","Royal Ahold Delhaize N.V.","Royal Caribbean Group","Royalty Pharma","RPM International","RTX (Raytheon)","RWE Group","Ryanair Holdings","Ryder System","S-Oil","S.F. Holding","S&P Global","Sabanci Holding","Safran","SAIC Motor","Saint-Gobain","Salesforce","Salzgitter","Sampo","Samsung C&T","Samsung Electro-Mechanics","Samsung Electronics","Samsung Fire & Marine","Samsung Life Insurance","Samsung SDI","Samsung SDS","San-In Godo Bank","Sandvik","Sanlam","Sanofi","Sansteel Minguang","Santander","Santos","Sany Heavy Industry","SAP","Saputo","Saras","Sartorius","Sasa Polyester Sanayi","Sasol","Saudi Arabian Mining","Saudi Arabian Oil Company (Saudi Aramco)","Saudi British Bank","Saudi Electricity","Saudi Telecom","SBA Communications","SBI Holdings","Sbi Sumishin Net Bank","SCB X Public Company","Scentre Group","Schaeffler","Schindler Holding","Schlumberger","Schneider Electric","Schroders","Schweizerische Nationalbank","Science Applications International","Scor","SDIC Capital","SDIC Power Holdings","Seadrill","Seagate Technology","Seagen","Seazen Group","SEB AB","Secom","Segro","Sekisui House","Semiconductor Manufacturing International","Sempra Energy","Senshu Ikeda Holdings","ServiceNow","Seven & I Holdings","SG Holdings","SGS","Shaanxi Coal Industry","Shaanxi Construction Engineering Group","Shanghai Commercial & Savings Bank","Shanghai Construction","Shanghai Electric Group","Shanghai International Port","Shanghai Pharmaceuticals","Shanghai Pudong Development","Shanghai Rural Commercial Bank","Shanghai Tunnel Engineering Co. Ltd.","Shanghai Yuyuan Tourist Mart","Shanxi Coal International Energy Group","Shanxi Lu'an Environmental","Shanxi Xinghuacun Fen Wine Factory","Shanxi Xishan Coal & Electricity Power Co. Ltd.","Sharp","Shell","Shengjing Bank","Shenwan Hongyuan Group","Shenzhen Inovance Technology","Shenzhen Mindray Bio-Medical Electronics","Shenzhen Overseas","Shenzhou International Group Holdings","Sherwin-Williams","Shiga Bank","Shimano","Shimizu","Shin Kong Financial","Shin-Etsu Chemical","Shinhan Financial Group","Shinsei Bank","Shionogi","Shiseido","Shizuoka Financial Group","Shopify","Shriram Transport Finance Co.","Siam Cement","Siam Makro","Sibanye Stillwater","Sichuan Road & Bridge","Siemens","Siemens Energy","Sika","Simon Property Group","Singapore Airlines","SingTel","Sino-Ocean Group Holding","SinoPac Financial","Sinopec","Sinopharm Group","Sinotrans Ltd.","SITC International Holdings","SK","SK Hynix","SK Innovation","SK Telecom","Skanska","Skyworks Solutions","SM Investments","SMC","Smurfit Westrock PLC","Snam","Snap-on","Snowflake","Soci\u00e9t\u00e9 G\u00e9n\u00e9rale","Sodexo","Softbank","Sojitz","Solvay","Solventum","Sompo","Sonic Healthcare","Sonova Holding","Sony","South State","South32","Southern Company","Southwest Airlines","Southwest Gas Holdings","Southwestern Energy","Spotify Technology","SQM","SS&C Technologies","SSE","St. Galler Kantonalbank","St. James's Place","St. Mary Land & Exploration Co.","Standard Bank Group","Standard Chartered","Stanley Black & Decker","Starbucks","Starwood Property Trust","State Bank of India","State Farm Insurance","State Street","Steel Authority of India","Steel Dynamics","Stellantis","Steris","Stifel Financial","STMicroelectronics","StoneX Group","Stora Enso","Storebrand","STRABAG","Straumann Holding","Stryker","Subaru","Sumec Corporation","Sumitomo","Sumitomo Chemical","Sumitomo Electric","Sumitomo Forestry Co.,","Sumitomo Metal Mining","Sumitomo Mitsui Financial","Sumitomo Mitsui Trust","Sumitomo Realty","Sun Communities","Sun Hung Kai Properties","Sun Life Financial","Sun Pharma Industries","Suncor Energy","Suncorp Group","Sungrow Power Supply","Suning.com","Sunshine Insurance Group","Suntory Beverage & Food","Supermicro","Suzano","Suzuken","Suzuki Motor","Svenska Handelsbanken","Swatch Group","Swedbank","Swire Pacific","Swiss Life Holding","Swiss Re","Swisscom","Synchrony Financial","Synnex Technology Intl","Synopsys","Synovus","Sysco","T Rowe Price","T-Mobile US","T&D Holdings","Taisei","Taishin Financial Holdings","Taiwan Business Bank","Taiwan Cooperative Financial","Taiwan Semiconductor","Take-Two Interactive","Takeda Pharmaceutical","Talanx","Tapestry","TAQA","Targa Resources","Target","Tata Consultancy Services","Tata Motors","Tata Steel","Taylor Morrison Home","TBEA","TC Energy","TCL","TCL Zhonghuan Renewable Energy Technology","TD Bank Group","TD SYNNEX","TDK","TE Connectivity","Tech Mahindra","Techtronic Industries","Teck Resources","Telecom Italia","Teledyne Technologies","Teleflex","Telef\u00f3nica","Telenor","Teleperformance","Telia","Telkom Indonesia","Telstra","TELUS","Tenaga Nasional","Tenaris","Tencent Holdings","Tenet Healthcare","Teradyne","Terex","Terna","Ternium","Terumo","Tesco","Tesla","Teva Pharmaceutical","Texas Instruments","Textron","TFI International","Thai Beverage","Thai Oil","Thales","The Estee Lauder Companies","The Hershey Company","The Home Depot","The Mosaic Company","The Saudi National Bank","Thermo Fisher Scientific","Thomson Reuters","Thor Industries","Thrivent Financial for Lutherans","ThyssenKrupp Group","TIAA","Tianqi Lithium","Tingyi Holding","Titan (India)","TJX Companies","TMB Bank","Toho Bank","Tohoku Electric Power","Tokio Marine Holdings","Tokyo Century","Tokyo Electric Power","Tokyo Electron","Tokyo Gas","Tokyo Kiraboshi Financial Group","Toll Brothers","Tongling Nonferrous Metals","Tongwei","Top Frontier Investment Holdings","Toppan Printing","Toray Industries","Toshiba","TotalEnergies","Tourmaline Oil","Towngas","Toyota Industries","Toyota Motor","Toyota Tsusho","Tractor Supply","Trade Desk","Trane Technologies","TransDigm Group","Transurban Group","Travelers Companies","Trimble","Trina Solar","Trip.com Group","Truist Financial","Tsingtao Brewery","TUI","Turkish Airlines","Tyler Technologies","Tyson Foods","U-Haul Holding","Uber","UBS","UCB","UDR","Ulta Beauty","Ultrapar Participacoes","Umicore","Uni-President","Unibail-Rodamco-Westfield","Unicaja Banco","Unicharm","UniCredit","Unilever","Union Bank of India","Union Pacific","Unipol Gruppo","Uniqa","Unisplendour","United Airlines Holdings","United Microelectronics","United Natural Foods","United Overseas Bank","United Parcel Service","United Rentals","United Therapeutics","United Utilities","UnitedHealth Group","Univar","Universal Health Services","Universal Music Group","Unum","UPM-Kymmene","US Bancorp","US Foods","US Steel","USAA","VakifBank","Vale","Valeo","Valero Energy","Valley National Bancorp","Var Energi ASA","Vedanta Limited","Veeva Systems","Ventas","Veolia Environnement","Veralto","Verbund","VeriSign","Verisk Analytics","Verizon Communications","Vertex Pharmaceuticals","Vertiv Holdings","Vestas Wind Systems","VF","Viatris","Vibra Energia","VICI Properties","Vienna Insurance Group","Vietin Bank","Vietnam Technological & Commercial Joint Stock Bank","VINCI","Vipshop Holdings","Virgin Money UK","Visa","Vistra Energy","Viva Energy Group","Vivendi","VMware","Vodafone","Voestalpine","Volkswagen Group","Volvo Car","Volvo Group","Vonovia","Voya Financial","Vulcan Materials","W. R. Berkley","W.P. Carey","W.W. Grainger","Wabtec","Wacker Chemie","Walgreens Boots Alliance","Walmart","Walt Disney","Wan Hai Lines","Wanhua Chemical Group","Warner Bros. Discovery","Waste Connections","Waste Management","Waters","Watsco","Webster Financial","WEC Energy Group","WEG","Weichai Power","Weihai City Commercial Bank","Wells Fargo","Welltower","Wens Foodstuff Group","WESCO International","Wesfarmers","West Fraser Timber Co.","West Japan Railway","West Pharmaceutical Services","Western Alliance Bancorp.","Western Digital","Westinghouse Air Brake Technologies","Westlake Chemical","Westpac Banking Group","Weyerhaeuser","WH Group","Wharf Real Estate Investment","Wheaton Precious Metals","Whirlpool","Whitehaven Coal","Williams Companies","Williams-Sonoma","Willis Towers Watson","Wilmar International","Wintrust Financial","Wipro","Wistron","Wolters Kluwer","Woodside Energy Group","Woolworths","Woori Financial Group","Workday","World Fuel Services","World Kinect","Worldline","WPG Holdings","WPP","WSP","WT Microelectronics","Wuchan Zhongda Group","Wuestenrot & Wuerttembergische","Wuliangye Yibin","Wuxi Apptec","WuXi Biologics","Wynn Resorts","Xcel Energy","XCMG Construction Machinery","Xiamen Bank","Xiamen C&D","Xiamen International Trade Group","Xiamen Xiangyu","Xiaomi","Xinjiang Daqo New Energy","Xinte Energy","XP","Xylem","Yamaguchi Financial","Yamaha Motor","Yang Ming Marine Transport","Yango Group","Yankuang Energy Group","Yara International","Yes Bank","YPF","YTO Express Group","Yuanta Financial Holding","Yuexiu Property","Yum China Holdings","Yum! Brands","Yunnan Baiyao Group","Yunnan Copper Co. Ltd.","Yunnan Yuntianhua","Zalando","Zall Smart Commerce Group","Zebra Technologies","Zenith Bank","Zhangzhou Pientzehuang Pharmaceutical","Zhejiang Chint Electrics","Zhejiang Construction Investment Group","Zhejiang Expressway Co. Ltd.","Zhejiang Huayou Cobalt","Zhejiang Zheneng Electric Power","Zheshang Development Group","Zhongsheng Group Holdings","Zhongyuan Bank","Zijin Mining Group","ZIM Integrated Shipping Services","Zimmer Biomet","Zions Bancorp","Zoetis","ZTE","ZTO Express (Cayman)","Zurich Insurance Group"];
        var suggestions4 = ["3i Group","3M","77 Bank","A. O. Smith","A2A","Aareal Bank","ABB","Abbott Laboratories","AbbVie","Abercrombie & Fitch","Absa Group","Abu Dhabi Commercial Bank","Abu Dhabi Islamic Bank","Accenture","Acciona","Activision Blizzard","ACWA Power","Adani Enterprises","Adani Ports & Special Economic Zone","Adani Power Limited","Adaro Energy","Adecco Group","Adidas","ADNOC Drilling","Adobe","Advance Auto Parts","Advanced Info Service","Advanced Micro Devices","Advanced Micro-Fabrication Equipment Inc. China","Advantest","Adyen","AECOM Technology","Aegon","Aena","Aeon","AerCap Holdings","Aeroports de Paris","AES","Aflac","AGC","AGCO","Ageas","Agile Group Holdings","Agilent Technologies","AGNC Investment","Agnico Eagle Mines","Agricultural Bank of China","AIA Group","AIB Group","Aier Eye Hospital Group","Air Canada","Air France-KLM","Air Liquide","Air Products & Chemicals","AirAsia X","AirBnB","AIRBUS","Airports of Thailand","Aisin Seiki","Ajinomoto","Akamai","Akbank","Aker","Akzo Nobel","Al Rajhi Bank","Albemarle","Albertsons","Alcon","Aldar Properties","Alexandria Real Estate Equities","ALFA","Alfa Laval","Alfresa Holdings","Alibaba Group","Align Technology","Alinma Bank","All Nippon Airways","Allegion","Alliant Energy","Allianz","Allstate","Ally Financial","Almarai","Alnylam Pharmaceuticals","Alpha Bank","Alpha Dhabi Holding","Alpha Metallurgical Resources","Alphabet","Alstom","Altice USA","Altria","Aluminum Corp of China","Amadeus IT Group","Amazon","Amcor","Ameren","Am\u00e9rica M\u00f3vil","American Airlines Group","American Electric","American Equity Investment","American Express","American Financial Group","American International Group (AIG)","American Tower","American Water Works","Ameriprise Financial","Ametek","Amgen","Amphenol","Ampol","Analog Devices","Andersons","Andon Health","Angang Steel","Anglo American","Anheuser-Busch InBev","Anhui Conch Cement","Anhui Gujing Distillery","Anhui Water Resources Development","Annaly Capital Management","Ansys","Anta Sports Products","AntarChile","Antero Resources","Antofagasta","ANZ - Australia and New Zealand Banking Group","Aon","Aozora Bank","APA","Apollo Global Management","Apple","Applied Materials","Aptiv","Arab Bank","Arab National Bank","Aramark","ARC Resources","Arca Continental","ArcBest","ArcelorMittal","Arch Capital Group","Arch Resources","Archer Daniels Midland","Ares Management","arGEN-X","Arista Networks","Aristocrat Leisure","Arkema","Arrow Electronics","Arthur J. Gallagher & Co.","Asahi Group Holdings","Asahi Kasei","Asbury Automotive Group","ASE Technology Holding","Ashtead Group","Asian Paints","ASM International","ASML Holding","Asr Nederland","Assa Abloy","Associated British Foods","Assurant","Astellas Pharma","AstraZeneca","Asustek Computer","AT&T","ATI","Atlas Copco","Atlassian","Atmos Energy","ATOS","Attijariwafa Bank","Aurubis","Autodesk","Automatic Data Processing","AutoNation","AutoZone","AvalonBay Communities","Avantor","Avenue Supermarts","Avery Dennison","AVIC Capita","AviChina Industry & Technology","Avis Budget Group","Aviva","Avnet","AXA Group","Axis Bank","Axon Enterprise","B3","BAE Systems","BAIC Motor","Baidu","Bajaj Auto","Bajaj Finserv","Baker Hughes Company","Ball","B\u00e2loise Group","Banca Mediolanum","Banca MPS","Banca Popolare di Sondrio","Banco BPM","Banco Bradesco","Banco Btg Pactual","Banco Comercial Portugues","Banco de Sabadell","Banco do Brasil","Bancolombia","Bandai Namco Holdings","Bangkok Bank","Bank Albilad","Bank Central Asia","Bank Hapoalim","Bank Leumi","Bank Mandiri","Bank Muscat","Bank Negara Indonesia","Bank of America","Bank of Baroda","Bank of Beijing","Bank of Changsha","Bank Of Chengdu","Bank of China","Bank of Chongqing","Bank of Communications","Bank of East Asia","Bank Of Gansu","Bank of Greece","Bank Of Guiyang","Bank of Guizhou","Bank Of Hangzhou","Bank of India","Bank of Ireland","Bank Of Jiangsu","Bank of Jiujiang","Bank of Kyoto","Bank of Lanzhou","Bank of Montreal","Bank of Nanjing","Bank of New York Mellon","Bank of Ningbo","Bank of Nova Scotia","Bank of Qingdao","Bank of Queensland","Bank Of Shanghai","Bank of Suzhou","Bank of Tianjin","Bank of Xi'an","Bank of Zhengzhou","Bank OZK","Bank Pekao","Bank Rakyat Indonesia (BRI)","Bankinter","Banorte","Banpu","Banque Cantonale Vaudoise","Banque Centrale Populaire","Banque Saudi Fransi","Baoshan Iron & Steel","Barclays","Barrick Gold","Barry Callebaut","BASF","Basler Kantonalbank","Bath & Body Works","Bausch Health Companies","Bawag Group","Baxter International","Bayan Resources","Bayer","BayWa","BBMG","BBVA-Banco Bilbao Vizcaya","BCE","BCI-Banco Credito","BDO Unibank","Becton Dickinson","Beiersdorf","BeiGene","Beijing Capital Development","Beijing Enterprises","Beijing Kingsoft Office Software.","Beijing Shougang","Beijing Wantai Biological Pharmacy Enterprise","Beijing-Shanghai High-Speed Railway","BEKB-BCBE","Bendigo & Adelaide Bank","Berkshire Hathaway","Berry Global Group","Best Buy","Bharat Petroleum","Bharti Airtel","BHP Group Ltd","Bio-Rad","Bio-Techne","Biogen","BJ's Wholesale Club","BlackRock","Blackstone","Block","Bluescope Steel","BMW Group","BNK Financial Group","BNP Paribas","BOE Technology Group","Boeing","BOK Financial","Boliden","Booking Holdings","Booz Allen Hamilton Holding","BorgWarner","Borouge","Boston Properties","Boston Scientific","Bouygues","BP","BPER Banca","Brambles","Braskem","Brenntag","Bridgestone","Brighthouse Financial","Bristol Myers Squibb","British American Tobacco","Broadcom","Broadridge Financial Solutions","Brookfield Business","Brookfield Corporation","Brookfield Reinsurance","Brookfield Renewable","Brown & Brown","Brown-Forman","BT Group","Builders FirstSource","Bunge Global SA","Bunzl","Burlington Stores","BYD","C.H. Robinson","Cadence Bank","Cadence Design Systems","Caesars Entertainment","CaixaBank","Callon Petroleum","Camden Property Trust","Campbell Soup","Canadian Imperial Bank","Canadian National Railway","Canadian Natural Resources","Canadian Pacific Kansas City","Canadian Tire Corporation","Canara Bank","Canon","Capgemini","Capital One","CapitaLand Investment","CapitaMall Trust","Cardinal Health","Carlisle Cos","Carlsberg","Carlyle Group","CarMax","Carnival Corporation","Carrefour","Carrier Global","Casey's General Stores","Catalent","Caterpillar","Cathay Financial","Cboe Global Markets","CBRE Group","CDW","Ceconomy","Celanese","Cellnex Telecom","Cemex","Cencora","Cencosud","Cenovus Energy","Centene","CenterPoint Energy","Central Bank of India","Central Japan Railway","Centrica","CEZ Group","CF Industries Holdings","CGI","CGN Power","Chailease Holding","Chang Hwa Bank","Charles River Laboratories","Charles Schwab","Charoen Pokphand Foods","Charter Communications","Check Point Software","Chemours","Cheniere Energy","Chesapeake Energy","Chevron","Chewy","Chiba Bank","China Aviation Oil","China Bohai Bank","China Cinda Asset Management","China Citic Bank","China Coal Energy","China Communications Construction","China Communications Services","China Construction Bank","China CSSC Holdings","China Development Bank Financial Leasing","China Development Financial","China Eastern Airlines","China Energy Engineering","China Everbright Bank","China Fortune Land Development","China Galaxy Securities","China Gas Holdings","China Grand Automotive Services","China Hongqiao Group","China Huarong Asset Management","China Industrial Securities","China International Capital","China International Marine","China Jinmao","China Jushi","China Life Insurance","China Longyuan Power","China Mengniu Dairy","China Merchants Bank","China Merchants Expressway Network & Technology Holdings","China Merchants Port Group","China Merchants Port Holdings","China Merchants Securities","China Merchants Shekou Industrial Zone Holdings","China Minsheng Bank","China Mobile","China Molybdenum","China National Building","China National Chemical","China National Nuclear Power","China Northern Rare Earth High-Tech","China Nuclear Engineering Corporation","China Overseas Grand Oceans Group","China Pacific Insurance","China Railway Construction","China Railway Group","China Reinsurance Group","China Resources Beer (Holdings)","China Resources Gas Group","China Resources Land","China Resources Pharmaceutical Group","China Resources Power","China Shenhua Energy","China Shipbuilding Industry","China Southern Airlines","China State Construction Engineering","China Steel","China Taiping Insurance","China Telecom","China Three Gorges Renewables (Group)","China Tourism Group Duty Free","China Tower Corp.","China Unicom","China Vanke","China Yangtze Power","China Zheshang Bank","Chipotle Mexican Grill","Chongqing Changan Auto","Chongqing Rural Bank","Chongqing Zhifei Biological Products","Chord Energy","Chow Tai Fook Jewellery","CHS","Chubb","Chubu Electric Power","Chugin Financial Group,Inc.","Chugoku Electric Power","Chunghwa Telecom","Church & Dwight","Cigna","CIMB Group Holdings","Cincinnati Financial","Cintas","Cisco Systems","CITIC","Citic Securities","Citigroup","Citizens Financial Group","City Developments","Civitas Resources","CJ Cheiljedang","CJ Corporation","CK Asset Holdings","CK Hutchison","Cleveland-Cliffs","Clorox","CLP Holdings","CME Group","CMS Energy","CNH Industrial","CNOOC","CNPC Capital","CNX Resources","Coal India","Coca-Cola","Coca-Cola Europacific Partners","Coca-Cola HBC","Cognizant","Coinbase","Coinshares International","Coles Group","Colgate-Palmolive","Coloplast","Columbia Bank","Comcast","Comerica","Commercial Bank For Investment & Development Of Vietnam","Commercial Bank of Qatar","Commercial International Bank","Commercial Metals","Commerzbank","Commonwealth Bank","Compal Electronics","Compass Group","Comstock Resources","Conagra Brands","Concordia Financial Group","ConocoPhillips","Consolidated Edison","Constellation Brands","Constellation Energy","Constellation Software","Contemporary Amperex Technology","Continental","CooperCompanies","Copart","Corebridge Financial","Cornerstone Building Brands","Corning","Corpay","Corteva","Cosan","Cosco Shipping","Cosmo Energy Holdings","CoStar Group","Costco Wholesale","Coterra Energy","Coty","Couche Tard","Country Garden Holdings","Coupang","Covestro","Covivio","CP All","CPFL Energia","CPI Property Group","Credicorp","Credit Agricole","Credit Suisse Group","Credito Emiliano","CRH","Croda International Plc","CrowdStrike","Crown Castle International","Crown Holdings","CRRC","Csc Financial","CSL","CSPC Pharmaceutical Group","CSX","CTBC Financial","CTP","Cullen\/Frost Bankers","Cummins","CVR Energy","CVS Health","D.R. Horton","Dai Nippon Printing","Dai-ichi Life Insurance","Daiichi Sankyo","Daikin Industries","Daimler Truck Holding","Daishi Hokuetsu Financial Group","Daito Trust Construction","Daiwa House Industry","Daiwa Securities","Danaher","Dangote Cement","Danone","Danske Bank","Daou Data","Daou Technology","Daqin Railway","Darden Restaurants","Darling Ingredients","Dassault Aviation","Dassault Systemes","Datadog","Datang International Power","DaVita","Dayforce","Db Insurance","DBS","DCC","Deckers Brands","Deere & Company","Delek US Holdings","Delivery Hero","Dell Technologies","Delta Air Lines","Delta Electronics","Denso","Dentsu","Deutsche Bank","Deutsche Boerse","Deutsche Lufthansa","Deutsche Pfandbriefbank","Deutsche Post","Deutsche Telekom","Devon Energy","DexCom","DGB Financial Group","Diageo","Diamondback Energy","Dick's Sporting Goods","DiDi Global","Digital China Group","Digital Realty","Dillard's","DISCO Corp.","Discover Financial","DISH Network","DNB Bank","Dollar General","Dollar Tree","Dollarama","Dominion Energy","Domino's","Dongfeng Motor Group","Dongguan Rural Commercial Bank","DoorDash","Doosan","Dover","Dow","Dr. Sulaiman Al-Habib Medical Services Group","DSM","DSV Panalpina","DTE Energy","Dubai Islamic Bank","Duke Energy","DuPont","DXC Technology","E-mart","E.ON","E.Sun Financial","East Japan Railway","East Money Information","East West Bancorp","Eastman Chemical Company","Eaton","eBay","Ecolab","Ecopetrol","EDF","Edison International","Edp-energias De Portugal","Edward Jones","Edwards Lifesciences","EFG International","Eiffage","El Puerto de Liverpool","Electric Power Development","Electronic Arts","Eletrobr\u00e1s","Elevance Health","Eli Lilly","Emaar Properties","Emera","Emerson Electric","Emirates NBD","Empire","Empresas CMPC","EMS-Chemie Holding","Enbridge","EnBW-Energie Baden","Enel","ENEOS Holdings","Energy Transfer","ENGIE","Eni","ENN Energy Holdings","ENN Natural Gas","Enphase Energy","Entergy","Enterprise Products Partners","EOG Resources","EPAM Systems","Epiroc","EQT","EQT AB","Equifax","Equinix","Equinor","Equitable Holdings","Equity Residential","Ericsson","Erste Group Bank","Essex Property Trust","EssilorLuxottica","Essity","Etisalat","Etsy","Eurobank Ergasias","Eurofins Scientific Societe Europeenne","Euronext","Eve Energy","Everest Re Group","Evergreen Marine Corp. (Taiwan)","Evergy","Eversource Energy","Evolution Gaming Group AB","Evonik Industries","Exelon","EXOR","Expedia Group","Expeditors International","Experian","Extra Space Storage","ExxonMobil","F.N.B.","F5","FactSet","Fair Isaac","Fairfax Financial","Falabella","Fannie Mae","Fanuc","Far East Horizon","Fast Retailing","Fastenal","Fastighets Balder","Faurecia","FCC","Federal Realty","FedEx","Femsa","Ferguson","Ferrari","Ferrovial","Fertiglobe","FIBI Holdings","Fibra Uno","Fidelity National Financial","Fidelity National Information (FIS)","Fifth Third Bank","Financiere de l'Odet","Finatis","FinecoBank","First Abu Dhabi Bank","First Citizens Bank (NC)","First Financial Holding","First Horizon","First Pacific","First Quantum Minerals","First Solar","FirstEnergy","FirstRand","Fiserv","Flex","Flutter Entertainment","FMC","Foot Locker","Ford Motor","Ford Otosan","Formosa Chemicals","Formosa Petrochemical","Formosa Plastics","Fortescue Metals Group","Fortinet","Fortis (Canada)","Fortive","Fortum","Foshan Haitian Flavouring and Food","Fosun International","Fox","Franco-Nevada","Franklin Templeton","Frasers Property","Freddie Mac","Freeport-McMoRan","Fresenius","Fubon Financial","Fujifilm Holdings","Fujitsu","Fukuoka Financial Group","Fuyao Glass Industry Group","GAIL India","Galaxy Entertainment","Galp Energia","Gaming And Leisure Properties","Ganfeng Lithium","Gap","Garmin","Gartner","GCL Technology Holdings","GD Power Development","GE Healthcare","GE Vernova","Geberit","Geely Automobile Holdings","Gemdale","Gen Digital","Generac","General Dynamics","General Electric","General Insurance Corporation Of India","General Mills","General Motors","Generali Group","Genmab","Genuine Parts","Genworth Financial","George Weston","Gerdau (Cosigua)","GF Securities","Gilead Sciences","Givaudan","Glencore International","Global Payments","Globalfoundries","Globe Life","GoDaddy","Goertek","Gold Fields","Golden Agri-Resources","Goldman Sachs","Goodman Group","Goodyear","Grandjoy Holdings Group","Graphic Packaging","Grasim Industries","Graybar Electric","Great Wall Motor","Gree Electric Appliances","Greenland Holdings Group","Greentown China Holdings","Group 1 Automotive","Grupa PZU","Grupo ACS","Grupo Aval","Grupo Bimbo","Grupo Bolivar","Grupo Carso","Grupo Elektra","Grupo Inbursa","Grupo Mexico","GS Holdings","GSK","Guangdong Haid Group","Guanghui Energy Co. Ltd.","Guangzhou Automobile Group","Guangzhou Baiyunshan Pharmaceutical Holdings","Guangzhou R&F","Guangzhou Rural Commercial Bank","Guangzhou Tinci Materials Technology","Gulfport Energy","Gunma Bank","Guosen Securities","Guotai Junan Securities","H&M - Hennes & Mauritz","Hachijuni Bank","Haier Smart Home","Haitong Securities","HAL Trust","Haleon","Halkbank","Halliburton","Halyk Bank","Hana Financial Group","Hancock Holding","Hangzhou Binjiang Real Estate Group Co., Ltd.","Hanwa","Hanwha","Harbin Bank","Harbour Energy","Hartford Financial Services","Hasbro","HBIS","HCA Healthcare","HCL Technologies","HD HYUNDAI","HDFC","HDFC Bank","Healthpeak Properties","Heico","HeidelbergCement","Heineken","Hellenic Petroleum","Helvetia Holding","Henderson Land","Hengli Petrochemical","Hengyi Petrochemical","Henkel","Henry Schein","Hera","Hermes International","Hertz Global Holdings","Hess","Hewlett Packard Enterprise","Hexagon","HF Sinclair","Hikvision","Hilton Worldwide","Hindalco Industries","Hirogin Holdings","Hitachi","HMM","Hokuhoku Financial Group","Holcim","Hologic","Hon Hai Precision","Honda Motor","Honeywell","Hong Kong Exchanges","Hong Leong Financial","Hopson Development Holdings","Horizon Therapeutics Public Limited Company","Hormel Foods","Hoshine Silicon Industry","Host Hotels & Resorts","Hotai Motor","Howmet Aerospace","Hoya","HP","HSBC Holdings","Hua Nan Financial","Huadian Power International","Huafa Industrial","Huaibei Mining Holdings","Huaneng Power International","Huatai Securities","Huaxia Bank","Hubbell","Hubei Biocause Pharmaceutical","HubSpot","Huishang Bank","Humana","Hunan Valin Steel","Huntington Bank","Huntington Ingalls Industries","Hyakugo Bank","Hyatt Hotels","Hydro One","Hygon Information Technology","Hyundai Engineering","Hyundai Glovis","Hyundai Marine & Fire","Hyundai Mobis","Hyundai Motor","Hyundai Steel","iA Financial Corporation","Iberdrola","IBM","ICBC","ICICI Bank","ICON (Ireland)","IDBI Bank","Idemitsu Kosan","IDEX","IDEXX Laboratories","iflytek","Iida Group Holdings","Illinois Tool Works","Illumina","Impala Platinum Holdings","Imperial Brands","Incyte","Indian Bank","Indian Oil","Indian Railway Finance","Inditex","Indorama Ventures","IndusInd Bank","Industrial Bank","Industrial Bank of Korea","Industries Qatar","Industrivarden","Infineon Technologies","Infosys","ING Group","Ingersoll Rand","Inner Mongolia Baotou Steel","Inner Mongolia Yili","Inner Mongolia Yitai Coal","Inpex","Insight Enterprises","Insulet Corp","Intact Financial","Intel","Interactive Brokers Group","Intercontinental Exchange","International Airlines","International Distributions Services","International Flavors & Fragrances","International Holding Company","International Paper","Interpublic Group","Intesa Sanpaolo","Intuit","Intuitive Surgical","Inventec","Invesco","Investec","Investor AB","Invitation Homes","Ipsen SA","IQVIA","Iron Mountain","Isbank","Israel Corp","Israel Discount Bank","Isuzu Motors","Ita\u00fa Unibanco Holding","Ita\u00fasa","ITC","Itochu","Iveco Group","Iyogin Holdings,Inc.","J Sainsbury","J.B. Hunt Transport Services","JA Solar Technology","Jabil Circuit","Jack Henry & Associates","Jackson Financial","Jacobs Solutions","Japan Airlines","Japan Exchange Group","Japan Post Holdings","Japan Securities","Japan Tobacco","Jardine Matheson","JB Financial Group","JBS","JD Sports Fashion","JD.com","JDE Peet's","Jefferies Financial","Jeronimo Martins","JetBlue Airways","JFE Holdings","Jiangsu Changshu Rural Commercial Bank","Jiangsu Eastern Shenghong","Jiangsu Hengrui Medicine","Jiangsu Yanghe Brewery","Jiangsu Zhongnan Construction Group","Jiangxi Bank","Jiangxi Copper","Jinke Property Group","Jinko Solar","Jinshang Bank","JM Smucker","Johnson & Johnson","Johnson Controls","Johnson Matthey","Joint Stock Commercial Bank for Foreign Trade of Vietnam","Jointown Pharmaceutical Group","Jones Lang LaSalle","JPMorgan Chase","JSW Group","JSW Steel","Julius Baer Group","Juniper Networks","Juroku Financial Group","Jyske Bank","K+S","Kajima","Kakao","KakaoBank","Kangmei Pharmaceutical","Kansai Electric Power","Kao","Kasikornbank","Kaspi.kz JSC","Kawasaki Heavy Industries","Kawasaki Kisen Kaisha","KB Financial Group","KBC Group","KDDI","KE Holdings","Keiyo Bank","Kellanova (Kellogg's)","Kenvue","Keppel","Kering","Kerry Group","Kesko","Keurig Dr Pepper","KeyCorp","Keyence","Keysight Technologies","KGHM Polska Miedz","KIA","Kimberly-Clark","Kimco Realty","Kinder Morgan","Kingdom Holding","Kingfisher","Kingspan Group PLC","Kintetsu","KION Group","Kirin Holdings","Kiyo Bank","KKR","KLA","Knight-swift Transportation Holdings","Knorr-Bremse","Kobe Steel","Ko\u00e7 Holding","Kohl's","Komatsu","Kone","Korea Electric Power","Korea Gas","Korea Investment Holdings","Korea Shipbuilding & Offshore Engineering","Korea Zinc","Korean Air","Kotak Mahindra Bank","KPN","Kraft Heinz","Kroger","Krung Thai Bank","KT","Kuaishou Technology","Kubota","Kuehne & Nagel International","Kuwait Finance House","Kweichow Moutai","Kyndryl Holdings","Kyocera","Kyushu Electric Power","Kyushu Financial Group","L'Oreal","L3Harris Technologies","Labcorp","Lam Research","Lamb Weston","Land O'Lakes","Larsen & Toubro","Las Vegas Sands","Latam Airlines","Lear","Legal & General Group","Legend Holding","Legrand","Leidos","Lennar","Lenovo Group","Leonardo","Levi Strauss","LG","LG Chem","LG Display","LG Electronics","LG Innotek Co.,","LG Uplus","Li Auto","Li Ning","Liberty Broadband","Liberty Global","Liberty Media Corporation Series A Liberty Formula One","Liberty Mutual Insurance Group","Life Insurance Corp. of India","Lincoln National","Linde plc","Lindt & Sprungli","Link REIT","Lithia Motors","Live Nation Entertainment","LKQ","Lloyds Banking Group","Lockheed Martin","Loews","Logan Property Holdings","London Stock Exchange","Longfor Group Holdings","Longi Green Energy Technology","Lonza Group","Lotte Chemical","Lotte Shopping","Lowe's","LPL Financial Holdings","Lufax Holding","Lululemon Athletica","Lumen Technologies","Lundbergs","Luxshare Precision Industry","Luzerner Kantonalbank","Luzhou Lao Jiao","LVMH Mo\u00ebt Hennessy Louis Vuitton","LyondellBasell Industries","M&G","M&T Bank","Macquarie Group","Macy's","Magna International","Mahindra & Mahindra","Manpower","Manulife","Mapfre","Marathon Oil","Marathon Petroleum","Marfrig Global Foods","Markel","MarketAxess","Marriott International","Marsh & McLennan","Martin Marietta Materials","Marubeni","Marvell Technology","Masco","Mashreq Bank","Masraf Al Rayan","Mastercard","Match Group","Maybank","Mazda Motor","McCormick & Company","McDonald's","McKesson","MDU Resources Group","Mebuki Financial Group","MediaTek","Mediobanca","Medipal Holdings","Medtronic","Mega Financial Holding","Meituan","MercadoLibre","Mercedes-Benz Group","Merck & Co.","Merck KGaA, Darmstadt, Germany and its affiliates","Mercuries & Associates","Meritz Financial Group","Meta Platforms","Metallurgical Corp of China","Metalurgica Gerdau","MetLife","Metro","Metro Group","Metropolitan Bank & Trust","Mettler-Toledo International","MGM Resorts","Michelin Group","Microchip Technology","Micron Technology","Microsoft","Mid-america Apartment Communities","Midea Group","Midea Real Estate Holding","Migdal Insurance","Military Commercial Joint Stock Bank","Mirae Asset Financial Group","Mitsubishi","Mitsubishi Chemical","Mitsubishi Electric","Mitsubishi Estate","Mitsubishi Heavy Industries","Mitsubishi Motors","Mitsubishi UFJ Financial","Mitsubishi UFJ Lease","Mitsui","Mitsui Chemicals","Mitsui Fudosan","Mitsui OSK Lines","Mizrahi Tefahot Bank","Mizuho Financial","Mobileye Global","Moderna","Mohawk Industries","MOL Hungarian Oil","Molina Healthcare","M\u00f8ller-Maersk","Molson Coors Brewing","Moncler SpA","Mondelez International","Mondi","Monolithic Power Systems","Monster Beverage","Moody's","Morgan Stanley","Motor Oil","Motorola Solutions","Mowi ASA","MS&AD Insurance","MSCI","MTN Group","MTR","Multiply Group","Munich Re","Murata Manufacturing","Murphy Oil","Murphy USA","Muyuan Foodstuff","NAB - National Australia Bank","Nan Ya Plastics","Nanto Bank","NARI Technology Development","NASDAQ","Naspers","National Bank of Canada","National Bank of Greece","National Bank of Kuwait","National Grid","Nationwide","Naturgy Energy Group","NatWest Group","NAURA Technology GroupLtd","Naver","Navient","NEC","Nedbank","Neste","Nestl\u00e9","NetApp","NetEase","Netflix","New China Life Insurance","New Hope Liuhe","New World Development","New York Community Bancorp","New York Life Insurance","Newcrest Mining","Newmont Mining","News Corp","Nexi S.p.A.","NEXON","Next","NextEra Energy","NIBE Industrier","Nidec","Nike","Ningbo Port","Ningxia Baofeng Energy Group","Nintendo","NIO","NIPPON EXPRESS HOLDINGS","Nippon Paint","Nippon Steel","Nippon Steel Trading","Nippon Telegraph & Tel","Nippon Yusen","Nishi-nippon Financial Holdings","NiSource","Nissan Motor","Nitori Holdings","Nitto Denko","NN Group","Nokia","Nomura","Nomura Research Institute","Nongfu Spring","Nordea Bank","Nordson","Nordstrom","Norfolk Southern Railway","Norsk Hydro","North Pacific Bank","Northern Oil and Gas","Northern Trust","Northrop Grumman","Norwegian Cruise Line Holdings","Novartis","Novo Nordisk","NRG Energy","NTPC","Nu Holdings","Nucor","Nutrien","NVIDIA","NVR","NXP Semiconductors","O'Reilly Automotive","Obayashi","Occidental Petroleum","OCI","Ogaki Kyoritsu Bank","Oil & Natural Gas","Oji Holdings","Olam Group","Old Dominion Freight Line","Old Mutual","Old National Bank","Old Republic International","Olin","Olympus","Omnicom Group","OMRON","OMV Group","ON Semiconductor","OneMain Holdings","Oneok","ONO Pharmaceutical","Ooredoo Q.P.S.C","Opendoor Technologies","Oracle","Orange","Orient Securities","Oriental Land","Origin Energy","Orix","Orsted","Osaka Gas","OSB Group","Oshkosh","Otis Worldwide","OTP Bank","Otsuka Holding","Outokumpu","Oversea-Chinese Banking","Ovintiv","Owens Corning","Paccar","Packaging Corp of America","PacWest Bancorp","Pakistan State Oil","Palo Alto Networks","Pan Pacific International Holdings","Panasonic","Par Pacific Holdings","Paramount","Parker-Hannifin","Parkland","Parsons","Partners Group Holding","Paychex","Paycom","PayPal","PBF Energy","Pdc Energy","PDD Holdings","Peabody Energy","Pegatron","Pembina Pipeline","Penn Entertainment","Penske Automotive","Pentair","PepsiCo","Performance Food Group","PerkinElmer","Pernod Ricard","Petro Rabigh","Petrobras","PetroChina","Petronas Chemicals","Pfizer","PG&E","PGE Polska Grupa Energetyczna","Philip Morris International","Philips","Phillips 66","Phoenix Group Holdings","PICC","Pilbara Minerals","Ping An Insurance Group","Pinnacle Bank","Pinnacle West","Pioneer Natural Resources","Piraeus Financial Holdings","PKN Orlen","PKO Bank Polski","Plains GP Holdings","PNC Financial Services","Polaris Inc.","Poly Developments & Holdings Group","Pool","Popular","Porsche Automobil Holding","Posco","Postal Savings Bank Of China (PSBC)","Poste Italiane","Power Assets Holdings","Power Construction Corporation of China","Power Corp of Canada","Power Finance","Power Grid of India","PPG","PPL","Prada","President Chain Store","Principal Financial Group","Procter & Gamble","Progressive","Prologis","Prosperity Bancshares","Prudential","Prudential Financial","Prysmian","PT Garuda Indonesia (Persero)","PTC","PTT","PTT Global Chemical","Public Bank","Public Power","Public Service Enterprise Group","Public Storage","Publicis Groupe","Publix Super Markets","Puget Energy","PulteGroup","Punjab National Bank","Qatar Islamic Bank","Qatar National Bank","QBE Insurance Group","Qilu Bank","Qingdao Rural Commercial Bank","Qinghai Salt Lake Industry","Qorvo","Qualcomm","Quanta Computer","Quanta Services","Quest Diagnostics","Quilter","Quinenco","Raiffeisen Bank International","Raizen","Rajesh Exports","Rakuten","Ralph Lauren","Randstad N.V.","Range Resources","Raymond James Financial","RBC","Realty Income","Reckitt Benckiser Group","Recruit Holdings","Red El\u00e9ctrica","Regal Rexnord","Regency Centers","Regeneron Pharmaceuticals","Regions Financial","Reinsurance Group of America","Reliance Industries","Reliance Steel","RELX","RenaissanceRe Holdings","Renault","Renesas Electronics","Rentokil Initial","Repsol","Republic Services","ResMed","Resona Holdings","Restaurant Brands International","Revvity","Rexel","RHB Bank","Rheinmetall","Richemont","Ricoh","Rio Tinto","RiseSun Real Estate Development","Rite Aid","Riyad Bank","Roblox","Roche Holding","Rockwell Automation","Rogers Communications","Rollins","Rolls-Royce Holdings","Rongsheng Petrochemical","Roper Technologies","Ross Stores","Royal Ahold Delhaize N.V.","Royal Caribbean Group","Royalty Pharma","RPM International","RTX (Raytheon)","RWE Group","Ryanair Holdings","Ryder System","S-Oil","S.F. Holding","S&P Global","Sabanci Holding","Safran","SAIC Motor","Saint-Gobain","Salesforce","Salzgitter","Sampo","Samsung C&T","Samsung Electro-Mechanics","Samsung Electronics","Samsung Fire & Marine","Samsung Life Insurance","Samsung SDI","Samsung SDS","San-In Godo Bank","Sandvik","Sanlam","Sanofi","Sansteel Minguang","Santander","Santos","Sany Heavy Industry","SAP","Saputo","Saras","Sartorius","Sasa Polyester Sanayi","Sasol","Saudi Arabian Mining","Saudi Arabian Oil Company (Saudi Aramco)","Saudi British Bank","Saudi Electricity","Saudi Telecom","SBA Communications","SBI Holdings","Sbi Sumishin Net Bank","SCB X Public Company","Scentre Group","Schaeffler","Schindler Holding","Schlumberger","Schneider Electric","Schroders","Schweizerische Nationalbank","Science Applications International","Scor","SDIC Capital","SDIC Power Holdings","Seadrill","Seagate Technology","Seagen","Seazen Group","SEB AB","Secom","Segro","Sekisui House","Semiconductor Manufacturing International","Sempra Energy","Senshu Ikeda Holdings","ServiceNow","Seven & I Holdings","SG Holdings","SGS","Shaanxi Coal Industry","Shaanxi Construction Engineering Group","Shanghai Commercial & Savings Bank","Shanghai Construction","Shanghai Electric Group","Shanghai International Port","Shanghai Pharmaceuticals","Shanghai Pudong Development","Shanghai Rural Commercial Bank","Shanghai Tunnel Engineering Co. Ltd.","Shanghai Yuyuan Tourist Mart","Shanxi Coal International Energy Group","Shanxi Lu'an Environmental","Shanxi Xinghuacun Fen Wine Factory","Shanxi Xishan Coal & Electricity Power Co. Ltd.","Sharp","Shell","Shengjing Bank","Shenwan Hongyuan Group","Shenzhen Inovance Technology","Shenzhen Mindray Bio-Medical Electronics","Shenzhen Overseas","Shenzhou International Group Holdings","Sherwin-Williams","Shiga Bank","Shimano","Shimizu","Shin Kong Financial","Shin-Etsu Chemical","Shinhan Financial Group","Shinsei Bank","Shionogi","Shiseido","Shizuoka Financial Group","Shopify","Shriram Transport Finance Co.","Siam Cement","Siam Makro","Sibanye Stillwater","Sichuan Road & Bridge","Siemens","Siemens Energy","Sika","Simon Property Group","Singapore Airlines","SingTel","Sino-Ocean Group Holding","SinoPac Financial","Sinopec","Sinopharm Group","Sinotrans Ltd.","SITC International Holdings","SK","SK Hynix","SK Innovation","SK Telecom","Skanska","Skyworks Solutions","SM Investments","SMC","Smurfit Westrock PLC","Snam","Snap-on","Snowflake","Soci\u00e9t\u00e9 G\u00e9n\u00e9rale","Sodexo","Softbank","Sojitz","Solvay","Solventum","Sompo","Sonic Healthcare","Sonova Holding","Sony","South State","South32","Southern Company","Southwest Airlines","Southwest Gas Holdings","Southwestern Energy","Spotify Technology","SQM","SS&C Technologies","SSE","St. Galler Kantonalbank","St. James's Place","St. Mary Land & Exploration Co.","Standard Bank Group","Standard Chartered","Stanley Black & Decker","Starbucks","Starwood Property Trust","State Bank of India","State Farm Insurance","State Street","Steel Authority of India","Steel Dynamics","Stellantis","Steris","Stifel Financial","STMicroelectronics","StoneX Group","Stora Enso","Storebrand","STRABAG","Straumann Holding","Stryker","Subaru","Sumec Corporation","Sumitomo","Sumitomo Chemical","Sumitomo Electric","Sumitomo Forestry Co.,","Sumitomo Metal Mining","Sumitomo Mitsui Financial","Sumitomo Mitsui Trust","Sumitomo Realty","Sun Communities","Sun Hung Kai Properties","Sun Life Financial","Sun Pharma Industries","Suncor Energy","Suncorp Group","Sungrow Power Supply","Suning.com","Sunshine Insurance Group","Suntory Beverage & Food","Supermicro","Suzano","Suzuken","Suzuki Motor","Svenska Handelsbanken","Swatch Group","Swedbank","Swire Pacific","Swiss Life Holding","Swiss Re","Swisscom","Synchrony Financial","Synnex Technology Intl","Synopsys","Synovus","Sysco","T Rowe Price","T-Mobile US","T&D Holdings","Taisei","Taishin Financial Holdings","Taiwan Business Bank","Taiwan Cooperative Financial","Taiwan Semiconductor","Take-Two Interactive","Takeda Pharmaceutical","Talanx","Tapestry","TAQA","Targa Resources","Target","Tata Consultancy Services","Tata Motors","Tata Steel","Taylor Morrison Home","TBEA","TC Energy","TCL","TCL Zhonghuan Renewable Energy Technology","TD Bank Group","TD SYNNEX","TDK","TE Connectivity","Tech Mahindra","Techtronic Industries","Teck Resources","Telecom Italia","Teledyne Technologies","Teleflex","Telef\u00f3nica","Telenor","Teleperformance","Telia","Telkom Indonesia","Telstra","TELUS","Tenaga Nasional","Tenaris","Tencent Holdings","Tenet Healthcare","Teradyne","Terex","Terna","Ternium","Terumo","Tesco","Tesla","Teva Pharmaceutical","Texas Instruments","Textron","TFI International","Thai Beverage","Thai Oil","Thales","The Estee Lauder Companies","The Hershey Company","The Home Depot","The Mosaic Company","The Saudi National Bank","Thermo Fisher Scientific","Thomson Reuters","Thor Industries","Thrivent Financial for Lutherans","ThyssenKrupp Group","TIAA","Tianqi Lithium","Tingyi Holding","Titan (India)","TJX Companies","TMB Bank","Toho Bank","Tohoku Electric Power","Tokio Marine Holdings","Tokyo Century","Tokyo Electric Power","Tokyo Electron","Tokyo Gas","Tokyo Kiraboshi Financial Group","Toll Brothers","Tongling Nonferrous Metals","Tongwei","Top Frontier Investment Holdings","Toppan Printing","Toray Industries","Toshiba","TotalEnergies","Tourmaline Oil","Towngas","Toyota Industries","Toyota Motor","Toyota Tsusho","Tractor Supply","Trade Desk","Trane Technologies","TransDigm Group","Transurban Group","Travelers Companies","Trimble","Trina Solar","Trip.com Group","Truist Financial","Tsingtao Brewery","TUI","Turkish Airlines","Tyler Technologies","Tyson Foods","U-Haul Holding","Uber","UBS","UCB","UDR","Ulta Beauty","Ultrapar Participacoes","Umicore","Uni-President","Unibail-Rodamco-Westfield","Unicaja Banco","Unicharm","UniCredit","Unilever","Union Bank of India","Union Pacific","Unipol Gruppo","Uniqa","Unisplendour","United Airlines Holdings","United Microelectronics","United Natural Foods","United Overseas Bank","United Parcel Service","United Rentals","United Therapeutics","United Utilities","UnitedHealth Group","Univar","Universal Health Services","Universal Music Group","Unum","UPM-Kymmene","US Bancorp","US Foods","US Steel","USAA","VakifBank","Vale","Valeo","Valero Energy","Valley National Bancorp","Var Energi ASA","Vedanta Limited","Veeva Systems","Ventas","Veolia Environnement","Veralto","Verbund","VeriSign","Verisk Analytics","Verizon Communications","Vertex Pharmaceuticals","Vertiv Holdings","Vestas Wind Systems","VF","Viatris","Vibra Energia","VICI Properties","Vienna Insurance Group","Vietin Bank","Vietnam Technological & Commercial Joint Stock Bank","VINCI","Vipshop Holdings","Virgin Money UK","Visa","Vistra Energy","Viva Energy Group","Vivendi","VMware","Vodafone","Voestalpine","Volkswagen Group","Volvo Car","Volvo Group","Vonovia","Voya Financial","Vulcan Materials","W. R. Berkley","W.P. Carey","W.W. Grainger","Wabtec","Wacker Chemie","Walgreens Boots Alliance","Walmart","Walt Disney","Wan Hai Lines","Wanhua Chemical Group","Warner Bros. Discovery","Waste Connections","Waste Management","Waters","Watsco","Webster Financial","WEC Energy Group","WEG","Weichai Power","Weihai City Commercial Bank","Wells Fargo","Welltower","Wens Foodstuff Group","WESCO International","Wesfarmers","West Fraser Timber Co.","West Japan Railway","West Pharmaceutical Services","Western Alliance Bancorp.","Western Digital","Westinghouse Air Brake Technologies","Westlake Chemical","Westpac Banking Group","Weyerhaeuser","WH Group","Wharf Real Estate Investment","Wheaton Precious Metals","Whirlpool","Whitehaven Coal","Williams Companies","Williams-Sonoma","Willis Towers Watson","Wilmar International","Wintrust Financial","Wipro","Wistron","Wolters Kluwer","Woodside Energy Group","Woolworths","Woori Financial Group","Workday","World Fuel Services","World Kinect","Worldline","WPG Holdings","WPP","WSP","WT Microelectronics","Wuchan Zhongda Group","Wuestenrot & Wuerttembergische","Wuliangye Yibin","Wuxi Apptec","WuXi Biologics","Wynn Resorts","Xcel Energy","XCMG Construction Machinery","Xiamen Bank","Xiamen C&D","Xiamen International Trade Group","Xiamen Xiangyu","Xiaomi","Xinjiang Daqo New Energy","Xinte Energy","XP","Xylem","Yamaguchi Financial","Yamaha Motor","Yang Ming Marine Transport","Yango Group","Yankuang Energy Group","Yara International","Yes Bank","YPF","YTO Express Group","Yuanta Financial Holding","Yuexiu Property","Yum China Holdings","Yum! Brands","Yunnan Baiyao Group","Yunnan Copper Co. Ltd.","Yunnan Yuntianhua","Zalando","Zall Smart Commerce Group","Zebra Technologies","Zenith Bank","Zhangzhou Pientzehuang Pharmaceutical","Zhejiang Chint Electrics","Zhejiang Construction Investment Group","Zhejiang Expressway Co. Ltd.","Zhejiang Huayou Cobalt","Zhejiang Zheneng Electric Power","Zheshang Development Group","Zhongsheng Group Holdings","Zhongyuan Bank","Zijin Mining Group","ZIM Integrated Shipping Services","Zimmer Biomet","Zions Bancorp","Zoetis","ZTE","ZTO Express (Cayman)","Zurich Insurance Group"];
        
        var uniqueAnswers1 = [{"id":9960,"question_id":824,"value":"Miami","created_at":"2024-08-11T21:47:51.000000Z","updated_at":"2024-08-13T00:55:04.000000Z","percentage":"0.4","votes":"1.00"},{"id":9958,"question_id":824,"value":"Jersey City","created_at":"2024-08-11T21:47:51.000000Z","updated_at":"2024-08-13T00:55:04.000000Z","percentage":"1.3","votes":"3.00"},{"id":9956,"question_id":824,"value":"Boston","created_at":"2024-08-11T21:47:51.000000Z","updated_at":"2024-08-13T00:55:04.000000Z","percentage":"2.5","votes":"6.00"},{"id":9959,"question_id":824,"value":"Lenexa","created_at":"2024-08-11T21:47:51.000000Z","updated_at":"2024-08-13T00:55:04.000000Z","percentage":"2.5","votes":"6.00"},{"id":9962,"question_id":824,"value":"Philadelphia","created_at":"2024-08-11T21:47:51.000000Z","updated_at":"2024-08-13T00:55:04.000000Z","percentage":"15.3","votes":"36.00"},{"id":9957,"question_id":824,"value":"Chicago","created_at":"2024-08-11T21:47:51.000000Z","updated_at":"2024-08-13T00:55:04.000000Z","percentage":"30.9","votes":"73.00"},{"id":9961,"question_id":824,"value":"New York","created_at":"2024-08-11T21:47:51.000000Z","updated_at":"2024-08-13T00:55:04.000000Z","percentage":"47.0","votes":"111.00"}];
        var uniqueAnswers2 = [{"id":9965,"question_id":825,"value":"Michael Corbat","created_at":"2024-08-11T21:48:06.000000Z","updated_at":"2024-08-12T23:35:21.000000Z","percentage":"7.5","votes":"15.00"},{"id":9963,"question_id":825,"value":"Charles Prince","created_at":"2024-08-11T21:48:06.000000Z","updated_at":"2024-08-13T00:23:49.000000Z","percentage":"8.5","votes":"17.00"},{"id":9967,"question_id":825,"value":"Vikram Pandit","created_at":"2024-08-11T21:48:06.000000Z","updated_at":"2024-08-13T00:23:49.000000Z","percentage":"12.0","votes":"24.00"},{"id":9966,"question_id":825,"value":"Sandy Weill","created_at":"2024-08-11T21:48:06.000000Z","updated_at":"2024-08-13T00:23:49.000000Z","percentage":"31.5","votes":"63.00"},{"id":9964,"question_id":825,"value":"Jane Fraser","created_at":"2024-08-11T21:48:06.000000Z","updated_at":"2024-08-13T00:23:49.000000Z","percentage":"40.5","votes":"81.00"}];
        var rankedAnswers3 = [{"id":5502,"question_id":826,"rank":100,"value":"New York Life Insurance","created_at":"2024-08-11T21:48:30.000000Z","updated_at":"2024-08-11T21:48:30.000000Z"},{"id":5503,"question_id":826,"rank":90,"value":"Northwestern Mutual","created_at":"2024-08-11T21:48:30.000000Z","updated_at":"2024-08-11T21:48:30.000000Z"},{"id":5499,"question_id":826,"rank":80,"value":"MetLife","created_at":"2024-08-11T21:48:30.000000Z","updated_at":"2024-08-11T21:48:30.000000Z"},{"id":5505,"question_id":826,"rank":70,"value":"Prudential","created_at":"2024-08-11T21:48:30.000000Z","updated_at":"2024-08-11T21:48:30.000000Z"},{"id":5498,"question_id":826,"rank":60,"value":"Massachusetts Mutual Life Insurance (MassMutual)","created_at":"2024-08-11T21:48:30.000000Z","updated_at":"2024-08-11T21:48:30.000000Z"},{"id":5497,"question_id":826,"rank":50,"value":"Lincoln National","created_at":"2024-08-11T21:48:30.000000Z","updated_at":"2024-08-11T21:48:30.000000Z"},{"id":5501,"question_id":826,"rank":40,"value":"Nationwide","created_at":"2024-08-11T21:48:30.000000Z","updated_at":"2024-08-11T21:48:30.000000Z"},{"id":5506,"question_id":826,"rank":30,"value":"State Farm Insurance","created_at":"2024-08-11T21:48:30.000000Z","updated_at":"2024-08-11T21:48:30.000000Z"},{"id":5493,"question_id":826,"rank":20,"value":"Aegon","created_at":"2024-08-11T21:48:30.000000Z","updated_at":"2024-08-11T21:48:30.000000Z"},{"id":5494,"question_id":826,"rank":10,"value":"American International Group (AIG)","created_at":"2024-08-11T21:48:30.000000Z","updated_at":"2024-08-11T21:48:30.000000Z"},{"id":5495,"question_id":826,"rank":10,"value":"Guardian Life","created_at":"2024-08-11T21:48:30.000000Z","updated_at":"2024-08-11T21:48:30.000000Z"},{"id":5496,"question_id":826,"rank":10,"value":"John Hancock Group","created_at":"2024-08-11T21:48:30.000000Z","updated_at":"2024-08-11T21:48:30.000000Z"},{"id":5500,"question_id":826,"rank":10,"value":"Minnesota Mutual Life Insurance","created_at":"2024-08-11T21:48:30.000000Z","updated_at":"2024-08-11T21:48:30.000000Z"},{"id":5504,"question_id":826,"rank":10,"value":"Pac Life Group","created_at":"2024-08-11T21:48:30.000000Z","updated_at":"2024-08-11T21:48:30.000000Z"}];
        var rankedAnswers4 = [{"id":5509,"question_id":827,"rank":100,"value":"CrowdStrike","created_at":"2024-08-11T21:49:11.000000Z","updated_at":"2024-08-11T21:49:11.000000Z"},{"id":5516,"question_id":827,"rank":90,"value":"Moderna","created_at":"2024-08-11T21:49:11.000000Z","updated_at":"2024-08-11T21:49:11.000000Z"},{"id":5522,"question_id":827,"rank":80,"value":"Uber","created_at":"2024-08-11T21:49:11.000000Z","updated_at":"2024-08-11T21:49:11.000000Z"},{"id":5507,"question_id":827,"rank":70,"value":"AirBnB","created_at":"2024-08-11T21:49:11.000000Z","updated_at":"2024-08-11T21:49:11.000000Z"},{"id":5510,"question_id":827,"rank":60,"value":"Diamondback Energy","created_at":"2024-08-11T21:49:11.000000Z","updated_at":"2024-08-11T21:49:11.000000Z"},{"id":5512,"question_id":827,"rank":50,"value":"Enphase Energy","created_at":"2024-08-11T21:49:11.000000Z","updated_at":"2024-08-11T21:49:11.000000Z"},{"id":5513,"question_id":827,"rank":40,"value":"Etsy","created_at":"2024-08-11T21:49:11.000000Z","updated_at":"2024-08-11T21:49:11.000000Z"},{"id":5514,"question_id":827,"rank":40,"value":"Invitation Homes","created_at":"2024-08-11T21:49:11.000000Z","updated_at":"2024-08-11T21:49:11.000000Z"},{"id":5517,"question_id":827,"rank":40,"value":"Palo Alto Networks","created_at":"2024-08-11T21:49:11.000000Z","updated_at":"2024-08-11T21:49:11.000000Z"},{"id":5520,"question_id":827,"rank":40,"value":"Targa Resources","created_at":"2024-08-11T21:49:11.000000Z","updated_at":"2024-08-11T21:49:11.000000Z"},{"id":5508,"question_id":827,"rank":30,"value":"Arista Networks","created_at":"2024-08-11T21:49:11.000000Z","updated_at":"2024-08-11T21:49:11.000000Z"},{"id":5511,"question_id":827,"rank":30,"value":"Digital Realty","created_at":"2024-08-11T21:49:11.000000Z","updated_at":"2024-08-11T21:49:11.000000Z"},{"id":5515,"question_id":827,"rank":30,"value":"Meta Platforms","created_at":"2024-08-11T21:49:11.000000Z","updated_at":"2024-08-11T21:49:11.000000Z"},{"id":5518,"question_id":827,"rank":20,"value":"ServiceNow","created_at":"2024-08-11T21:49:11.000000Z","updated_at":"2024-08-11T21:49:11.000000Z"},{"id":5521,"question_id":827,"rank":20,"value":"Tesla","created_at":"2024-08-11T21:49:11.000000Z","updated_at":"2024-08-11T21:49:11.000000Z"},{"id":5519,"question_id":827,"rank":10,"value":"Skyworks Solutions","created_at":"2024-08-11T21:49:11.000000Z","updated_at":"2024-08-11T21:49:11.000000Z"},{"id":5523,"question_id":827,"rank":10,"value":"Wynn Resorts","created_at":"2024-08-11T21:49:11.000000Z","updated_at":"2024-08-11T21:49:11.000000Z"}];

        var percentileInital = "0"

        // If already played
        // var gameAlreadyPlayed = null;

        var activePlayerInput;
        var score1 = 0, score2 = 0, score3 = 0, score4 = 0;

        var playerFinalScore = 0;
        // The number of already answered questions
        var answerCount = 0;

        // Use a regular expression to find & characters that are not part of an HTML entity
        document.addEventListener('DOMContentLoaded', () => {

          /* MANAGE LEADERBOARD GROUP SELECTION */

          // affichage initial avec sa categorie actuelle
          changeScoreGroupLeaderboard(currentGameId, localStorage.getItem('personalLeaderboardGroup'));
            
          /* If the player changes the selection leaderboard group */
          playerGroupSelect.addEventListener('change', function() {
            const selectedGroup = this.value;
            localStorage.setItem('personalLeaderboardGroup', selectedGroup);     

            changeScoreGroupLeaderboard(currentGameId, localStorage.getItem('personalLeaderboardGroup'));

            if (playerGroupSelect.value === "Group Leaderboard" || this.value === "No Group") 
            {
              rbGroupLeaderboard.style.display = 'none';
            }
            else rbGroupLeaderboard.style.display = 'flex';

          });

            /* Mettre a jour le leaderboard de streak pour verifier si le joueur a deja un  */
            if(localStorage.getItem('personalInitial') == "???" || localStorage.getItem('personalInitial') == null)
            {}
            else
            {
              //alert(localStorage.getItem('personalInitial'));
              addStreakToLeaderboard(currentGameId); 
            }

            // Check if user has already played, if yes show results without the close button

            // if visitor already played and finished/submitted his game 
            // Dans cookie se trouve l'id du game_played
            if(getCookie('Game_'+currentGameId) !== null)
            {
              // Dans cookie se trouve l'id du game_played
              getGameAlreadyPlayedInformations(getCookie('Game_' + currentGameId), currentGameId)
              .then((gameAlreadyPlayedJSON) => 
              {
                let gameAlreadyPlayed = gameAlreadyPlayedJSON.gameAlreadyPlayed;
                let percentile = gameAlreadyPlayedJSON.percentile;

                // Auto populate scores in the results page
                document.getElementById('go-points').innerHTML = '' + Math.round(gameAlreadyPlayed.total_score);
                document.getElementById('go-percentile').innerHTML = '(' + percentile + '%)';

                // Auto populate scores in the share text
                playerFinalScore = Math.round(gameAlreadyPlayed.total_score);
                score1 = Math.round(gameAlreadyPlayed.score_1);
                score2 = Math.round(gameAlreadyPlayed.score_2);
                score3 = Math.round(gameAlreadyPlayed.score_3);
                score4 = Math.round(gameAlreadyPlayed.score_4);

                // Auto populate score boxes
                let iLoop = 1;
                var pointsBoxes = document.getElementsByClassName("points");
                Array.from(pointsBoxes).forEach(element => {
                  // Carre points
                  element.classList.add("points-set");
                  
                  // Recuperer l'input a coté du carré de points et Populate
                  let inputNear = element.previousElementSibling;
                  inputNear.value = localStorage.getItem('Answer_'+iLoop+'_Game_'+currentGameId);
                  inputNear.readOnly = true;
                  inputNear.classList.add("answer-submitted");
                  inputNear.removeAttribute('onclick');

                  switch (element.id) 
                  {
                    case 'us-pts1': 
                      element.classList.add('points-' + Math.round(score1 / 5) * 5);
                      element.innerHTML = '' + score1;
                      break;
                    case 'us-pts2': 
                      element.classList.add('points-' + Math.round(score2 / 5) * 5);
                      element.innerHTML = '' + score2;
                      break;
                    case 'us-pts3': 
                      element.classList.add('points-' + Math.round(score3 / 5) * 5);
                      element.innerHTML = '' + score3;
                      break;
                    case 'us-pts4': 
                      element.classList.add('points-' + Math.round(score4 / 5) * 5);
                      element.innerHTML = '' + score4;
                      break;
                  }

                  iLoop++;
                });
 
                // Display answers because he already played
                var bestAnswers = document.getElementsByClassName('go-bestanswers');
                document.getElementById('gameOverModal').classList.add('show-answers');

                Array.from(bestAnswers).forEach(element => {
                    element.style.display = 'flex';
                });

                // Show results page 
                openModalById("gameOverModal");
              })
              .catch((error) => {
                console.error("Resolve promise getGameAlreadyPlayedInformations" + error);
              });  
            }
            // if visitor hasn't finished/submitted the game yet
            else
            {
              // alert('Not played yet');
              document.getElementById('go-percentile').innerHTML = '(0%)';
              autoPopulateAlreadyAnswered();
              
              // Compter les points deja autopopulé
              answerCount = document.querySelectorAll('.points-set').length;
            }

            /* Show rules once */
            if(localStorage.getItem('showRules') !== 'true') 
            { 
              openModalById('rulesModal')
              localStorage.setItem('showRules', 'true');
            }

            // Select all elements with the class 'question'
            const questionElements = document.querySelectorAll('.question');

            questionElements.forEach(element => {
                // Get the HTML content of the element
                let content = element.innerHTML;

                /* Check if the content contains the character '&'
                if (content.includes('&')) {
                    // Use a regular expression to find & characters that are not part of an HTML entity
                    element.innerHTML = element.innerHTML.replace(/&amp;/g, '<span style="font-family:arial;">&amp;</span>');
                }
                */
            });
        });

        // Remove inputs value
        for (let index = 1; index <= 4; index++) {
          const inputElement = document.getElementById('us-ipt'+index);
          inputElement.value = '';
        }

        function setActivePlayerInput(idinput) 
        { 
          activePlayerInput = idinput; 
        }

        function updateCurrentSearchQuestion(event) {
          // Get the input element that was clicked
          var inputElement = event.target;

          // Find the closest question-block
          var questionBlock = inputElement.closest('.question-block');

          // Get the h2 element within the closest question-block
          var questionElement = questionBlock.querySelector('.question');
          var questionData = questionElement.getAttribute('data');

          // Update the content of the <span> element
          var searchQuestionElement = document.getElementById('current-search-question');
          searchQuestionElement.textContent = '' + questionData;
        }

        // Save quelles suggestions utilisons nous mtn
        var currentSuggestions;

        function displaySuggestions(suggestions) 
        {          
          currentSuggestions = suggestions;
          var suggestionsContainer = document.getElementById('suggestions');
          var searchInput = document.getElementById('us-search');
          suggestionsContainer.innerHTML = '';
          searchInput.value = '';
        
          // auto focus on input
          searchInput.focus();
          searchInput.select();
        }

        var suggestionsContainer = document.getElementById('suggestions');
        var suggestions = suggestionsContainer.getElementsByClassName('single-suggestion');
        
        /* Fonction de recherche et filtre */
        function filterSuggestions(searchTerm) {

          suggestionsContainer.innerHTML = '';
          if(searchTerm != '') 
          {
            currentSuggestions.forEach(text => {
              if (text.toLowerCase().indexOf(searchTerm.toLowerCase()) !== -1) {
                // Créer l'élément de suggestion et l'ajouter au conteneur
                var span = document.createElement('span');
                span.className = 'single-suggestion';
                span.innerHTML = '<p>' + text + '</p><button onclick=selectSuggestion(event) data-value="'+ text +'" data-inputTargetId="'+ activePlayerInput +'" class="selectButton">Select</button>';
                suggestionsContainer.appendChild(span);
              }
            });
          }
        }

        /* Select answer , show points and disable input onclick*/
        function selectSuggestion(event) 
        {
          var questions = [{"id":824,"game_id":87,"number":1,"value":"Name a US city with a stock exchange","type":"unique","sheet_url":"https:\/\/docs.google.com\/spreadsheets\/d\/11q43m6l6LUXSH3UZ012E5r7iKfqYAsbPFOfWbDH5kxg\/edit?gid=1049496156#gid=1049496156","created_at":"2024-08-11T21:47:35.000000Z","updated_at":"2024-08-11T21:47:35.000000Z"},{"id":825,"game_id":87,"number":2,"value":"Citigroup was formed in 1998, name any CEO in its history since then","type":"unique","sheet_url":"https:\/\/docs.google.com\/spreadsheets\/d\/11q43m6l6LUXSH3UZ012E5r7iKfqYAsbPFOfWbDH5kxg\/edit?gid=135468841#gid=135468841","created_at":"2024-08-11T21:47:35.000000Z","updated_at":"2024-08-11T21:47:35.000000Z"},{"id":826,"game_id":87,"number":3,"value":"What is the largest life insurance company by premiums written?","type":"ranked","sheet_url":"https:\/\/docs.google.com\/spreadsheets\/d\/11q43m6l6LUXSH3UZ012E5r7iKfqYAsbPFOfWbDH5kxg\/edit?gid=0#gid=0","created_at":"2024-08-11T21:47:35.000000Z","updated_at":"2024-08-11T21:47:35.000000Z"},{"id":827,"game_id":87,"number":4,"value":"What is the most recently founded company in the S&P 500?","type":"ranked","sheet_url":"https:\/\/docs.google.com\/spreadsheets\/d\/11q43m6l6LUXSH3UZ012E5r7iKfqYAsbPFOfWbDH5kxg\/edit?gid=88011032#gid=88011032","created_at":"2024-08-11T21:47:35.000000Z","updated_at":"2024-08-11T21:47:35.000000Z"}];

          var inputTargetId = event.target.getAttribute('data-inputTargetId');
          var inputTarget = document.getElementById(inputTargetId);

          let valueSelected = event.target.getAttribute('data-value');

          inputTarget.value = valueSelected;
          inputTarget.readOnly = true;
          inputTarget.classList.add("answer-submitted");
          
          // Calculate points and display  
          let playerPoints;
          let idEnding = inputTargetId.charAt(inputTargetId.length - 1);
          let pointContainer = document.getElementById('us-pts'+idEnding);
          
          // Store in local storage so we can re-use it to show his answer
          let localStorageKey = 'Answer_' + idEnding + '_Game_' + currentGameId;
          localStorage.setItem(localStorageKey, valueSelected);

          switch (idEnding) 
          {
            case '1': 
              playerPoints = calculateUniquePoints(uniqueAnswers1, valueSelected, questions[0].id);
              score1 = playerPoints;
              localStorage.setItem('Points_1_Game_' + currentGameId, playerPoints);
              break;
            case '2': 
              playerPoints = calculateUniquePoints(uniqueAnswers2, valueSelected, questions[1].id);
              score2 = playerPoints;
              localStorage.setItem('Points_2_Game_' + currentGameId, playerPoints);
              break;
            case '3': 
              playerPoints = calculateRankedPoints(rankedAnswers3, valueSelected, questions[2].id);
              score3 = playerPoints;
              localStorage.setItem('Points_3_Game_' + currentGameId, playerPoints);
              break;
            case '4': 
              playerPoints = calculateRankedPoints(rankedAnswers4, valueSelected, questions[3].id);
              score4 = playerPoints;
              localStorage.setItem('Points_4_Game_' + currentGameId, playerPoints);
              break;
          }

          let roundedPoints = Math.round(playerPoints / 5) * 5;
          pointContainer.innerHTML = '' + playerPoints;
          pointContainer.classList.add('points-set');
          pointContainer.classList.add('points-' + roundedPoints);

          // disable onclick
          inputTarget.removeAttribute('onclick');

          // Hide modal
          document.getElementById('searchModal').style.display = 'none';
          document.getElementById('modalBackground').style.display = 'none';

          // Score
          playerFinalScore = playerFinalScore + playerPoints;
          answerCount++;

          if(answerCount >= 4) gameOver();
        }
        
        /* Results */
        function gameOver()
        {
          // Ecrire le score final du joueur sur la fenetre des statistiques
          playerFinalScore = parseInt(score1) + parseInt(score2) + parseInt(score3) + parseInt(score4);
          document.getElementById('go-points').innerHTML = ''+playerFinalScore;

          localStorage.setItem('Game_'+currentGameId, playerFinalScore, 7);

          // Insert game 
          storeGameSession(currentGameId, score1, score2, score3, score4, playerFinalScore)
          .then(() => {
            // Get updated statistics including the new game
            return getStatistics(currentGameId, playerFinalScore);
          })
          .then(statisticsUpdated => {
            //console.log("Stats update =");
            //console.log(statisticsUpdated);
            //alert(statisticsUpdated.Percentile);
            document.getElementById('TopScore').innerHTML = '' + statisticsUpdated.TopScore;
            document.getElementById('AverageScore').innerHTML = '' + statisticsUpdated.AverageScore;
            document.getElementById('GamesPlayed').innerHTML = '' + statisticsUpdated.GamesPlayed;
            document.getElementById('go-percentile').innerHTML = '(' + statisticsUpdated.Percentile + '%)';

            // Results screen
            document.getElementById('TopScoreResults').innerHTML = '' + statisticsUpdated.TopScore;
            document.getElementById('AverageScoreResults').innerHTML = '' + statisticsUpdated.AverageScore;

            // Display answers
            var bestAnswers = document.getElementsByClassName('go-bestanswers');
            document.getElementById('gameOverModal').classList.add('show-answers');

            Array.from(bestAnswers).forEach(element => {
                element.style.display = 'flex';
            });

            // START - Calculate and show the new statistics () 
            //console.log(Math.round(((personalAverage*personalGameCount) + playerFinalScore)/(parseInt(personalGameCount)+1)));
            localStorage.setItem('personalAverage', Math.round(((personalAverage*personalGameCount) + playerFinalScore)/(parseInt(personalGameCount)+1)));  

            // increase personal Games Played Count and Update ID last game
            if(trackedGameCount < parseInt(personalGameCount) + 1) {}
            else localStorage.setItem('personalGameCount', parseInt(personalGameCount) + 1);
            localStorage.setItem('lastPlayedGameID', currentGameId);

            // verify if it's a streak
            if(previousGameID == lastPlayedGameID) 
            {
              if(trackedGameCount < parseInt(personalStreak) + 1) {}
              else localStorage.setItem('personalStreak', parseInt(personalStreak) + 1);
            }
            else
            {
              // no streak
              localStorage.setItem('personalStreak', 1);
            }

            // LEADERBOARD Feature

            // Verify if the player made it to the daily score top 10
            // He made it
            // old code ----- if(leaderboard1LastPlace <= playerFinalScore && playerFinalScore > 0)
            // old code ----- {
            
            // Player never submitted his initials, ask him and then add his score
            if(localStorage.getItem('personalInitial') == null || localStorage.getItem('personalInitial') == "???")
            {
              openModalById('initialModal');
              var initialInput = document.getElementById('playerInitial');
              initialInput.focus();

              // function already called - addScoreToLeaderboard(currentGameId, playerFinalScore);
            }
            // Player already have initials
            else
            {
              addScoreToLeaderboard(currentGameId, playerFinalScore);
            }
            

            /* Si le joueur a deja des initials, enregistrer ses Streaks */
            if(localStorage.getItem('personalInitial') == "???" || localStorage.getItem('personalInitial') == null)
            {}
            else
            {
              // Ajouter ou mettre a jour e nombre de streak de l'user
              //alert(localStorage.getItem('personalInitial'))
              addStreakToLeaderboard(currentGameId); 
            }

            refreshHtmlInLocalStorage();

            // Open the game over modal
            openModalById('gameOverModal', false);
          })
          .catch(error => {
            console.error("Une erreur s'est produite lors de la récupération des statistiques :", error);
          });
        }


        function autoPopulateAlreadyAnswered()
        {
          // Auto populate score boxes
          let iLoop = 1;
          var pointsBoxes = document.getElementsByClassName("points");
          Array.from(pointsBoxes).forEach(element => {

            // Parcourir s'il y a des reponses enregistrés dans le localstorage
            if(localStorage.getItem('Answer_'+iLoop+'_Game_'+currentGameId) != null)
            {
              // Deja repondu a la question
              element.classList.add("points-set");

              let inputNear = element.previousElementSibling;
              inputNear.value = ""+localStorage.getItem('Answer_'+iLoop+'_Game_'+currentGameId);
              inputNear.readOnly = true;
              inputNear.classList.add("answer-submitted");
              inputNear.removeAttribute('onclick');

              // Actualiser les valeurs de chaque variable score
              switch (element.id) 
              {
                case 'us-pts1': 
                  score1 = localStorage.getItem('Points_1_Game_'+currentGameId);
                  element.classList.add('points-' + Math.round(score1 / 5) * 5);
                  element.innerHTML = '' + score1;
                  break;
                case 'us-pts2': 
                  score2 = localStorage.getItem('Points_2_Game_'+currentGameId);
                  element.classList.add('points-' + Math.round(score2 / 5) * 5);
                  element.innerHTML = '' + score2;
                  break;
                case 'us-pts3': 
                  score3 = localStorage.getItem('Points_3_Game_'+currentGameId);
                  element.classList.add('points-' + Math.round(score3 / 5) * 5);
                  element.innerHTML = '' + score3;
                  break;
                case 'us-pts4': 
                  score4 = localStorage.getItem('Points_4_Game_'+currentGameId);
                  element.classList.add('points-' + Math.round(score4 / 5) * 5);
                  element.innerHTML = '' + score4;
                  break;
              }
            }
            else
            {
            }

            iLoop++;
          });
        }

        function refreshHtmlInLocalStorage()
        {
          var personalGameCount = parseInt(localStorage.getItem('personalGameCount') ?? 0);
          var personalAverage = parseInt(localStorage.getItem('personalAverage') ?? 0);
          var personalStreak = parseInt(localStorage.getItem('personalStreak') ?? 0);
          
          personalAverageHtml.innerHTML = personalAverage;
          personalStreakHtml.innerHTML = personalStreak + (personalStreak > 1 ? ' days' : ' day');
          personalGameCountHtml.innerHTML = personalGameCount;
        }

        function verifyStreak()
        {
          if(previousGameID != lastPlayedGameID && currentGameId != lastPlayedGameID) 
          {
            // no streak
            localStorage.setItem('personalStreak', 0);
          }
        }

      </script>

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
          <b>The first two questions will be "Unique" (indicated by a U below the question number) questions. The goal is to name the most unique correct answer.</b> Scoring will change throughout the day based on other user's answers.
          <br><br>
          For example:
          <br>
          <strong>&bull;</strong> Name a company in the S&P 500?
          <br>
          <strong>&bull;</strong> Apple, while being a correct answer, will likely yield less points than Hershey
          </br> 
          <br>
          <b>The second two questions will be "Ranked List" (indicated by a R below the question number) questions. The goal is to name the top ranking of a list.</b> The top 10 will score points in descending order.
          <br><br>
          For example:
          <br>
          <strong>&bull;</strong> Name the largest country by total area?
          <br>
          <strong>&bull;</strong> Answering Russia will be worth the maximum 100pts, Canada (#2) will score 90pts, Algeria (#10) will score 10pts
          <br>  
          <br>
          Share your results and compete with friends!
          </p>
          <br>
          <a href="https://uncoveredshorts.com/terms-of-service">Terms of Service</a>
        </div>
        <button class="play" onclick=closeModalById('rulesModal')>PLAY</button>
      </div>                   

      <!-- Rules modal -->
      <div class="modal" id="feedbackModal">
        <button class="close-modal" onclick=closeModalById('feedbackModal')>×</button>
        <h3>FEEDBACK</h3>
        <span class='feedback-text'>Hi there! We'd greatly appreciate your feedback on our game to help us enhance the experience for everyone. Thanks for sharing! </span>
        <form class='feedback-form' action="https://uncoveredshorts.com/send-feedback" method="POST">
          <input type="hidden" name="_token" value="OCq1FDkkyZYJuM8jhOHEA0jxQ8r5vQ48kE2TF1eg" autocomplete="off">          <label for="">Name</label>
          <input name='name' type="text" placeholder="Name..." required>
          <label for="">Your email</label>
          <input name='email' type="email" placeholder="youremail@example.com" required>
          <label for="">Message</label>
          <textarea name="message" id="" cols="30" rows="10" placeholder="Message..." required></textarea>
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
          UNCOVERED SHORTS #87 
        </span>
        <div class="boxes-container">
          <div class="box">
            <p id='AverageScore' class="stats-value">
              168
            </p>
            <label>Average <br> score</label>
          </div>
          <div class="box scale">
            <p id='GamesPlayed' class="stats-value">
              147
            </p>
            <label>Games <br> played</label>
          </div>
          <div class="box">
            <p id ="TopScore" class="stats-value">
              373
            </p>
            <label>Top <br> score</label>
          </div>
        </div>
      </div>

      
      <div class="modal share-container" id='shareModal'>
        <button class="close-modal" onclick=closeModalById('shareModal')>×</button>
        <div class="share-text-container">
          <textarea id='share-text' class="share-text" readonly>Uncovered Shorts #54, 0pts Q1: 90, Q2: 85, Q3: 90, Q4: 40. Play at uncoveredshorts.com</textarea>
          <button class="copy-btn">COPY</button>
        </div>
      </div>

      <!-- Enter you initial modal -->
      <div class="modal share-container" id='initialModal'>
        <button class="close-modal" onclick=closeModalById('initialModal')>×</button>
        <div class="share-text-container">
          <p class="im-text2">Enter your initials for the leaderboard</p>
          <form action="" id='initialForm' class='initialForm'>
            <input maxlength="3" minlength="3" type="text" name='playerInitial' id='playerInitial' value='' required pattern="[A-Za-z0-9]{3}" title="Please enter 3 valid characters">
            <div class='im-buttons'>
              <button class="copy-btn" type="submit">I’M THE BEST</button>
            </div>
          </form>
        </div>
      </div>

      <script>
        function shareGame() {
          // Générer le texte à copier
          var shareText = "🕵🏼‍♂️ "+currentGameName+", "+playerFinalScore+"pts\n";
          shareText += getEmoji(score1) + " " + score1 + " | " + getEmoji(score2) + " " + score2 +" | " + getEmoji(score3) + " " + score3 +" | " + getEmoji(score4) + " " + score4 +"\n";
          shareText += "🎲 Play at uncoveredshorts.com";

          // Sélectionner les éléments nécessaires'
          var shareTextarea = document.querySelector('.share-text');
          var copyBtn = document.querySelector('.copy-btn');

          shareTextarea.value = shareText;

          copyBtn.addEventListener('click', function() {
            shareTextarea.select();
            document.execCommand('copy');
            copyBtn.textContent = 'Copied';
            copyBtn.classList.add('copied-btn');
          });
        };
        
        // Listen to initial form
        document.getElementById('initialForm').addEventListener('submit', function(event) {
          event.preventDefault(); // Prevent the default form submission (page refresh)

          var playerInitial = document.getElementById('playerInitial').value;

          if (playerInitial.length === 3) {
            
            // Generate a unique identifier
            const currentDateTime = new Date().toISOString().replace(/[^0-9]/g, ""); // Get current datetime in YYYYMMDDHHMMSS format
            const uniqueIdentifier = playerInitial + currentDateTime;

            localStorage.setItem('personalUID', uniqueIdentifier);
            localStorage.setItem('personalInitial', playerInitial);
            
            // Submit score to the Top score leaderboard
            addScoreToLeaderboard(currentGameId, playerFinalScore);
            
            // Submit score to the Steak leaderboard
            addStreakToLeaderboard(currentGameId);

            closeModalById('initialModal');
            setTimeout(function() {
              openModalById('LeaderboardModal');
            }, 600);
          } 
          else 
          {
            alert('Please enter 3 characters.');
          }
        });

        // Function that updates the top score leaderboard html after the new entry
        function updateLeaderboard(leaderboard) {
          for (let i = 0; i < leaderboard.length; i++) {
            document.getElementById(`ranking-initial-${i+1}`).textContent = leaderboard[i].initial;
            document.getElementById(`ranking-score-${i+1}`).textContent = leaderboard[i].total_score;
          }
        }

        // Function that updates the streak score 
        function updateStreakLeaderboard(leaderboard) {
          for (let i = 0; i < leaderboard.length; i++) {
            document.getElementById(`streak-ranking-initial-${i+1}`).textContent = leaderboard[i].initial;
            document.getElementById(`streak-ranking-score-${i+1}`).textContent = leaderboard[i].streak;
          }
        }

        // Function that updates the leaedreboar
        function updatePersonnalizedLeaderboard(leaderboard) {
          for (let i = 0; i < leaderboard.length; i++) {
            document.getElementById(`perso-ranking-initial-${i+1}`).textContent = leaderboard[i].initial;
            document.getElementById(`perso-ranking-score-${i+1}`).textContent = leaderboard[i].total_score;
          }
        }

        // Function that updates the leaedreboar
        function showBlankPersonnalizedLeaderboard(leaderboard) {
          for (let i = 0; i < 5; i++) {
            document.getElementById(`perso-ranking-initial-${i+1}`).textContent = "???";
            document.getElementById(`perso-ranking-score-${i+1}`).textContent = '0';
          }
        }
      </script>
    
      <script src="https://uncoveredshorts.com/js/game.js?t=1723510949"></script>

      ;

  </body>
</html>

    <!-- Twitter Card meta tags -->
    <meta name="twitter:card" content="uncovered_shorts_image">
    <meta name="twitter:title" content="Uncovered Shorts">
    <meta name="twitter:description" content="Uncovered Shorts : The goal of the game is to get the highest score possible. You will be presented with four questions, which will be of two question types 'Unique' and 'Ranked' ">
    

    <link rel="stylesheet" href="{{ asset('css/layout.css') }}?t=<?php now() ?>">
    <link rel="stylesheet" href="{{ asset('css/game.css') }}?t=1.02">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}?t=1.137">

    <!-- Fonts -->
    <link href="https://fonts.cdnfonts.com/css/switzer" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
  </head>

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-P5M59RPS65"></script>
  <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());


  gtag('config', 'G-P5M59RPS65');
  </script>

  <body>
    <header>
      <img class='h-logo' src="{{ asset('img/logo.png') }}" alt="uncovered-short-logo">
      <div class="header-links">
        <button class='hl-icon' onclick=openModalById('rulesModal')> 
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22"><g id="_01_align_center" data-name="01 align center"><path d="M12,24A12,12,0,1,1,24,12,12.013,12.013,0,0,1,12,24ZM12,2A10,10,0,1,0,22,12,10.011,10.011,0,0,0,12,2Z"/><path d="M14,19H12V12H10V10h2a2,2,0,0,1,2,2Z"/><circle cx="12" cy="6.5" r="1.5"/></g></svg>
        </button>

        <button class='hl-icon' onclick=openModalById('gameOverModal')> 
          <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="22" height="22"><path d="M13,0h-2c-1.1,0-2,.9-2,2V24h6V2c0-1.1-.9-2-2-2Zm0,22h-2V2h2V22ZM22,6h-2c-1.1,0-2,.9-2,2V24h6V8c0-1.1-.9-2-2-2Zm0,16h-2V8h2v14ZM4,12H2c-1.1,0-2,.9-2,2v10H6V14c0-1.1-.9-2-2-2Zm0,10H2V14h2v8Z"/></svg>
        </button>

        <button class="hl-icon" onclick=openModalById('LeaderboardModal')>
          <svg fill="#FFFFFF" width="25" height="25" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" style="enable-background:new 0 0 1024 1024" xml:space="preserve"><path d="M918.4 201.6c-6.4-6.4-12.8-9.6-22.4-9.6H768V96c0-9.6-3.2-16-9.6-22.4C752 67.2 745.6 64 736 64H288c-9.6 0-16 3.2-22.4 9.6C259.2 80 256 86.4 256 96v96H128c-9.6 0-16 3.2-22.4 9.6-6.4 6.4-9.6 16-9.6 22.4 3.2 108.8 25.6 185.6 64 224 34.4 34.4 77.56 55.65 127.65 61.99 10.91 20.44 24.78 39.25 41.95 56.41 40.86 40.86 91 65.47 150.4 71.9V768h-96c-9.6 0-16 3.2-22.4 9.6-6.4 6.4-9.6 12.8-9.6 22.4s3.2 16 9.6 22.4c6.4 6.4 12.8 9.6 22.4 9.6h256c9.6 0 16-3.2 22.4-9.6 6.4-6.4 9.6-12.8 9.6-22.4s-3.2-16-9.6-22.4c-6.4-6.4-12.8-9.6-22.4-9.6h-96V637.26c59.4-7.71 109.54-30.01 150.4-70.86 17.2-17.2 31.51-36.06 42.81-56.55 48.93-6.51 90.02-27.7 126.79-61.85 38.4-38.4 60.8-112 64-224 0-6.4-3.2-16-9.6-22.4zM256 438.4c-19.2-6.4-35.2-19.2-51.2-35.2-22.4-22.4-35.2-70.4-41.6-147.2H256v182.4zm390.4 80C608 553.6 566.4 576 512 576s-99.2-19.2-134.4-57.6C342.4 480 320 438.4 320 384V128h384v256c0 54.4-19.2 99.2-57.6 134.4zm172.8-115.2c-16 16-32 25.6-51.2 35.2V256h92.8c-6.4 76.8-19.2 124.8-41.6 147.2zM768 896H256c-9.6 0-16 3.2-22.4 9.6-6.4 6.4-9.6 12.8-9.6 22.4s3.2 16 9.6 22.4c6.4 6.4 12.8 9.6 22.4 9.6h512c9.6 0 16-3.2 22.4-9.6 6.4-6.4 9.6-12.8 9.6-22.4s-3.2-16-9.6-22.4c-6.4-6.4-12.8-9.6-22.4-9.6z"/></svg>
        </button>
        
        <button class='hl-icon' onclick=openModalById('feedbackModal')> 
          <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="22" height="22"><path d="m13.5,10.5c0,.828-.672,1.5-1.5,1.5s-1.5-.672-1.5-1.5.672-1.5,1.5-1.5,1.5.672,1.5,1.5Zm3.5-1.5c-.828,0-1.5.672-1.5,1.5s.672,1.5,1.5,1.5,1.5-.672,1.5-1.5-.672-1.5-1.5-1.5Zm-10,0c-.828,0-1.5.672-1.5,1.5s.672,1.5,1.5,1.5,1.5-.672,1.5-1.5-.672-1.5-1.5-1.5Zm17-5v12c0,2.206-1.794,4-4,4h-2.852l-3.848,3.18c-.361.322-.824.484-1.292.484-.476,0-.955-.168-1.337-.507l-3.749-3.157h-2.923c-2.206,0-4-1.794-4-4V4C0,1.794,1.794,0,4,0h16c2.206,0,4,1.794,4,4Zm-2,0c0-1.103-.897-2-2-2H4c-1.103,0-2,.897-2,2v12c0,1.103.897,2,2,2h3.288c.235,0,.464.083.645.235l4.048,3.41,4.171-3.416c.179-.148.404-.229.637-.229h3.212c1.103,0,2-.897,2-2V4Z"/></svg>
        </button>

      </div>
    </header>

    <main>
      <h1>Uncovered shorts</h1>
      <div class='game-section'>
        <div class="game-block">
          <div class="question-block">
            <span class="numero">Q1 <b class='letter-type'>U</b> </span>
            <h2 class="question" data="{!! $questions[0]->value !!}">{!! $questions[0]->value !!}</h2>
            <div class="answer-block">
              <input id='us-ipt1' onclick="updateCurrentSearchQuestion(event), setActivePlayerInput('us-ipt1'), openModalById('searchModal'), displaySuggestions(suggestions1)"  class='answer' type="text" name="answer" value='' placeholder='ANSWER HERE...' readonly>
              <span id='us-pts1' class='points'>-</span>
            </div>
          </div>

          <div class="question-block">
            <span class="numero">Q2 <b class='letter-type'>U</b></span>
            <h2 class="question" data="{!! $questions[1]->value !!}">{!! $questions[1]->value !!}</h2>
            <div class="answer-block">
              <input id='us-ipt2' onclick="updateCurrentSearchQuestion(event), setActivePlayerInput('us-ipt2'), openModalById('searchModal'), displaySuggestions(suggestions2)" class='answer' type="text" name="answer" value='' placeholder='ANSWER HERE...' readonly>
              <span id='us-pts2' class='points'>-</span>
            </div>
          </div>

          <div class="question-block">
            <span class="numero">Q3 <b class='letter-type'>R</b></span>
            <h2 class="question" data="{!! $questions[2]->value !!}">{!! $questions[2]->value !!}</h2>
            <div class="answer-block">
              <input id='us-ipt3' onclick="updateCurrentSearchQuestion(event), setActivePlayerInput('us-ipt3'), openModalById('searchModal'), displaySuggestions(suggestions3)" class='answer' type="text" name="answer" value='' placeholder='ANSWER HERE...' readonly>
              <span id='us-pts3' class='points'>-</span>
            </div>
          </div>

          <div class="question-block">
            <span class="numero">Q4 <b class='letter-type'>R</b></span>
            <h2 class="question" data="{!! $questions[3]->value !!}">{!! $questions[3]->value !!}</h2>
            <div class="answer-block">
              <input id='us-ipt4' onclick="updateCurrentSearchQuestion(event), setActivePlayerInput('us-ipt4'), openModalById('searchModal'), displaySuggestions(suggestions4)" class='answer' type="text" name="answer" value='' placeholder='ANSWER HERE...' readonly>
              <span id='us-pts4' class='points'>-</span>
            </div>
          </div>
        </div>
      </div>
    </main>

    <footer>
      <div class="footer-s1">© 2024 Uncovered Shorts</div>
      <div class="footer-s2">
        <?xml version="1.0" encoding="iso-8859-1"?>
          <span class="folllow-us">Find us on</span>
          <a href="https://www.instagram.com/uncoveredshorts/" target='_blank'>
            <svg fill="#161616" color="" style='background:#EDEDED;' height="35px" width="35px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
            viewBox="0 0 455.73 455.73" xml:space="preserve">
          <path d="M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31c0,24.99,20.34,45.33,45.32,45.33c24.99,0,45.32-20.34,45.32-45.33
            C273.18,202.88,252.85,182.55,227.86,182.55z M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31c0,24.99,20.34,45.33,45.32,45.33
            c24.99,0,45.32-20.34,45.32-45.33C273.18,202.88,252.85,182.55,227.86,182.55z M303.36,108.66H152.37
            c-24.1,0-43.71,19.61-43.71,43.71v150.99c0,24.1,19.61,43.71,43.71,43.71h150.99c24.1,0,43.71-19.61,43.71-43.71V152.37
            C347.07,128.27,327.46,108.66,303.36,108.66z M227.86,306.35c-43.27,0-78.48-35.21-78.48-78.49c0-43.27,35.21-78.48,78.48-78.48
            c43.28,0,78.49,35.21,78.49,78.48C306.35,271.14,271.14,306.35,227.86,306.35z M308.87,165.61c-10.24,0-18.57-8.33-18.57-18.57
            s8.33-18.57,18.57-18.57s18.57,8.33,18.57,18.57S319.11,165.61,308.87,165.61z M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31
            c0,24.99,20.34,45.33,45.32,45.33c24.99,0,45.32-20.34,45.32-45.33C273.18,202.88,252.85,182.55,227.86,182.55z M303.36,108.66
            H152.37c-24.1,0-43.71,19.61-43.71,43.71v150.99c0,24.1,19.61,43.71,43.71,43.71h150.99c24.1,0,43.71-19.61,43.71-43.71V152.37
            C347.07,128.27,327.46,108.66,303.36,108.66z M227.86,306.35c-43.27,0-78.48-35.21-78.48-78.49c0-43.27,35.21-78.48,78.48-78.48
            c43.28,0,78.49,35.21,78.49,78.48C306.35,271.14,271.14,306.35,227.86,306.35z M308.87,165.61c-10.24,0-18.57-8.33-18.57-18.57
            s8.33-18.57,18.57-18.57s18.57,8.33,18.57,18.57S319.11,165.61,308.87,165.61z M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31
            c0,24.99,20.34,45.33,45.32,45.33c24.99,0,45.32-20.34,45.32-45.33C273.18,202.88,252.85,182.55,227.86,182.55z M0,0v455.73h455.73
            V0H0z M380.23,303.36c0,42.39-34.48,76.87-76.87,76.87H152.37c-42.39,0-76.87-34.48-76.87-76.87V152.37
            c0-42.39,34.48-76.87,76.87-76.87h150.99c42.39,0,76.87,34.48,76.87,76.87V303.36z M303.36,108.66H152.37
            c-24.1,0-43.71,19.61-43.71,43.71v150.99c0,24.1,19.61,43.71,43.71,43.71h150.99c24.1,0,43.71-19.61,43.71-43.71V152.37
            C347.07,128.27,327.46,108.66,303.36,108.66z M227.86,306.35c-43.27,0-78.48-35.21-78.48-78.49c0-43.27,35.21-78.48,78.48-78.48
            c43.28,0,78.49,35.21,78.49,78.48C306.35,271.14,271.14,306.35,227.86,306.35z M308.87,165.61c-10.24,0-18.57-8.33-18.57-18.57
            s8.33-18.57,18.57-18.57s18.57,8.33,18.57,18.57S319.11,165.61,308.87,165.61z M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31
            c0,24.99,20.34,45.33,45.32,45.33c24.99,0,45.32-20.34,45.32-45.33C273.18,202.88,252.85,182.55,227.86,182.55z M227.86,182.55
            c-24.98,0-45.32,20.33-45.32,45.31c0,24.99,20.34,45.33,45.32,45.33c24.99,0,45.32-20.34,45.32-45.33
            C273.18,202.88,252.85,182.55,227.86,182.55z M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31c0,24.99,20.34,45.33,45.32,45.33
            c24.99,0,45.32-20.34,45.32-45.33C273.18,202.88,252.85,182.55,227.86,182.55z M303.36,108.66H152.37
            c-24.1,0-43.71,19.61-43.71,43.71v150.99c0,24.1,19.61,43.71,43.71,43.71h150.99c24.1,0,43.71-19.61,43.71-43.71V152.37
            C347.07,128.27,327.46,108.66,303.36,108.66z M227.86,306.35c-43.27,0-78.48-35.21-78.48-78.49c0-43.27,35.21-78.48,78.48-78.48
            c43.28,0,78.49,35.21,78.49,78.48C306.35,271.14,271.14,306.35,227.86,306.35z M308.87,165.61c-10.24,0-18.57-8.33-18.57-18.57
            s8.33-18.57,18.57-18.57s18.57,8.33,18.57,18.57S319.11,165.61,308.87,165.61z M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31
            c0,24.99,20.34,45.33,45.32,45.33c24.99,0,45.32-20.34,45.32-45.33C273.18,202.88,252.85,182.55,227.86,182.55z M227.86,182.55
            c-24.98,0-45.32,20.33-45.32,45.31c0,24.99,20.34,45.33,45.32,45.33c24.99,0,45.32-20.34,45.32-45.33
            C273.18,202.88,252.85,182.55,227.86,182.55z M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31c0,24.99,20.34,45.33,45.32,45.33
            c24.99,0,45.32-20.34,45.32-45.33C273.18,202.88,252.85,182.55,227.86,182.55z M303.36,108.66H152.37
            c-24.1,0-43.71,19.61-43.71,43.71v150.99c0,24.1,19.61,43.71,43.71,43.71h150.99c24.1,0,43.71-19.61,43.71-43.71V152.37
            C347.07,128.27,327.46,108.66,303.36,108.66z M227.86,306.35c-43.27,0-78.48-35.21-78.48-78.49c0-43.27,35.21-78.48,78.48-78.48
            c43.28,0,78.49,35.21,78.49,78.48C306.35,271.14,271.14,306.35,227.86,306.35z M308.87,165.61c-10.24,0-18.57-8.33-18.57-18.57
            s8.33-18.57,18.57-18.57s18.57,8.33,18.57,18.57S319.11,165.61,308.87,165.61z M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31
            c0,24.99,20.34,45.33,45.32,45.33c24.99,0,45.32-20.34,45.32-45.33C273.18,202.88,252.85,182.55,227.86,182.55z"/>
          </svg>
          <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
        </a>
      </div>
    </footer>

    <!-- Modals --> 
      <div class="modal" id="gameOverModal">
        <button class="close-modal" onclick=closeModalById('gameOverModal')>×</button>
        <div class="go-box">
          <img src="{{ asset('img/logo.png') }}" width='180' alt="uncovered-shorts-logo" class="gameOverLogo">
          <p class="go-text"><b id='congrats-text'>Your score today:</b></p>
          <div class='go-finalscore'><span id="go-points">0</span><b id="go-percentile">(0%)</b></div>
          <div class="two-column">
            <span>Today's <br> Average <br> Score <br><b id='AverageScoreResults'>{{ $statistics['AverageScore'] == intval($statistics['AverageScore']) ? intval($statistics['AverageScore']) : number_format($statistics['AverageScore'], 1) }}</b></span>
            <span>Today's <br> Top <br>Score <br><b id='TopScoreResults'>{{ $statistics['TopScore'] == intval($statistics['TopScore']) ? intval($statistics['TopScore']) : number_format($statistics['TopScore'], 1) }}</b></span>
            <span>Personal <br> Average <br> Score <br><b id='personalAverage'>0</b></span>
          </div>
          <span>Games played = <b id='personalGameCount'>0</b>/<b id='trackedGameCount'>{{ $trackedGameCount }}</b> </span>
          <span><br><b>YOU'RE STREAKING!</b><br> <b id="personalStreak">0 day</b> played in a row <br></span>
          <div class="go-buttons">
            <button class="go-share" onclick="openModalById('shareModal'), shareGame()">SHARE</button>
            <button class="go-leaderboard" onclick="openModalById('LeaderboardModal')">LEADERBOARD</button>
          </div>
          <div class="subscribing">
            <label for="">Get a recap of the most popular answers</label>
            <form id='subscribe-form' class="row sf-form" method="POST">
              <input class='sf-email' name='sf-email' type="email" placeholder="Your email...">
              <input class='sf-submit' type="submit" value="I'm In!">
            </form>
            <div id="sf-message" style="color: rgb(202, 59, 59); display: none;"></div>
          </div>
          <div id="go-bestanswers" class="go-bestanswers">
            <p class="go-text"><b>Q1 - Best answers</b></p>
            <span class='go-best-answer'><b>#1 :</b> {{ $uniqueAnswers1[0]->value ?? '-' }}</span>
            <span class='go-best-answer'><b>#2 :</b> {{ $uniqueAnswers1[1]->value ?? '-' }}</span>
            <span class='go-best-answer'><b>#3 :</b> {{ $uniqueAnswers1[2]->value ?? '-' }}</span>
          </div>
          <br>
          <div  class="go-bestanswers">
            <p class="go-text"><b>Q2 - Best answers</b></p>
            <span class='go-best-answer'><b>#1 :</b> {{ $uniqueAnswers2[0]->value ?? '-' }}</span>
            <span class='go-best-answer'><b>#2 :</b> {{ $uniqueAnswers2[1]->value ?? '-' }}</span>
            <span class='go-best-answer'><b>#3 :</b> {{ $uniqueAnswers2[2]->value ?? '-' }}</span>
          </div>
          <br>
          <div class="go-bestanswers">
            <p class="go-text"><b>Q3 - Top answers</b></p>
            <span class='go-best-answer'><b>#1 :</b> {{ $rankedAnswers3[0]->value ?? '-' }}</span>
            <span class='go-best-answer'><b>#2 :</b> {{ $rankedAnswers3[1]->value ?? '-' }}</span>
            <span class='go-best-answer'><b>#3 :</b> {{ $rankedAnswers3[2]->value ?? '-' }}</span>
          </div>
          <br>
          <div class="go-bestanswers">
            <p class="go-text"><b>Q4 - Top answers</b></p>
            <span class='go-best-answer'><b>#1 :</b> {{ $rankedAnswers4[0]->value ?? '-' }}</span>
            <span class='go-best-answer'><b>#2 :</b> {{ $rankedAnswers4[1]->value ?? '-' }}</span>
            <span class='go-best-answer'><b>#3 :</b> {{ $rankedAnswers4[2]->value ?? '-' }}</span>
          </div>
        </div>
      </div>

      <!-- LEADERBOARD -->
      <div class="modal" id="LeaderboardModal">
        <button class="close-modal" onclick=closeModalById('LeaderboardModal')>×</button>
        <img class='lb-logo' src="{{ asset('img/logo.png') }}" width='180' alt="uncovered-shorts-logo">

        <div class="list-leaderboard">
          <div class="lb-box">
            <span class="spacing-20"></span>
            <p class="lb-text"><b>TODAY'S TOP SCORES</b></p>
            <span class="spacing-10"></span>
            <div class="ranking-bloc">
              @for ($i = 0; $i < 10; $i++)
                <div class="ranking-row @if($i % 2 != 0) rr-dark @endif">
                    <span class="ranking-number">#{{ $i + 1 }}</span>
                    <span class="ranking-initial" id="ranking-initial-{{ $i + 1 }}">{{ $leaderboard1[$i]->initial ?? 'N/A' }}</span>
                    <span class="ranking-score" id="ranking-score-{{ $i + 1 }}">{{ $leaderboard1[$i]->total_score ?? 'N/A' }}</span>
                </div>
              @endfor
            </div>
          </div>
  
          <!-- PERSONNALIZED LEADERBOARD -->
          <div class="lb-box">
            <span class="spacing-20"></span>
            <form action="" class="form-group-selection">
              <select name='playerGroup' id='playerGroup' required>
                <option value="Group Leaderboard" disabled selected>Group Leaderboard</option>
                <option value="No Group">No Group</option>
                @foreach ($leaderboardGroups as $group)
                    <option value="{{ $group->category_name }}">{{ $group->category_name }}</option>
                @endforeach
              </select>
              <div class="help-tip">
                <p>If you want a specific group leaderboard added, please contact
                  <a href="mailto:tucker@uncoveredshorts.com">tucker@uncoveredshorts.com</a>
                </p>
            </div>
            </form>
            <span class="spacing-10"></span>
            <div class="ranking-bloc" id='rb-groupleaderboard'>
              @for ($i = 0; $i < 5; $i++)
                <div class="ranking-row @if($i % 2 != 0) rr-dark @endif">
                    <span class="ranking-number">#{{ $i + 1 }}</span>
                    <span class="ranking-initial" id="perso-ranking-initial-{{ $i + 1 }}">???</span>
                    <span class="ranking-score" id="perso-ranking-score-{{ $i + 1 }}">0</span>
                </div>
              @endfor
            <!-- icon info leaderboard -->
            </div>
          </div>
  
          <!-- STREAK LEADERBOARD -->
          <div class="lb-box">
            <span class="spacing-20"></span>
            <p class="lb-text"><b>TOTAL STREAK</b></p>
            <span class="spacing-10"></span>
            <div class="ranking-bloc">
              @for ($i = 0; $i < 10; $i++)
                <div class="ranking-row @if($i % 2 != 0) rr-dark @endif">
                    <span class="ranking-number">#{{ $i + 1 }}</span>
                    <span class="ranking-initial" id="streak-ranking-initial-{{ $i + 1 }}">{{ $leaderboard2streak[$i]->initial ?? 'N/A' }}</span>
                    <span class="ranking-score" id="streak-ranking-score-{{ $i + 1 }}">{{ $leaderboard2streak[$i]->streak ?? 'N/A' }}</span>
                </div>
              @endfor
            </div>
          </div>

        </div>
      </div>

    <div class="modal-background" id="modalBackground">

      <!-- Subscribing -->
      <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('subscribe-form').addEventListener('submit', function (e) {
                e.preventDefault();
        
                const email = document.querySelector('input[name="sf-email"]').value;
                const token = '{{ csrf_token() }}';
                const messageDiv = document.getElementById('sf-message');
        
                fetch('{{ route('subscribe') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                    body: JSON.stringify({ email: email })
                })
                .then(response => response.json())
                .then(data => {
                  messageDiv.style.display = 'block';
                  if (data.status === 'success') {
                      messageDiv.style.color = '#78ad7a';
                      messageDiv.textContent = data.message;
                  } else {
                      messageDiv.style.color = '#d55353';
                      messageDiv.textContent = data.message;
                  }
                })
                .catch(error => {
                  messageDiv.style.display = 'block';
                  messageDiv.style.color = '#d55353';
                  messageDiv.textContent = 'An unexpected error occurred. Please try again.';
                  console.error('Error:', error);
                });
            });
        });
        </script>

      <!-- Answers list modal -->
      <div class="modal" id="searchModal">
        <button class="close-modal" onclick=closeModalById('searchModal')>×</button>
        <div class="search-bar">
          <span id='current-search-question' class="search-question">Choose an answer.</span>
          <input id="us-search" type="text" class='search' oninput="filterSuggestions(this.value)" placeholder="Type here...">
        </div>
        <div id="suggestions" class="suggestions">
          <span class="single-suggestion">
            <p>-</p>
            <button>Select</button>
          </span>
        </div>
      </div>

      <script>
        
        /* Initialiser le text dans share quand l'use n'a pas encore joué */
        var currentGameId = {!! $currentGame->id !!}
        var currentGameName = {!! json_encode($currentGame->name) !!};

        /* new statistics */
        var trackedGameCount = {{ $trackedGameCount }}

        /* Leaderboard feature */
        var personalInitial = localStorage.getItem('personalInitial') ?? "???"
        var personalUID = localStorage.getItem('personalUID') ?? "???"
        
        /* Top score */
        var leaderboard1 = @json($leaderboard1);
        var leaderboard1LastPlace = leaderboard1.length > 9 ? leaderboard1[9].total_score : 0;
        
        /* Top score */
        var leaderboard2streak = @json($leaderboard2streak);
        var leaderboard2LastPlace = leaderboard2streak.length > 9 ? leaderboard2streak[9].total_score : 0;

        var personalGameCount = parseInt(localStorage.getItem('personalGameCount') ?? 0);
        var personalAverage = parseInt(localStorage.getItem('personalAverage') ?? 0);
        var personalStreak = parseInt(localStorage.getItem('personalStreak') ?? 0);

        localStorage.setItem('personalLeaderboardGroup', localStorage.getItem('personalLeaderboardGroup') || 'Group Leaderboard');

        /* Mettre le select par defaut, sa derniere selection */
        const playerGroupSelect = document.getElementById('playerGroup');
        // Définit la valeur sélectionnée de l'élément <select>
        //alert(localStorage.getItem('personalLeaderboardGroup'));
        playerGroupSelect.value = localStorage.getItem('personalLeaderboardGroup');

        /* Cacher le classement par defaut */
        var rbGroupLeaderboard = document.getElementById('rb-groupleaderboard');
        if (playerGroupSelect.value === "Group Leaderboard" || this.value === "No Group") 
        {
          rbGroupLeaderboard.style.display = 'none';
        }
        else rbGroupLeaderboard.style.display = 'flex';

        var personalGameCountHtml = document.getElementById('personalGameCount');
        var personalAverageHtml = document.getElementById('personalAverage');
        var lastPlayedGameID = localStorage.getItem('lastPlayedGameID') ?? 0;
        var personalStreakHtml = document.getElementById('personalStreak');
        var previousGameID = {{ $previousGame->id }}

        verifyStreak();
        refreshHtmlInLocalStorage();
        /* --------------- */

        var suggestions1 = {!! $suggestions1 !!};
        var suggestions2 = {!! $suggestions2 !!};
        var suggestions3 = {!! $suggestions3 !!};
        var suggestions4 = {!! $suggestions4 !!};
        
        var uniqueAnswers1 = {!! $uniqueAnswers1 !!};
        var uniqueAnswers2 = {!! $uniqueAnswers2 !!};
        var rankedAnswers3 = {!! $rankedAnswers3 !!};
        var rankedAnswers4 = {!! $rankedAnswers4 !!};

        var percentileInital = "{{ $statistics['Percentile'] }}"

        // If already played
        // var gameAlreadyPlayed = {!! $gameAlreadyPlayed ? $gameAlreadyPlayed : 'null' !!};

        var activePlayerInput;
        var score1 = 0, score2 = 0, score3 = 0, score4 = 0;

        var playerFinalScore = 0;
        // The number of already answered questions
        var answerCount = 0;

        // Use a regular expression to find & characters that are not part of an HTML entity
        document.addEventListener('DOMContentLoaded', () => {

          /* MANAGE LEADERBOARD GROUP SELECTION */

          // affichage initial avec sa categorie actuelle
          changeScoreGroupLeaderboard(currentGameId, localStorage.getItem('personalLeaderboardGroup'));
            
          /* If the player changes the selection leaderboard group */
          playerGroupSelect.addEventListener('change', function() {
            const selectedGroup = this.value;
            localStorage.setItem('personalLeaderboardGroup', selectedGroup);     

            changeScoreGroupLeaderboard(currentGameId, localStorage.getItem('personalLeaderboardGroup'));

            if (playerGroupSelect.value === "Group Leaderboard" || this.value === "No Group") 
            {
              rbGroupLeaderboard.style.display = 'none';
            }
            else rbGroupLeaderboard.style.display = 'flex';

          });

            /* Mettre a jour le leaderboard de streak pour verifier si le joueur a deja un  */
            if(localStorage.getItem('personalInitial') == "???" || localStorage.getItem('personalInitial') == null)
            {}
            else
            {
              //alert(localStorage.getItem('personalInitial'));
              addStreakToLeaderboard(currentGameId); 
            }

            // Check if user has already played, if yes show results without the close button

            // if visitor already played and finished/submitted his game 
            // Dans cookie se trouve l'id du game_played
            if(getCookie('Game_'+currentGameId) !== null)
            {
              // Dans cookie se trouve l'id du game_played
              getGameAlreadyPlayedInformations(getCookie('Game_' + currentGameId), currentGameId)
              .then((gameAlreadyPlayedJSON) => 
              {
                let gameAlreadyPlayed = gameAlreadyPlayedJSON.gameAlreadyPlayed;
                let percentile = gameAlreadyPlayedJSON.percentile;

                // Auto populate scores in the results page
                document.getElementById('go-points').innerHTML = '' + Math.round(gameAlreadyPlayed.total_score);
                document.getElementById('go-percentile').innerHTML = '(' + percentile + '%)';

                // Auto populate scores in the share text
                playerFinalScore = Math.round(gameAlreadyPlayed.total_score);
                score1 = Math.round(gameAlreadyPlayed.score_1);
                score2 = Math.round(gameAlreadyPlayed.score_2);
                score3 = Math.round(gameAlreadyPlayed.score_3);
                score4 = Math.round(gameAlreadyPlayed.score_4);

                // Auto populate score boxes
                let iLoop = 1;
                var pointsBoxes = document.getElementsByClassName("points");
                Array.from(pointsBoxes).forEach(element => {
                  // Carre points
                  element.classList.add("points-set");
                  
                  // Recuperer l'input a coté du carré de points et Populate
                  let inputNear = element.previousElementSibling;
                  inputNear.value = localStorage.getItem('Answer_'+iLoop+'_Game_'+currentGameId);
                  inputNear.readOnly = true;
                  inputNear.classList.add("answer-submitted");
                  inputNear.removeAttribute('onclick');

                  switch (element.id) 
                  {
                    case 'us-pts1': 
                      element.classList.add('points-' + Math.round(score1 / 5) * 5);
                      element.innerHTML = '' + score1;
                      break;
                    case 'us-pts2': 
                      element.classList.add('points-' + Math.round(score2 / 5) * 5);
                      element.innerHTML = '' + score2;
                      break;
                    case 'us-pts3': 
                      element.classList.add('points-' + Math.round(score3 / 5) * 5);
                      element.innerHTML = '' + score3;
                      break;
                    case 'us-pts4': 
                      element.classList.add('points-' + Math.round(score4 / 5) * 5);
                      element.innerHTML = '' + score4;
                      break;
                  }

                  iLoop++;
                });
 
                // Display answers because he already played
                var bestAnswers = document.getElementsByClassName('go-bestanswers');
                document.getElementById('gameOverModal').classList.add('show-answers');

                Array.from(bestAnswers).forEach(element => {
                    element.style.display = 'flex';
                });

                // Show results page 
                openModalById("gameOverModal");
              })
              .catch((error) => {
                console.error("Resolve promise getGameAlreadyPlayedInformations" + error);
              });  
            }
            // if visitor hasn't finished/submitted the game yet
            else
            {
              // alert('Not played yet');
              document.getElementById('go-percentile').innerHTML = '(0%)';
              autoPopulateAlreadyAnswered();
              
              // Compter les points deja autopopulé
              answerCount = document.querySelectorAll('.points-set').length;
            }

            /* Show rules once */
            if(localStorage.getItem('showRules') !== 'true') 
            { 
              openModalById('rulesModal')
              localStorage.setItem('showRules', 'true');
            }

            // Select all elements with the class 'question'
            const questionElements = document.querySelectorAll('.question');

            questionElements.forEach(element => {
                // Get the HTML content of the element
                let content = element.innerHTML;

                /* Check if the content contains the character '&'
                if (content.includes('&')) {
                    // Use a regular expression to find & characters that are not part of an HTML entity
                    element.innerHTML = element.innerHTML.replace(/&amp;/g, '<span style="font-family:arial;">&amp;</span>');
                }
                */
            });
        });

        // Remove inputs value
        for (let index = 1; index <= 4; index++) {
          const inputElement = document.getElementById('us-ipt'+index);
          inputElement.value = '';
        }

        function setActivePlayerInput(idinput) 
        { 
          activePlayerInput = idinput; 
        }

        function updateCurrentSearchQuestion(event) {
          // Get the input element that was clicked
          var inputElement = event.target;

          // Find the closest question-block
          var questionBlock = inputElement.closest('.question-block');

          // Get the h2 element within the closest question-block
          var questionElement = questionBlock.querySelector('.question');
          var questionData = questionElement.getAttribute('data');

          // Update the content of the <span> element
          var searchQuestionElement = document.getElementById('current-search-question');
          searchQuestionElement.textContent = '' + questionData;
        }

        // Save quelles suggestions utilisons nous mtn
        var currentSuggestions;

        function displaySuggestions(suggestions) 
        {          
          currentSuggestions = suggestions;
          var suggestionsContainer = document.getElementById('suggestions');
          var searchInput = document.getElementById('us-search');
          suggestionsContainer.innerHTML = '';
          searchInput.value = '';
        
          // auto focus on input
          searchInput.focus();
          searchInput.select();
        }

        var suggestionsContainer = document.getElementById('suggestions');
        var suggestions = suggestionsContainer.getElementsByClassName('single-suggestion');
        
        /* Fonction de recherche et filtre */
        function filterSuggestions(searchTerm) {

          suggestionsContainer.innerHTML = '';
          if(searchTerm != '') 
          {
            currentSuggestions.forEach(text => {
              if (text.toLowerCase().indexOf(searchTerm.toLowerCase()) !== -1) {
                // Créer l'élément de suggestion et l'ajouter au conteneur
                var span = document.createElement('span');
                span.className = 'single-suggestion';
                span.innerHTML = '<p>' + text + '</p><button onclick=selectSuggestion(event) data-value="'+ text +'" data-inputTargetId="'+ activePlayerInput +'" class="selectButton">Select</button>';
                suggestionsContainer.appendChild(span);
              }
            });
          }
        }

        /* Select answer , show points and disable input onclick*/
        function selectSuggestion(event) 
        {
          var questions = {!! $questions !!};

          var inputTargetId = event.target.getAttribute('data-inputTargetId');
          var inputTarget = document.getElementById(inputTargetId);

          let valueSelected = event.target.getAttribute('data-value');

          inputTarget.value = valueSelected;
          inputTarget.readOnly = true;
          inputTarget.classList.add("answer-submitted");
          
          // Calculate points and display  
          let playerPoints;
          let idEnding = inputTargetId.charAt(inputTargetId.length - 1);
          let pointContainer = document.getElementById('us-pts'+idEnding);
          
          // Store in local storage so we can re-use it to show his answer
          let localStorageKey = 'Answer_' + idEnding + '_Game_' + currentGameId;
          localStorage.setItem(localStorageKey, valueSelected);

          switch (idEnding) 
          {
            case '1': 
              playerPoints = calculateUniquePoints(uniqueAnswers1, valueSelected, questions[0].id);
              score1 = playerPoints;
              localStorage.setItem('Points_1_Game_' + currentGameId, playerPoints);
              break;
            case '2': 
              playerPoints = calculateUniquePoints(uniqueAnswers2, valueSelected, questions[1].id);
              score2 = playerPoints;
              localStorage.setItem('Points_2_Game_' + currentGameId, playerPoints);
              break;
            case '3': 
              playerPoints = calculateRankedPoints(rankedAnswers3, valueSelected, questions[2].id);
              score3 = playerPoints;
              localStorage.setItem('Points_3_Game_' + currentGameId, playerPoints);
              break;
            case '4': 
              playerPoints = calculateRankedPoints(rankedAnswers4, valueSelected, questions[3].id);
              score4 = playerPoints;
              localStorage.setItem('Points_4_Game_' + currentGameId, playerPoints);
              break;
          }

          let roundedPoints = Math.round(playerPoints / 5) * 5;
          pointContainer.innerHTML = '' + playerPoints;
          pointContainer.classList.add('points-set');
          pointContainer.classList.add('points-' + roundedPoints);

          // disable onclick
          inputTarget.removeAttribute('onclick');

          // Hide modal
          document.getElementById('searchModal').style.display = 'none';
          document.getElementById('modalBackground').style.display = 'none';

          // Score
          playerFinalScore = playerFinalScore + playerPoints;
          answerCount++;

          if(answerCount >= 4) gameOver();
        }
        
        /* Results */
        function gameOver()
        {
          // Ecrire le score final du joueur sur la fenetre des statistiques
          playerFinalScore = parseInt(score1) + parseInt(score2) + parseInt(score3) + parseInt(score4);
          document.getElementById('go-points').innerHTML = ''+playerFinalScore;

          localStorage.setItem('Game_'+currentGameId, playerFinalScore, 7);

          // Insert game 
          storeGameSession(currentGameId, score1, score2, score3, score4, playerFinalScore)
          .then(() => {
            // Get updated statistics including the new game
            return getStatistics(currentGameId, playerFinalScore);
          })
          .then(statisticsUpdated => {
            //console.log("Stats update =");
            //console.log(statisticsUpdated);
            //alert(statisticsUpdated.Percentile);
            document.getElementById('TopScore').innerHTML = '' + statisticsUpdated.TopScore;
            document.getElementById('AverageScore').innerHTML = '' + statisticsUpdated.AverageScore;
            document.getElementById('GamesPlayed').innerHTML = '' + statisticsUpdated.GamesPlayed;
            document.getElementById('go-percentile').innerHTML = '(' + statisticsUpdated.Percentile + '%)';

            // Results screen
            document.getElementById('TopScoreResults').innerHTML = '' + statisticsUpdated.TopScore;
            document.getElementById('AverageScoreResults').innerHTML = '' + statisticsUpdated.AverageScore;

            // Display answers
            var bestAnswers = document.getElementsByClassName('go-bestanswers');
            document.getElementById('gameOverModal').classList.add('show-answers');

            Array.from(bestAnswers).forEach(element => {
                element.style.display = 'flex';
            });

            // START - Calculate and show the new statistics () 
            //console.log(Math.round(((personalAverage*personalGameCount) + playerFinalScore)/(parseInt(personalGameCount)+1)));
            localStorage.setItem('personalAverage', Math.round(((personalAverage*personalGameCount) + playerFinalScore)/(parseInt(personalGameCount)+1)));  

            // increase personal Games Played Count and Update ID last game
            if(trackedGameCount < parseInt(personalGameCount) + 1) {}
            else localStorage.setItem('personalGameCount', parseInt(personalGameCount) + 1);
            localStorage.setItem('lastPlayedGameID', currentGameId);

            // verify if it's a streak
            if(previousGameID == lastPlayedGameID) 
            {
              if(trackedGameCount < parseInt(personalStreak) + 1) {}
              else localStorage.setItem('personalStreak', parseInt(personalStreak) + 1);
            }
            else
            {
              // no streak
              localStorage.setItem('personalStreak', 1);
            }

            // LEADERBOARD Feature

            // Verify if the player made it to the daily score top 10
            // He made it
            // old code ----- if(leaderboard1LastPlace <= playerFinalScore && playerFinalScore > 0)
            // old code ----- {
            
            // Player never submitted his initials, ask him and then add his score
            if(localStorage.getItem('personalInitial') == null || localStorage.getItem('personalInitial') == "???")
            {
              openModalById('initialModal');
              var initialInput = document.getElementById('playerInitial');
              initialInput.focus();

              // function already called - addScoreToLeaderboard(currentGameId, playerFinalScore);
            }
            // Player already have initials
            else
            {
              addScoreToLeaderboard(currentGameId, playerFinalScore);
            }
            

            /* Si le joueur a deja des initials, enregistrer ses Streaks */
            if(localStorage.getItem('personalInitial') == "???" || localStorage.getItem('personalInitial') == null)
            {}
            else
            {
              // Ajouter ou mettre a jour e nombre de streak de l'user
              //alert(localStorage.getItem('personalInitial'))
              addStreakToLeaderboard(currentGameId); 
            }

            refreshHtmlInLocalStorage();

            // Open the game over modal
            openModalById('gameOverModal', false);
          })
          .catch(error => {
            console.error("Une erreur s'est produite lors de la récupération des statistiques :", error);
          });
        }


        function autoPopulateAlreadyAnswered()
        {
          // Auto populate score boxes
          let iLoop = 1;
          var pointsBoxes = document.getElementsByClassName("points");
          Array.from(pointsBoxes).forEach(element => {

            // Parcourir s'il y a des reponses enregistrés dans le localstorage
            if(localStorage.getItem('Answer_'+iLoop+'_Game_'+currentGameId) != null)
            {
              // Deja repondu a la question
              element.classList.add("points-set");

              let inputNear = element.previousElementSibling;
              inputNear.value = ""+localStorage.getItem('Answer_'+iLoop+'_Game_'+currentGameId);
              inputNear.readOnly = true;
              inputNear.classList.add("answer-submitted");
              inputNear.removeAttribute('onclick');

              // Actualiser les valeurs de chaque variable score
              switch (element.id) 
              {
                case 'us-pts1': 
                  score1 = localStorage.getItem('Points_1_Game_'+currentGameId);
                  element.classList.add('points-' + Math.round(score1 / 5) * 5);
                  element.innerHTML = '' + score1;
                  break;
                case 'us-pts2': 
                  score2 = localStorage.getItem('Points_2_Game_'+currentGameId);
                  element.classList.add('points-' + Math.round(score2 / 5) * 5);
                  element.innerHTML = '' + score2;
                  break;
                case 'us-pts3': 
                  score3 = localStorage.getItem('Points_3_Game_'+currentGameId);
                  element.classList.add('points-' + Math.round(score3 / 5) * 5);
                  element.innerHTML = '' + score3;
                  break;
                case 'us-pts4': 
                  score4 = localStorage.getItem('Points_4_Game_'+currentGameId);
                  element.classList.add('points-' + Math.round(score4 / 5) * 5);
                  element.innerHTML = '' + score4;
                  break;
              }
            }
            else
            {
            }

            iLoop++;
          });
        }

        function refreshHtmlInLocalStorage()
        {
          var personalGameCount = parseInt(localStorage.getItem('personalGameCount') ?? 0);
          var personalAverage = parseInt(localStorage.getItem('personalAverage') ?? 0);
          var personalStreak = parseInt(localStorage.getItem('personalStreak') ?? 0);
          
          personalAverageHtml.innerHTML = personalAverage;
          personalStreakHtml.innerHTML = personalStreak + (personalStreak > 1 ? ' days' : ' day');
          personalGameCountHtml.innerHTML = personalGameCount;
        }

        function verifyStreak()
        {
          if(previousGameID != lastPlayedGameID && currentGameId != lastPlayedGameID) 
          {
            // no streak
            localStorage.setItem('personalStreak', 0);
          }
        }

      </script>

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
          <b>The first two questions will be "Unique" (indicated by a U below the question number) questions. The goal is to name the most unique correct answer.</b> Scoring will change throughout the day based on other user's answers.
          <br><br>
          For example:
          <br>
          <strong>&bull;</strong> Name a company in the S&P 500?
          <br>
          <strong>&bull;</strong> Apple, while being a correct answer, will likely yield less points than Hershey
          </br> 
          <br>
          <b>The second two questions will be "Ranked List" (indicated by a R below the question number) questions. The goal is to name the top ranking of a list.</b> The top 10 will score points in descending order.
          <br><br>
          For example:
          <br>
          <strong>&bull;</strong> Name the largest country by total area?
          <br>
          <strong>&bull;</strong> Answering Russia will be worth the maximum 100pts, Canada (#2) will score 90pts, Algeria (#10) will score 10pts
          <br>  
          <br>
          Share your results and compete with friends!
          </p>
          <br>
          <a href="{{ route('terms-of-service') }}">Terms of Service</a>
        </div>
        <button class="play" onclick=closeModalById('rulesModal')>PLAY</button>
      </div>                   

      <!-- Rules modal -->
      <div class="modal" id="feedbackModal">
        <button class="close-modal" onclick=closeModalById('feedbackModal')>×</button>
        <h3>FEEDBACK</h3>
        <span class='feedback-text'>Hi there! We'd greatly appreciate your feedback on our game to help us enhance the experience for everyone. Thanks for sharing! </span>
        <form class='feedback-form' action="{{ route('send.feedback') }}" method="POST">
          @csrf
          <label for="">Name</label>
          <input name='name' type="text" placeholder="Name..." required>
          <label for="">Your email</label>
          <input name='email' type="email" placeholder="youremail@example.com" required>
          <label for="">Message</label>
          <textarea name="message" id="" cols="30" rows="10" placeholder="Message..." required></textarea>
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
          UNCOVERED SHORTS #{{ $currentGame->id }} 
        </span>
        <div class="boxes-container">
          <div class="box">
            <p id='AverageScore' class="stats-value">
              {{ $statistics['AverageScore'] == intval($statistics['AverageScore']) ? intval($statistics['AverageScore']) : number_format($statistics['AverageScore'], 1) }}
            </p>
            <label>Average <br> score</label>
          </div>
          <div class="box scale">
            <p id='GamesPlayed' class="stats-value">
              {{ $statistics['GamesPlayed'] }}
            </p>
            <label>Games <br> played</label>
          </div>
          <div class="box">
            <p id ="TopScore" class="stats-value">
              {{ $statistics['TopScore'] == intval($statistics['TopScore']) ? intval($statistics['TopScore']) : number_format($statistics['TopScore'], 1) }}
            </p>
            <label>Top <br> score</label>
          </div>
        </div>
      </div>

      <?php
        $shareText = $currentGame->name . ", 0pts 🙄\n0 | 🙄\n0 | 🙄\n0 | 🙄\n0\nPlay at uncoveredshorts.com";
      ?>

      <div class="modal share-container" id='shareModal'>
        <button class="close-modal" onclick=closeModalById('shareModal')>×</button>
        <div class="share-text-container">
          <textarea id='share-text' class="share-text" readonly>{{ $currentGame->name }}, 0pts Q1: 90, Q2: 85, Q3: 90, Q4: 40. Play at uncoveredshorts.com</textarea>
          <button class="copy-btn">COPY</button>
        </div>
      </div>

      <!-- Enter you initial modal -->
      <div class="modal share-container" id='initialModal'>
        <button class="close-modal" onclick=closeModalById('initialModal')>×</button>
        <div class="share-text-container">
          <p class="im-text2">Enter your initials for the leaderboard</p>
          <form action="" id='initialForm' class='initialForm'>
            <input maxlength="3" minlength="3" type="text" name='playerInitial' id='playerInitial' value='' required pattern="[A-Za-z0-9]{3}" title="Please enter 3 valid characters">
            <div class='im-buttons'>
              <button class="copy-btn" type="submit">I’M THE BEST</button>
            </div>
          </form>
        </div>
      </div>

      <script>
        function shareGame() {
          // Générer le texte à copier
          var shareText = "🕵🏼‍♂️ "+currentGameName+", "+playerFinalScore+"pts\n";
          shareText += getEmoji(score1) + " " + score1 + " | " + getEmoji(score2) + " " + score2 +" | " + getEmoji(score3) + " " + score3 +" | " + getEmoji(score4) + " " + score4 +"\n";
          shareText += "🎲 Play at uncoveredshorts.com";

          // Sélectionner les éléments nécessaires'
          var shareTextarea = document.querySelector('.share-text');
          var copyBtn = document.querySelector('.copy-btn');

          shareTextarea.value = shareText;

          copyBtn.addEventListener('click', function() {
            shareTextarea.select();
            document.execCommand('copy');
            copyBtn.textContent = 'Copied';
            copyBtn.classList.add('copied-btn');
          });
        };
        
        // Listen to initial form
        document.getElementById('initialForm').addEventListener('submit', function(event) {
          event.preventDefault(); // Prevent the default form submission (page refresh)

          var playerInitial = document.getElementById('playerInitial').value;

          if (playerInitial.length === 3) {
            
            // Generate a unique identifier
            const currentDateTime = new Date().toISOString().replace(/[^0-9]/g, ""); // Get current datetime in YYYYMMDDHHMMSS format
            const uniqueIdentifier = playerInitial + currentDateTime;

            localStorage.setItem('personalUID', uniqueIdentifier);
            localStorage.setItem('personalInitial', playerInitial);
            
            // Submit score to the Top score leaderboard
            addScoreToLeaderboard(currentGameId, playerFinalScore);
            
            // Submit score to the Steak leaderboard
            addStreakToLeaderboard(currentGameId);

            closeModalById('initialModal');
            setTimeout(function() {
              openModalById('LeaderboardModal');
            }, 600);
          } 
          else 
          {
            alert('Please enter 3 characters.');
          }
        });

        // Function that updates the top score leaderboard html after the new entry
        function updateLeaderboard(leaderboard) {
          for (let i = 0; i < leaderboard.length; i++) {
            document.getElementById(`ranking-initial-${i+1}`).textContent = leaderboard[i].initial;
            document.getElementById(`ranking-score-${i+1}`).textContent = leaderboard[i].total_score;
          }
        }

        // Function that updates the streak score 
        function updateStreakLeaderboard(leaderboard) {
          for (let i = 0; i < leaderboard.length; i++) {
            document.getElementById(`streak-ranking-initial-${i+1}`).textContent = leaderboard[i].initial;
            document.getElementById(`streak-ranking-score-${i+1}`).textContent = leaderboard[i].streak;
          }
        }

        // Function that updates the leaedreboar
        function updatePersonnalizedLeaderboard(leaderboard) {
          for (let i = 0; i < leaderboard.length; i++) {
            document.getElementById(`perso-ranking-initial-${i+1}`).textContent = leaderboard[i].initial;
            document.getElementById(`perso-ranking-score-${i+1}`).textContent = leaderboard[i].total_score;
          }
        }

        // Function that updates the leaedreboar
        function showBlankPersonnalizedLeaderboard(leaderboard) {
          for (let i = 0; i < 5; i++) {
            document.getElementById(`perso-ranking-initial-${i+1}`).textContent = "???";
            document.getElementById(`perso-ranking-score-${i+1}`).textContent = '0';
          }
        }
      </script>
    
      <script src="{{ asset('js/game.js') }}?t={{ time() }}"></script>

      @include('cookie-consent::index');

  </body>
</html>
