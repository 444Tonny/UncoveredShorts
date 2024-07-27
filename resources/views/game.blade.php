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
    
    <!-- Twitter Card meta tags -->
    <meta name="twitter:card" content="uncovered_shorts_image">
    <meta name="twitter:title" content="Uncovered Shorts">
    <meta name="twitter:description" content="Uncovered Shorts : The goal of the game is to get the highest score possible. You will be presented with four questions, which will be of two question types 'Unique' and 'Ranked' ">
    

    <link rel="stylesheet" href="{{ asset('css/layout.css') }}?t=<?php now() ?>">
    <link rel="stylesheet" href="{{ asset('css/game.css') }}?t=1.01">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}?t=<?php now() ?>">

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
            <button class="go-share" onclick="openModalById('shareinitialModal'), shareGame()">SHARE</button>
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

    <div class="modal-background" id="modalBackground">

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
            <form action="">
              <select name='playerGroup' id='playerGroup' required>
                <option value="Group Leaderboard" disabled selected>Group Leaderboard</option>
                <option value="No Group">No Group</option>
                @foreach ($leaderboardGroups as $group)
                    <option value="{{ $group->category_name }}">{{ $group->category_name }}</option>
                @endforeach
              </select>
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
              alert(localStorage.getItem('personalInitial'));
              addStreakToLeaderboard(currentGameId); 
            }

            // Check if user has already played, if yes show results without the close button

            // if visitor already played and finished/submitted his game
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
        
        /* Search */
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
              alert(localStorage.getItem('personalInitial'))
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
