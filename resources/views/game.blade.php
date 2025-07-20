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
    <meta name="description" content="Uncovered Shorts is a daily trivia game focused on finance and economics, challenge your friends today.">


  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Uncovered Shorts = A daily challenge of knowledge and risk</title>

    <!-- Open Graph meta tags -->
    <meta property="og:title" content="Uncovered Shorts">
    <meta property="og:description" content="Uncovered Shorts is a daily trivia game focused on finance and economics, challenge your friends today.">
    <meta property="og:image" content="{{ asset('img/square-logo.png') }}">
    <meta property="og:url" content="https://www.uncoveredshorts.com">
    
    <!-- Twitter Card meta tags -->
    <meta name="twitter:card" content="uncovered_shorts_image">
    <meta name="twitter:title" content="Uncovered Shorts">
    <meta name="twitter:description" content="Uncovered Shorts is a daily trivia game focused on finance and economics, challenge your friends today.">
    

    <link rel="stylesheet" href="{{ asset('css/layout.css') }}?t=1.14">
    <link rel="stylesheet" href="{{ asset('css/game.css') }}?t=1.07">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}?t=1.27">

    <!-- Fonts -->
    <link href="https://fonts.cdnfonts.com/css/switzer" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

    <script>
      const forbiddenInitials = @json($forbiddenInitials);
    </script>
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
      <a href='/'>
        <img class='h-logo' src="{{ asset('img/logo.png') }}" alt="uncovered-short-logo">
      </a>
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

        <button class="hl-icon" onclick=openModalById('archiveModal')>
          <svg width="24" height="24" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
            <path d="M17 14C17.5523 14 18 13.5523 18 13C18 12.4477 17.5523 12 17 12C16.4477 12 16 12.4477 16 13C16 13.5523 16.4477 14 17 14Z" fill="#FFFFFF"/>
            <path d="M17 18C17.5523 18 18 17.5523 18 17C18 16.4477 17.5523 16 17 16C16.4477 16 16 16.4477 16 17C16 17.5523 16.4477 18 17 18Z" fill="#FFFFFF"/>
            <path d="M13 13C13 13.5523 12.5523 14 12 14C11.4477 14 11 13.5523 11 13C11 12.4477 11.4477 12 12 12C12.5523 12 13 12.4477 13 13Z" fill="#FFFFFF"/>
            <path d="M13 17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17C11 16.4477 11.4477 16 12 16C12.5523 16 13 16.4477 13 17Z" fill="#FFFFFF"/>
            <path d="M7 14C7.55229 14 8 13.5523 8 13C8 12.4477 7.55229 12 7 12C6.44772 12 6 12.4477 6 13C6 13.5523 6.44772 14 7 14Z" fill="#FFFFFF"/>
            <path d="M7 18C7.55229 18 8 17.5523 8 17C8 16.4477 7.55229 16 7 16C6.44772 16 6 16.4477 6 17C6 17.5523 6.44772 18 7 18Z" fill="#FFFFFF"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M7 1.75C7.41421 1.75 7.75 2.08579 7.75 2.5V3.26272C8.412 3.24999 9.14133 3.24999 9.94346 3.25H14.0564C14.8586 3.24999 15.588 3.24999 16.25 3.26272V2.5C16.25 2.08579 16.5858 1.75 17 1.75C17.4142 1.75 17.75 2.08579 17.75 2.5V3.32709C18.0099 3.34691 18.2561 3.37182 18.489 3.40313C19.6614 3.56076 20.6104 3.89288 21.3588 4.64124C22.1071 5.38961 22.4392 6.33855 22.5969 7.51098C22.75 8.65018 22.75 10.1058 22.75 11.9435V14.0564C22.75 15.8941 22.75 17.3498 22.5969 18.489C22.4392 19.6614 22.1071 20.6104 21.3588 21.3588C20.6104 22.1071 19.6614 22.4392 18.489 22.5969C17.3498 22.75 15.8942 22.75 14.0565 22.75H9.94359C8.10585 22.75 6.65018 22.75 5.51098 22.5969C4.33856 22.4392 3.38961 22.1071 2.64124 21.3588C1.89288 20.6104 1.56076 19.6614 1.40314 18.489C1.24997 17.3498 1.24998 15.8942 1.25 14.0564V11.9436C1.24998 10.1058 1.24997 8.65019 1.40314 7.51098C1.56076 6.33855 1.89288 5.38961 2.64124 4.64124C3.38961 3.89288 4.33856 3.56076 5.51098 3.40313C5.7439 3.37182 5.99006 3.34691 6.25 3.32709V2.5C6.25 2.08579 6.58579 1.75 7 1.75ZM5.71085 4.88976C4.70476 5.02502 4.12511 5.27869 3.7019 5.7019C3.27869 6.12511 3.02502 6.70476 2.88976 7.71085C2.86685 7.88123 2.8477 8.06061 2.83168 8.25H21.1683C21.1523 8.06061 21.1331 7.88124 21.1102 7.71085C20.975 6.70476 20.7213 6.12511 20.2981 5.7019C19.8749 5.27869 19.2952 5.02502 18.2892 4.88976C17.2615 4.75159 15.9068 4.75 14 4.75H10C8.09318 4.75 6.73851 4.75159 5.71085 4.88976ZM2.75 12C2.75 11.146 2.75032 10.4027 2.76309 9.75H21.2369C21.2497 10.4027 21.25 11.146 21.25 12V14C21.25 15.9068 21.2484 17.2615 21.1102 18.2892C20.975 19.2952 20.7213 19.8749 20.2981 20.2981C19.8749 20.7213 19.2952 20.975 18.2892 21.1102C17.2615 21.2484 15.9068 21.25 14 21.25H10C8.09318 21.25 6.73851 21.2484 5.71085 21.1102C4.70476 20.975 4.12511 20.7213 3.7019 20.2981C3.27869 19.8749 3.02502 19.2952 2.88976 18.2892C2.75159 17.2615 2.75 15.9068 2.75 14V12Z" fill="#FFFFFF"/>
          </svg>
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
              <input id='us-ipt1' onclick="updateCurrentSearchQuestion(event), setActivePlayerInput('us-ipt1'), openModalById('searchModal'), displaySuggestions(suggestions1, '{!! $questions[0]->type !!}')"  class='answer' type="text" name="answer" value='' placeholder='ANSWER HERE...' readonly>
              <span id='us-pts1' class='points'>-</span>
            </div>
          </div>

          <div class="question-block">
            <span class="numero">Q2 <b class='letter-type'>U</b></span>
            <h2 class="question" data="{!! $questions[1]->value !!}">{!! $questions[1]->value !!}</h2>
            <div class="answer-block">
              <input id='us-ipt2' onclick="updateCurrentSearchQuestion(event), setActivePlayerInput('us-ipt2'), openModalById('searchModal'), displaySuggestions(suggestions2, '{!! $questions[1]->type !!}')" class='answer' type="text" name="answer" value='' placeholder='ANSWER HERE...' readonly>
              <span id='us-pts2' class='points'>-</span>
            </div>
          </div>

          <div class="question-block">
            <span class="numero">Q3 <b class='letter-type'>R</b></span>
            <h2 class="question" data="{!! $questions[2]->value !!}">{!! $questions[2]->value !!}</h2>
            <div class="answer-block">
              <input id='us-ipt3' onclick="updateCurrentSearchQuestion(event), setActivePlayerInput('us-ipt3'), openModalById('searchModal'), displaySuggestions(suggestions3,'{!! $questions[2]->type !!}')" class='answer' type="text" name="answer" value='' placeholder='ANSWER HERE...' readonly>
              <span id='us-pts3' class='points'>-</span>
            </div>
          </div>

          <div class="question-block">
            <span class="numero">Q4 <b class='letter-type'>R</b></span>
            <h2 class="question" data="{!! $questions[3]->value !!}">{!! $questions[3]->value !!}</h2>
            <div class="answer-block">
              <input id='us-ipt4' onclick="updateCurrentSearchQuestion(event), setActivePlayerInput('us-ipt4'), openModalById('searchModal'), displaySuggestions(suggestions4,'{!! $questions[3]->type !!}')" class='answer' type="text" name="answer" value='' placeholder='ANSWER HERE...' readonly>
              <span id='us-pts4' class='points'>-</span>
            </div>
          </div>
        </div>
      </div>
    </main>

    <footer>
      <div class="footer-s1">© 2025 Uncovered Shorts</div>
      <div class="footer-s2">
        <?xml version="1.0" encoding="iso-8859-1"?>
          <span class="folllow-us">Find us on</span>
          <span style='display:flex;flex-direction:row;align-items: center;'>
            <a href="https://www.instagram.com/uncoveredshorts/" target='_blank'>
              <svg role="img" viewBox="0 0 24 24" height="25px" width="30px" fill='white' xmlns="http://www.w3.org/2000/svg"><title>Instagram</title><path d="M7.0301.084c-1.2768.0602-2.1487.264-2.911.5634-.7888.3075-1.4575.72-2.1228 1.3877-.6652.6677-1.075 1.3368-1.3802 2.127-.2954.7638-.4956 1.6365-.552 2.914-.0564 1.2775-.0689 1.6882-.0626 4.947.0062 3.2586.0206 3.6671.0825 4.9473.061 1.2765.264 2.1482.5635 2.9107.308.7889.72 1.4573 1.388 2.1228.6679.6655 1.3365 1.0743 2.1285 1.38.7632.295 1.6361.4961 2.9134.552 1.2773.056 1.6884.069 4.9462.0627 3.2578-.0062 3.668-.0207 4.9478-.0814 1.28-.0607 2.147-.2652 2.9098-.5633.7889-.3086 1.4578-.72 2.1228-1.3881.665-.6682 1.0745-1.3378 1.3795-2.1284.2957-.7632.4966-1.636.552-2.9124.056-1.2809.0692-1.6898.063-4.948-.0063-3.2583-.021-3.6668-.0817-4.9465-.0607-1.2797-.264-2.1487-.5633-2.9117-.3084-.7889-.72-1.4568-1.3876-2.1228C21.2982 1.33 20.628.9208 19.8378.6165 19.074.321 18.2017.1197 16.9244.0645 15.6471.0093 15.236-.005 11.977.0014 8.718.0076 8.31.0215 7.0301.0839m.1402 21.6932c-1.17-.0509-1.8053-.2453-2.2287-.408-.5606-.216-.96-.4771-1.3819-.895-.422-.4178-.6811-.8186-.9-1.378-.1644-.4234-.3624-1.058-.4171-2.228-.0595-1.2645-.072-1.6442-.079-4.848-.007-3.2037.0053-3.583.0607-4.848.05-1.169.2456-1.805.408-2.2282.216-.5613.4762-.96.895-1.3816.4188-.4217.8184-.6814 1.3783-.9003.423-.1651 1.0575-.3614 2.227-.4171 1.2655-.06 1.6447-.072 4.848-.079 3.2033-.007 3.5835.005 4.8495.0608 1.169.0508 1.8053.2445 2.228.408.5608.216.96.4754 1.3816.895.4217.4194.6816.8176.9005 1.3787.1653.4217.3617 1.056.4169 2.2263.0602 1.2655.0739 1.645.0796 4.848.0058 3.203-.0055 3.5834-.061 4.848-.051 1.17-.245 1.8055-.408 2.2294-.216.5604-.4763.96-.8954 1.3814-.419.4215-.8181.6811-1.3783.9-.4224.1649-1.0577.3617-2.2262.4174-1.2656.0595-1.6448.072-4.8493.079-3.2045.007-3.5825-.006-4.848-.0608M16.953 5.5864A1.44 1.44 0 1 0 18.39 4.144a1.44 1.44 0 0 0-1.437 1.4424M5.8385 12.012c.0067 3.4032 2.7706 6.1557 6.173 6.1493 3.4026-.0065 6.157-2.7701 6.1506-6.1733-.0065-3.4032-2.771-6.1565-6.174-6.1498-3.403.0067-6.156 2.771-6.1496 6.1738M8 12.0077a4 4 0 1 1 4.008 3.9921A3.9996 3.9996 0 0 1 8 12.0077"/></svg>
            <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
            </a>
            <a href="https://x.com/UncoveredShorts" target='_blank'>
              <svg role="img" viewBox="0 0 24 24" height="25px" width="30px" fill='white' xmlns="http://www.w3.org/2000/svg"><title>X</title><path d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932ZM17.61 20.644h2.039L6.486 3.24H4.298Z"/></svg>
              <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
            </a>
          </span>
      </div>
    </footer>

    <!-- Modals --> 
      <div class="modal" id="gameOverModal">
        <button class="close-modal" onclick=closeModalById('gameOverModal')>×</button>
        <div class="go-box">
          <img src="{{ asset('img/logo.png') }}" width='180' alt="uncovered-shorts-logo" class="gameOverLogo">
          <p class="go-text"><b id="congrats-text">Your score {{ $is_valid_for_streak == 1 ? 'today:' : '' }}</b></p>
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
            <label for="">Get a recap of the most popular answers</label> <br>
            
            <form id='subscribe-form' class="row sf-form" method="POST">
              <input class='sf-email' name='sf-email' type="email" placeholder="Your email...">
              <input class='sf-submit' type="submit" value="I'm In!">
            </form>
            <div id="sf-message" class="sf-message" style="color: rgb(202, 59, 59); display: none;"></div> 
            <!--
            <div id="custom-substack-embed" style='margin-top:15px;'></div> 
            -->

            <script>
              window.CustomSubstackWidget = {
                substackUrl: "uncoveredshorts.substack.com",
                placeholder: "Your email...",
                buttonText: "I'm In!",
                theme: "custom",
                colors: {
                  primary: "#487349",
                  input: "#FFFFFF",
                  email: "#2E2E2E",
                  text: "#FFFFFF",
                },

                // Go to substackapi.com to unlock custom redirect

              };
            </script>
            <script src="https://substackapi.com/widget.js" async></script>
          </div>
          <div id="go-bestanswers" class="go-bestanswers">
            <p class="go-text"><b id="q1">{!! $questions[0]->value !!} <br> (BEST ANSWERS)</b></p>
            <span class='go-best-answer'><b>#1 :</b> {{ $uniqueAnswers1[0]->value ?? '-' }}</span>
            <span class='go-best-answer'><b>#2 :</b> {{ $uniqueAnswers1[1]->value ?? '-' }}</span>
            <span class='go-best-answer'><b>#3 :</b> {{ $uniqueAnswers1[2]->value ?? '-' }}</span>
          </div>
          <br>
          <div  class="go-bestanswers">
            <p class="go-text"><b id="q2">{!! $questions[1]->value !!} <br> (BEST ANSWERS)</b></p>
            <span class='go-best-answer'><b>#1 :</b> {{ $uniqueAnswers2[0]->value ?? '-' }}</span>
            <span class='go-best-answer'><b>#2 :</b> {{ $uniqueAnswers2[1]->value ?? '-' }}</span>
            <span class='go-best-answer'><b>#3 :</b> {{ $uniqueAnswers2[2]->value ?? '-' }}</span>
          </div>
          <br>
          <div class="go-bestanswers">
            <p class="go-text"><b id="q3">{!! $questions[2]->value !!}</b></p>
            <span class='go-best-answer'><b>#1 :</b> {{ $rankedAnswers3[0]->value ?? '-' }}</span>
            <span class='go-best-answer'><b>#2 :</b> {{ $rankedAnswers3[1]->value ?? '-' }}</span>
            <span class='go-best-answer'><b>#3 :</b> {{ $rankedAnswers3[2]->value ?? '-' }}</span>
          </div>
          <br>
          <div class="go-bestanswers">
            <p class="go-text"><b id="q4">{!! $questions[3]->value !!}</b></p>
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
                <div id='classic-lb-row-{{ $i }}' class="ranking-row @if($i % 2 != 0) rr-dark @endif">
                  <span class="ranking-number">#{{ $i + 1 }}</span>
                  <span class="ranking-initial" id="ranking-initial-{{ $i + 1 }}">{{ $leaderboard1[$i]->initial ?? 'N/A' }}</span>
                  <span class="ranking-score" id="ranking-score-{{ $i + 1 }}">{{ $leaderboard1[$i]->total_score ?? 'N/A' }}</span>
                
                  <script>
                    // Si l'uid est similaire au localstorage uid, surligner en vert
                    var uniqueIdentifier = "{{ $leaderboard1[$i]->unique_identifier }}"
                    if (localStorage.getItem('personalUID') === uniqueIdentifier) {
                      document.getElementById('classic-lb-row-{{ $i }}').classList.add('highlight-green');
                    }
                  </script>  
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
                <div id='streak-lb-row-{{ $i }}' class="ranking-row @if($i % 2 != 0) rr-dark @endif">
                  <span class="ranking-number">#{{ $i + 1 }}</span>
                  <span class="ranking-initial" id="streak-ranking-initial-{{ $i + 1 }}">{{ $leaderboard2streak[$i]->initial ?? 'N/A' }}</span>
                  <span class="ranking-score" id="streak-ranking-score-{{ $i + 1 }}">{{ $leaderboard2streak[$i]->streak ?? 'N/A' }}</span>
                </div>

                <script>
                  // Si l'uid est similaire au localstorage uid, surligner en vert
                  var uniqueIdentifier = "{{ $leaderboard2streak[$i]->unique_identifier }}"
                  
                  if (localStorage.getItem('personalUID') === uniqueIdentifier) {
                    document.getElementById('streak-lb-row-{{ $i }}').classList.add('highlight-green');
                  }
                </script>  
              @endfor
            </div>
          </div>

        </div>
      </div>

    <div class="modal-background" id="modalBackground">

      <script>
        document.addEventListener('DOMContentLoaded', function () {

            document.querySelectorAll('.sf-form').forEach(form => {
              form.addEventListener('submit', function (e) {
                e.preventDefault();
        
                const email = document.querySelector('input[name="sf-email"]').value;
                const token = '{{ csrf_token() }}';
                const messageDiv = document.getElementsByClassName('sf-message');
        
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
                  messageDiv[0].style.display = 'block';
                  messageDiv[1].style.display = 'block';
                  if (data.status === 'success') {
                    messageDiv[0].style.color = '#78ad7a';
                    messageDiv[0].textContent = data.message;
                    
                    messageDiv[1].style.color = '#78ad7a';
                    messageDiv[1].textContent = data.message;
                  } else {
                      messageDiv[0].style.color = '#d55353';
                      messageDiv[0].textContent = data.message;
                      
                      messageDiv[1].style.color = '#d55353';
                      messageDiv[1].textContent = data.message;
                  }
                })
                .catch(error => {
                  messageDiv[0].style.display = 'block';
                  messageDiv[0].style.color = '#d55353';
                  messageDiv[0].textContent = 'An unexpected error occurred. Please try again.';
                  
                  messageDiv[1].style.display = 'block';
                  messageDiv[1].style.color = '#d55353';
                  messageDiv[1].textContent = 'An unexpected error occurred. Please try again.';
                  console.error('Error:', error);
                });
              });
            });
        });
        </script>

      <!-- ARCHIVE -->
      <div class="modal" id="archiveModal">
        <button class="close-modal" onclick=closeModalById('archiveModal')>×</button>
        <img class='lb-logo' src="{{ asset('img/logo.png') }}" width='180' alt="uncovered-shorts-logo">

        <div class="list-archive">
          <p class="archive-text"><b>PREVIOUS GAMES</b></p>
          <table class='table-archive'>
            <thead>
              <tr>
                <th>GAME</th>
                <th>DATE</th>
                <th>PLAY</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($archiveGames as $archiveGame)
                <tr>
                  <td>
                    @if (Str::contains(strtolower($archiveGame->name), 'shorts'))
                        US#{{ preg_replace('/[^0-9]/', '', $archiveGame->name) }}
                    @else
                        Leisure#{{ preg_replace('/[^0-9]/', '', $archiveGame->name) }}
                    @endif
                  </td>
                  <td>{{ date('Y-m-d', strtotime($archiveGame->date_start)) }}</td>
                  <td><a href="{{ route('index', ['game_id' => $archiveGame->id]) }}" class="game-link" data-game-id="{{ $archiveGame->id }}">Play now</a></td>
                </tr>
              @endforeach
            </tbody>
        </table>
        </div>
      </div>

      <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sélectionner tous les liens avec la classe "game-link"
            document.querySelectorAll('.game-link').forEach(function(link) {
                let gameId = link.getAttribute('data-game-id');
                let cookieName = 'Game_' + gameId;

                // Vérifier si le cookie existe
                if (getCookie(cookieName)) {
                    link.textContent = 'Completed';
                }
            });

            // Scripts pour Maj les cookies individuellement - ATTENTION
            if(localStorage.getItem('personalUID') === 'HDD20240718163030266')
            {
              //console.log("Script injected");
              //localStorage.setItem('personalAverage', 218);  
              //localStorage.setItem('personalStreak', 58); 
            }
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
        
        var currentGameId = {!! $currentGame->id !!}
        //console.log('curent = '+currentGameId);
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

        // S'il n'y a pas de jeu auparavant mettre un id random pour eviter les erreurs 
        var previousGameID = {{ $previousGame ? $previousGame->id : 9999999 }};

        var is_valid_for_streak = {{ $is_valid_for_streak }};

        // Si c'est un jeu d'archive, on verifie pas si c'est un streak avec le jeu precedent 
        if(is_valid_for_streak == 1) 
        {
          verifyStreak();
        }
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


            // CHECK IF USER HAS ALREADY PLAYED WITH THE COOKIE GAME_GAMEID
            // THE COOKIE STORES THE GAME_PLAYED GAMEID

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
            
            // THE PLAYER DID NOT PLAY THE GAME YET
            else
            {
              // Count how many answers are already completed
              document.getElementById('go-percentile').innerHTML = '(0%)';
              autoPopulateAlreadyAnswered();
              
              answerCount = document.querySelectorAll('.points-set').length;

              // Si le player a deja complete les 4 reponses mais
              // il n'y a pas encore de localStorage Game donc pas encore submit
              if(answerCount == 4)
              {
                gameOver();
              }
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

          //console.log(index +' : ' + localStorage.getItem('Answer_' + index + '_Game_' + currentGameId));
        }

        //console.log(currentGameId);
        //console.log('P1 :' +localStorage.getItem('Points_1_Game_' + currentGameId))
        //console.log('P2 :' +localStorage.getItem('Points_2_Game_' + currentGameId))
        //console.log('P3 :' +localStorage.getItem('Points_3_Game_' + currentGameId))
        //console.log('P4 :' +localStorage.getItem('Points_4_Game_' + currentGameId))

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

        function displaySuggestions(suggestions, type = 'default') 
        {          
          currentSuggestions = suggestions;
          var suggestionsContainer = document.getElementById('suggestions');
          var searchInput = document.getElementById('us-search');
          suggestionsContainer.innerHTML = '';
          searchInput.value = '';
          searchInput.style.display = 'initial'; 

          // Afficher toutes les suggestions si toutes c'est un ranked few ou unique-few
          if(type == 'ranked-few' || type == 'unique-few')
          {
            // cacher la barre de recherche
            searchInput.style.display = 'none'; 

            //alert('ranked-few');
            currentSuggestions.forEach(text => {
              // Créer l'élément de suggestion et l'ajouter au conteneur
              var span = document.createElement('span');
              span.className = 'single-suggestion';
              span.innerHTML = '<p>' + text + '</p><button onclick=selectSuggestion(event) data-value="'+ text.replace(/"/g, '&quot;') +'" data-inputTargetId="'+ activePlayerInput +'" class="selectButton">Select</button>';
              suggestionsContainer.appendChild(span);
            });
          }
          else{  
          // auto focus on input
            searchInput.focus();
            searchInput.select();
          }
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

          // Mettre la reponse selectionnée dans le input et desactiver le input
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
          storeGameSession(currentGameId, score1, score2, score3, score4, playerFinalScore, is_valid_for_streak)
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

            // verify if it's a streak, if yes add 1 streak point
            if(is_valid_for_streak == 1)
            {
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
            }

            // LEADERBOARD Feature

            // Verify if the player made it to the daily score top 10
            // He made it
            
            // Player never submitted his initials, ask him and then add his score
            if(localStorage.getItem('personalInitial') == null || localStorage.getItem('personalInitial') == "???")
            {
              openModalById('initialModal');
              var initialInput = document.getElementById('playerInitial');
              initialInput.focus();

              // function already called - addScoreToLeaderboard(currentGameId, playerFinalScore);
            }

            // If player has a forbidden nickname 
            // Player never submitted his initials, ask him and then add his score
            if(forbiddenInitials.includes(localStorage.getItem('personalInitial').toUpperCase()))
            {
              openModalById('initialModal');
              var initialInput = document.getElementById('playerInitial');
              initialInput.focus();

              // function already called - addScoreToLeaderboard(currentGameId, playerFinalScore);
            }

            // Player already have initials
            else
            {
              // Ajouter le nouveau score dans le group leaderboard
              addScoreToLeaderboard(currentGameId, playerFinalScore).then(response => {
                // Une fois le score ajouté, on peut avoir le classement par groupe actualisé
                changeScoreGroupLeaderboard(currentGameId, localStorage.getItem('personalLeaderboardGroup'));
              })
              .catch(error => {
                  console.error('Erreur 879 add Score:', error);
              });
            }
            
            /* Si le joueur a deja des initiales, enregistrer ses Streaks */
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
          // Utilise pour resoummettre les reponses si null
          var questions = {!! $questions !!};

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

                  // Dans le cas ou le score est null 
                  if(score1 == null)
                  {
                    // Recalculer le score en renvoyant sa reponse
                    score1 = calculateUniquePoints(uniqueAnswers1, localStorage.getItem('Answer_1_Game_'+currentGameId), questions[0].id);
                    localStorage.setItem('Points_1_Game_' + currentGameId, score1);
                  }
                  element.classList.add('points-' + Math.round(score1 / 5) * 5);
                  element.innerHTML = '' + score1;
                  
                  break;
                case 'us-pts2': 
                  score2 = localStorage.getItem('Points_2_Game_'+currentGameId);

                  if(score2 == null)
                  {
                    // Recalculer le score en renvoyant sa reponse
                    score2 = calculateUniquePoints(uniqueAnswers2, localStorage.getItem('Answer_2_Game_'+currentGameId), questions[1].id);
                    localStorage.setItem('Points_1_Game_' + currentGameId, score2);
                  }

                  element.classList.add('points-' + Math.round(score2 / 5) * 5);
                  element.innerHTML = '' + score2;
                  break;
                case 'us-pts3': 
                  score3 = localStorage.getItem('Points_3_Game_'+currentGameId);

                  if(score3 == null)
                  {
                    // Recalculer le score en renvoyant sa reponse
                    score3 = calculateUniquePoints(uniqueAnswers3, localStorage.getItem('Answer_3_Game_'+currentGameId), questions[2].id);
                    localStorage.setItem('Points_1_Game_' + currentGameId, score3);
                  }

                  element.classList.add('points-' + Math.round(score3 / 5) * 5);
                  element.innerHTML = '' + score3;
                  break;
                case 'us-pts4': 
                  score4 = localStorage.getItem('Points_4_Game_'+currentGameId);

                  if(score4 == null)
                  {
                    // Recalculer le score en renvoyant sa reponse
                    score4 = calculateUniquePoints(uniqueAnswers4, localStorage.getItem('Answer_4_Game_'+currentGameId), questions[3].id);
                    localStorage.setItem('Points_4_Game_' + currentGameId, score4);
                  }

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
        <button class="close-modal" onclick="closeModalById('rulesModal'); checkAllCheckboxes()">×</button>
        <h3>INFO</h3>
        <div class="rules-text accordeon">
        <ul>
          <li>
            <input type="checkbox" class='info-checkbox' checked>
            <i class="arrow"></i>
            <div class="col">
              <i class="fas fa-list"></i>
              <h2 class="title_accordeon">How to Play</h2>
            </div>
            <p>
              • You only get one guess per question
              <br>
              • Answers score from 0 to 100
              <br>
              • Scoring for Questions 1 & 2 is based on the "Uniqueness" of your answer compared to other players' answers
              <br>
              • Scoring for Questions 3 & 4 is based on the objective "Rank" of your answer on a set ranked list
              <br>
              • After you play, you'll see the correct answers and today's leaderboard
              <br>
              <br>
              <b>Example "Unique" Question (Q1 & Q2)</b>
              <br>
              <img style="max-width: 340px;" src="{{ asset('img/how1.png') }}" alt="how-to-play-1">
              <br>
              <img style="max-width: 340px;" src="{{ asset('img/how2.png') }}" alt="how-to-play-2">
              <br>
              Explanation:
              <br>
              • Pfizer, while correct, only scored 76 points because it was a popular guess
              <br>
              • Gilead Sciences scored 99 points as it was a very "unique" answer, meaning few (if any) other players guessed it
              <br>
              <br>
              <b>Example "Ranked List" Question (Q3 & Q4)</b>
              <br>
              <img style="max-width: 340px;" src="{{ asset('img/how3.png') }}" alt="how-to-play-3">
              <br>
              <img style="max-width: 340px;" src="{{ asset('img/how4.png') }}" alt="how-to-play-4">
              <br>
              Explanation:
              <br>
              • Blackrock was the correct answer and scored 100 points.
              <br>
              • Coca Cola was the second highest ranked answer on the ranked list and scored 90 points
              <br>
              • Estee Lauder was not in the top 10 but still received some points for the attempt
              <br>
              <br>
              <b>Pro Tips</b>
              <br>
              • Blackrock was the correct answer and scored 100 points.
              <br>
              • When answer choices are not shown, you can type in a letter to see possible answer choices
              <br>
              • We want you to think through possible options and use your intuition, there's no reward for cheating with Google
              <br>
              <br>
              <a href="{{ route('terms-of-service') }}">Terms of Service</a>
              <br>
              </p>
            </li>
            <li>
                <input type="checkbox" class='info-checkbox' checked>
                <i class="arrow"></i>
                <div class="col">
                  <i class="fas fa-users"></i>
                  <h2 class="title_accordeon">Create a Group Leaderboard</h2>
                </div>
                <p>There are groups of colleagues, family members, friends and alumni all competing with each other via their own Group Leaderboards that show directly below the main leaderboard.  
                  You can create your own by emailing <a href='mailto:tucker@uncoveredshorts.com'>tucker@uncoveredshorts.com</a> with the name of your Group Leaderboard.  
                </p>
            </li>
            <li>
                <input type="checkbox" class='info-checkbox' checked>
                <i class="arrow"></i>
                <div class="col">
                  <i class="fas fa-calendar"></i>
                  <h2 class="title_accordeon">Explore the Games Archive</h2>
                </div>
                <p>The top right icon on the main page allows you to play any game from the last few months.  
                </p>
            </li>
          <li>
            <input type="checkbox" class='info-checkbox' checked>
            <i class="arrow"></i>
            <div class="col">
              <i class="fas fa-info-circle"></i>
              <h2 class="title_accordeon">About</h2>
            </div>
            <p>Uncovered Shorts is a daily trivia game focused on finance and economics 
              during the week, with leisure questions on the weekend.  
            </p>
        </li>
        </ul>

          <!--
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
          <a href="{{ route('terms-of-service') }}">Terms of Service</a> -->
        </div>
        <button class="play" onclick="closeModalById('rulesModal'), checkAllCheckboxes()">PLAY</button>
      </div>  
      
      <script>

        // Pour fermer tous les toggles en fermant la section info
        function checkAllCheckboxes() {
            // Récupère tous les éléments ayant la classe 'info-checkbox'
            var checkboxes = document.getElementsByClassName('info-checkbox');
            
            // Parcourt chaque checkbox
            for (var i = 0; i < checkboxes.length; i++) {
                if (!checkboxes[i].checked) {
                    // Si la checkbox n'est pas cochée, on la coche
                    checkboxes[i].checked = true;
                }
            }

            // Cacher le formulaire
            // var infoSignup = document.getElementsByClassName('info-signup')[0];
            // infoSignup.style.display = 'none';
        }
      </script>

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
          <div style="display:flex; justify-content: center; gap: 20px; flex-direction: row;">
            <button class="copy-btn">COPY</button>
            <button id="twitterBtn" class="copy-btn btn-x">SHARE ON <img width="18" src="{{ asset('img/x_2025.png') }}" style="margin-left:5px;"></button>
          </div>
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

      <!-- An error occured modal -->
      <div class="modal container" id='errorModal'>
        <button class="close-modal" onclick=closeModalById('errorModal')>×</button>
        <div class="error-container">
          <div class="error-icon">
            <?xml version="1.0" encoding="utf-8"?><!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
            <svg width="50px" height="50px" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.493 0.015 C 7.442 0.021,7.268 0.039,7.107 0.055 C 5.234 0.242,3.347 1.208,2.071 2.634 C 0.660 4.211,-0.057 6.168,0.009 8.253 C 0.124 11.854,2.599 14.903,6.110 15.771 C 8.169 16.280,10.433 15.917,12.227 14.791 C 14.017 13.666,15.270 11.933,15.771 9.887 C 15.943 9.186,15.983 8.829,15.983 8.000 C 15.983 7.171,15.943 6.814,15.771 6.113 C 14.979 2.878,12.315 0.498,9.000 0.064 C 8.716 0.027,7.683 -0.006,7.493 0.015 M8.853 1.563 C 9.967 1.707,11.010 2.136,11.944 2.834 C 12.273 3.080,12.920 3.727,13.166 4.056 C 13.727 4.807,14.142 5.690,14.330 6.535 C 14.544 7.500,14.544 8.500,14.330 9.465 C 13.916 11.326,12.605 12.978,10.867 13.828 C 10.239 14.135,9.591 14.336,8.880 14.444 C 8.456 14.509,7.544 14.509,7.120 14.444 C 5.172 14.148,3.528 13.085,2.493 11.451 C 2.279 11.114,1.999 10.526,1.859 10.119 C 1.618 9.422,1.514 8.781,1.514 8.000 C 1.514 6.961,1.715 6.075,2.160 5.160 C 2.500 4.462,2.846 3.980,3.413 3.413 C 3.980 2.846,4.462 2.500,5.160 2.160 C 6.313 1.599,7.567 1.397,8.853 1.563 M7.706 4.290 C 7.482 4.363,7.355 4.491,7.293 4.705 C 7.257 4.827,7.253 5.106,7.259 6.816 C 7.267 8.786,7.267 8.787,7.325 8.896 C 7.398 9.033,7.538 9.157,7.671 9.204 C 7.803 9.250,8.197 9.250,8.329 9.204 C 8.462 9.157,8.602 9.033,8.675 8.896 C 8.733 8.787,8.733 8.786,8.741 6.816 C 8.749 4.664,8.749 4.662,8.596 4.481 C 8.472 4.333,8.339 4.284,8.040 4.276 C 7.893 4.272,7.743 4.278,7.706 4.290 M7.786 10.530 C 7.597 10.592,7.410 10.753,7.319 10.932 C 7.249 11.072,7.237 11.325,7.294 11.495 C 7.388 11.780,7.697 12.000,8.000 12.000 C 8.303 12.000,8.612 11.780,8.706 11.495 C 8.763 11.325,8.751 11.072,8.681 10.932 C 8.616 10.804,8.460 10.646,8.333 10.580 C 8.217 10.520,7.904 10.491,7.786 10.530 " stroke="none" fill-rule="evenodd" fill="#ffffff"></path></svg>
          </div>
          <p class="im-text2">An error occurred. <br> Please refresh the page.</p>
          <button class="copy-btn" type="submit" onclick="location.reload();">REFRESH</button>
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

          // Bouton de partage classique
          copyBtn.addEventListener('click', function() {
            shareTextarea.select();
            document.execCommand('copy');
            copyBtn.textContent = 'Copied';
            copyBtn.classList.add('copied-btn');
          });

          // Bouton de partage X
          var twitterBtn = document.getElementById('twitterBtn');
          twitterBtn.onclick = function () {
              var tweetUrl = "https://twitter.com/intent/tweet?text=" + encodeURIComponent(shareText);
              window.open(tweetUrl, '_blank');
          };
        };
        
        // Listner le formulaire pour entrer les initiales
        document.getElementById('initialForm').addEventListener('submit', function(event) {
          event.preventDefault(); // Prevent the default form submission (page refresh)

          var playerInitial = document.getElementById('playerInitial').value.toUpperCase();

          if (playerInitial.length === 3) {

            // Vérifier si la valeur fait partie des initiales interdites
            if (forbiddenInitials.includes(playerInitial)) {
              alert("The initials you entered are not allowed.");
            }
            else
            {
              // Generate a unique identifier
              const currentDateTime = new Date().toISOString().replace(/[^0-9]/g, ""); // Get current datetime in YYYYMMDDHHMMSS format
              const uniqueIdentifier = playerInitial + currentDateTime;

              // Verifier si l'id existe deja pour ceux qui avaient un initial problematique, on change juste les initiales
              if(localStorage.getItem('personalUID') == null) 
              {
                localStorage.setItem('personalUID', uniqueIdentifier);
              }
              localStorage.setItem('personalInitial', playerInitial);
              
              // Submit score to the Top score leaderboard
              addScoreToLeaderboard(currentGameId, playerFinalScore).then(response => {
                // Une fois le score ajouté, on peut avoir le classement par groupe actualisé
                changeScoreGroupLeaderboard(currentGameId, localStorage.getItem('personalLeaderboardGroup'));
              }).catch(error => {
                  console.error('Erreur 1144 add Score:', error);
              });
              
              // Submit score to the Steak leaderboard
              addStreakToLeaderboard(currentGameId);

              // Ajouter score dans le group leaderboard
              changeScoreGroupLeaderboard(currentGameId, localStorage.getItem('personalLeaderboardGroup'));

              closeModalById('initialModal');
              setTimeout(function() {
                openModalById('LeaderboardModal');
              }, 600);
            }
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

            let myRow = document.getElementById(`ranking-initial-${i+1}`).closest('.ranking-row');

            // colorer le row en vert si c'est l'initial du joueur
            if(localStorage.getItem('personalUID') === leaderboard[i].unique_identifier)
            {
              myRow.classList.add('highlight-green');
            }
            else  myRow.classList.remove('highlight-green');
          }
        }

        // Function that updates the streak score 
        function updateStreakLeaderboard(leaderboard) {
          for (let i = 0; i < leaderboard.length; i++) {
            document.getElementById(`streak-ranking-initial-${i+1}`).textContent = leaderboard[i].initial;
            document.getElementById(`streak-ranking-score-${i+1}`).textContent = leaderboard[i].streak;
            
            let myRow = document.getElementById(`streak-ranking-initial-${i+1}`).closest('.ranking-row');

            // colorer le row en vert si c'est l'initial du joueur
            if(localStorage.getItem('personalUID') === leaderboard[i].unique_identifier)
            {
              myRow.classList.add('highlight-green');
            }
            else  myRow.classList.remove('highlight-green');
          }
        }

        // Function that updates the leaedreboar
        function updatePersonnalizedLeaderboard(leaderboard) {
          for (let i = 0; i < leaderboard.length; i++) {
            document.getElementById(`perso-ranking-initial-${i+1}`).textContent = leaderboard[i].initial;
            document.getElementById(`perso-ranking-score-${i+1}`).textContent = leaderboard[i].total_score;
            
            let myRow = document.getElementById(`perso-ranking-initial-${i+1}`).closest('.ranking-row');

            // colorer le row en vert si c'est l'initial du joueur
            if(localStorage.getItem('personalUID') === leaderboard[i].unique_identifier)
            {
              myRow.classList.add('highlight-green');
            }
            else  myRow.classList.remove('highlight-green');
          }
        }

        // Function that updates the leaedreboar
        function showBlankPersonnalizedLeaderboard(leaderboard) {
          for (let i = 0; i < 5; i++) {
            document.getElementById(`perso-ranking-initial-${i+1}`).textContent = "???";
            document.getElementById(`perso-ranking-score-${i+1}`).textContent = '0';
          
            let myRow = document.getElementById(`perso-ranking-initial-${i+1}`).closest('.ranking-row');

            // colorer le row en vert si c'est l'initial du joueur
            if(localStorage.getItem('personalUID') === leaderboard[i].unique_identifier)
            {
              myRow.classList.add('highlight-green');
            }
            else  myRow.classList.remove('highlight-green');
          }
        }
      </script>
    
      <script src="{{ asset('js/game.js') }}?t={{ time() }}"></script>

      @include('cookie-consent::index');

  </body>
</html>
