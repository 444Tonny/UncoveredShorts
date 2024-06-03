<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Uncovered Shorts</title>

    <!-- Open Graph meta tags -->
    <meta property="og:title" content="Uncovered Shorts">
    <meta property="og:description" content="The goal of the game is to get the highest score possible. You will be presented with four questions, which will be of two question types 'Unique' and 'Ranked'">
    <meta property="og:image" content="{{ asset('img/logo.png') }}">
    <meta property="og:url" content="https://www.uncoveredshorts.com">
    
    <!-- Twitter Card meta tags -->
    <meta name="twitter:card" content="uncovered_shorts_image">
    <meta name="twitter:title" content="Uncovered Shorts">
    <meta name="twitter:description" content="The goal of the game is to get the highest score possible. You will be presented with four questions, which will be of two question types 'Unique' and 'Ranked' ">
    

    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/game.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}?t={{ time() }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.typekit.net/eki0tyr.css">
    <link href="https://fonts.cdnfonts.com/css/switzer" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
  </head>

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

        <button class='hl-icon' onclick=openModalById('feedbackModal')> 
          <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="22" height="22"><path d="m13.5,10.5c0,.828-.672,1.5-1.5,1.5s-1.5-.672-1.5-1.5.672-1.5,1.5-1.5,1.5.672,1.5,1.5Zm3.5-1.5c-.828,0-1.5.672-1.5,1.5s.672,1.5,1.5,1.5,1.5-.672,1.5-1.5-.672-1.5-1.5-1.5Zm-10,0c-.828,0-1.5.672-1.5,1.5s.672,1.5,1.5,1.5,1.5-.672,1.5-1.5-.672-1.5-1.5-1.5Zm17-5v12c0,2.206-1.794,4-4,4h-2.852l-3.848,3.18c-.361.322-.824.484-1.292.484-.476,0-.955-.168-1.337-.507l-3.749-3.157h-2.923c-2.206,0-4-1.794-4-4V4C0,1.794,1.794,0,4,0h16c2.206,0,4,1.794,4,4Zm-2,0c0-1.103-.897-2-2-2H4c-1.103,0-2,.897-2,2v12c0,1.103.897,2,2,2h3.288c.235,0,.464.083.645.235l4.048,3.41,4.171-3.416c.179-.148.404-.229.637-.229h3.212c1.103,0,2-.897,2-2V4Z"/></svg>
        </button>
      </div>
    </header>

    <main>
      <div class='game-section'>
        <div class="game-block">
          <div class="question-block">
            <span class="numero">Q1</span>
            <h2 class="question">{!! $questions[0]->value !!}</h2>
            <div class="answer-block">
              <input id='us-ipt1' onclick="setActivePlayerInput('us-ipt1'), openModalById('searchModal'), displaySuggestions(suggestions1)"  class='answer' type="text" name="answer" value='' placeholder='ANSWER HERE...' readonly>
              <span id='us-pts1' class='points'>-</span>
            </div>
          </div>

          <div class="question-block">
            <span class="numero">Q2</span>
            <h2 class="question">{!! $questions[1]->value !!}</h2>
            <div class="answer-block">
              <input id='us-ipt2' onclick="setActivePlayerInput('us-ipt2'), openModalById('searchModal'), displaySuggestions(suggestions2)" class='answer' type="text" name="answer" value='' placeholder='ANSWER HERE...' readonly>
              <span id='us-pts2' class='points'>-</span>
            </div>
          </div>

          <div class="question-block">
            <span class="numero">Q3</span>
            <h2 class="question">{!! $questions[2]->value !!}</h2>
            <div class="answer-block">
              <input id='us-ipt3' onclick="setActivePlayerInput('us-ipt3'), openModalById('searchModal'), displaySuggestions(suggestions3)" class='answer' type="text" name="answer" value='' placeholder='ANSWER HERE...' readonly>
              <span id='us-pts3' class='points'>-</span>
            </div>
          </div>

          <div class="question-block">
            <span class="numero">Q4</span>
            <h2 class="question">{!! $questions[3]->value !!}</h2>
            <div class="answer-block">
              <input id='us-ipt4' onclick="setActivePlayerInput('us-ipt4'), openModalById('searchModal'), displaySuggestions(suggestions4)" class='answer' type="text" name="answer" value='' placeholder='ANSWER HERE...' readonly>
              <span id='us-pts4' class='points'>-</span>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Modals --> 
      <div class="modal" id="gameOverModal">
        <button class="close-modal" onclick=closeModalById('gameOverModal')>×</button>
        <div class="go-box">
          <img src="{{ asset('img/logo.png') }}" width='180' alt="uncovered-shorts-logo" class="gameOverLogo">
          <p class="go-text"><b id='congrats-text'>Your score today:</b></p>
          <span id="go-points">0</span>
          <span><b id="go-percentile">(0%)</b></span>
          <div class="two-column">
            <span>Average <br> Score <br><b id='AverageScoreResults'>{{ $statistics['AverageScore'] == intval($statistics['AverageScore']) ? intval($statistics['AverageScore']) : number_format($statistics['AverageScore'], 1) }}</b></span>
            <span>Top <br>Score <br><b id='TopScoreResults'>{{ $statistics['TopScore'] == intval($statistics['TopScore']) ? intval($statistics['TopScore']) : number_format($statistics['TopScore'], 1) }}</b></span>
          </div>
          <div class="go-buttons">
            <button class="go-share" onclick="openModalById('shareModal'), shareGame()">SHARE</button>
          </div>
          <div id="go-bestanswers" class="go-bestanswers">
            <p class="go-text"><b>Q1 - Best answers</b></p>
            <span class='go-best-answer'><b>#1 :</b> {{ $uniqueAnswers1[0]->value }}</span>
            <span class='go-best-answer'><b>#2 :</b> {{ $uniqueAnswers1[1]->value }}</span>
            <span class='go-best-answer'><b>#3 :</b> {{ $uniqueAnswers1[2]->value }}</span>
          </div>
          <br>
          <div  class="go-bestanswers">
            <p class="go-text"><b>Q2 - Best answers</b></p>
            <span class='go-best-answer'><b>#1 :</b> {{ $uniqueAnswers2[0]->value }}</span>
            <span class='go-best-answer'><b>#2 :</b> {{ $uniqueAnswers2[1]->value }}</span>
            <span class='go-best-answer'><b>#3 :</b> {{ $uniqueAnswers2[2]->value }}</span>
          </div>
          <br>
          <div class="go-bestanswers">
            <p class="go-text"><b>Q3 - Top answers</b></p>
            <span class='go-best-answer'><b>#1 :</b> {{ $rankedAnswers3[0]->value }}</span>
            <span class='go-best-answer'><b>#2 :</b> {{ $rankedAnswers3[1]->value }}</span>
            <span class='go-best-answer'><b>#3 :</b> {{ $rankedAnswers3[2]->value }}</span>
          </div>
          <br>
          <div class="go-bestanswers">
            <p class="go-text"><b>Q4 - Top answers</b></p>
            <span class='go-best-answer'><b>#1 :</b> {{ $rankedAnswers4[0]->value }}</span>
            <span class='go-best-answer'><b>#2 :</b> {{ $rankedAnswers4[1]->value }}</span>
            <span class='go-best-answer'><b>#3 :</b> {{ $rankedAnswers4[2]->value }}</span>
          </div>
        </div>
      </div>

    <div class="modal-background" id="modalBackground">

      <!-- Answers list modal -->
      <div class="modal" id="searchModal">
        <button class="close-modal" onclick=closeModalById('searchModal')>×</button>
        <div class="search-bar">
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
        var currentGameName = {!! json_encode($currentGame->name) !!};

        var suggestions1 = {!! $suggestions1 !!};
        var suggestions2 = {!! $suggestions2 !!};
        var suggestions3 = {!! $suggestions3 !!};
        var suggestions4 = {!! $suggestions4 !!};
        
        var uniqueAnswers1 = {!! $uniqueAnswers1 !!};
        var uniqueAnswers2 = {!! $uniqueAnswers2 !!};
        var rankedAnswers3 = {!! $rankedAnswers3 !!};
        var rankedAnswers4 = {!! $rankedAnswers4 !!};

        var hasAlreadyPlayed = {!! $hasAlreadyPlayed !!}
        var percentileInital = "{{ $statistics['Percentile'] }}"

        var activePlayerInput;
        var score1 = 0, score2 = 0, score3 = 0, score4 = 0;

        var playerFinalScore = 0;
        var answerCount = 0;

        // Change special chars

        // Use a regular expression to find & characters that are not part of an HTML entity
        document.addEventListener('DOMContentLoaded', () => {

            // Check if user has already played, if yes show results without the close button
            if(hasAlreadyPlayed >= 0)
            {
              document.getElementById('go-points').innerHTML = ''+hasAlreadyPlayed;
              document.getElementById('go-percentile').innerHTML = '(' + percentileInital + '%)';
              openModalById("gameOverModal");
              var modalResult = document.getElementById("gameOverModal");
              var closeModalElements = modalResult.getElementsByClassName('close-modal');
              closeModalElements[0].style.display = 'none';
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

          switch (idEnding) {
            case '1': 
              playerPoints = calculateUniquePoints(uniqueAnswers1, valueSelected, questions[0].id);
              score1 = playerPoints;
              break;
            case '2': 
              playerPoints = calculateUniquePoints(uniqueAnswers2, valueSelected, questions[1].id);
              score2 = playerPoints;
              break;
            case '3': 
              playerPoints = calculateRankedPoints(rankedAnswers3, valueSelected, questions[2].id);
              score3 = playerPoints;
              break;
            case '4':
              playerPoints = calculateRankedPoints(rankedAnswers4, valueSelected, questions[3].id);
              score4 = playerPoints;
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
          document.getElementById('go-points').innerHTML = ''+playerFinalScore;

          document.getElementById('go-bestanswers').style.display = 'flex';

          // Insert game 
          storeGameSession(currentGameId, score1, score2, score3, score4, playerFinalScore)
          .then(() => {
              // Get updated statistics including the new game
              return getStatistics(currentGameId, playerFinalScore);
          })
          .then(statisticsUpdated => {
              //console.log("Stats update =");
              //console.log(statisticsUpdated);
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

              // Open the game over modal
              openModalById('gameOverModal', false);
          })
          .catch(error => {
              console.error("Une erreur s'est produite lors de la récupération des statistiques :", error);
          });
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
          The first two questions will be "Unique" questions. The goal is to name the most unique correct answer. Scoring will change throughout the day based on other user's answers.
          <br>
          For example:
          <br>
          <strong>&bull;</strong> Name a company in the S&P 500?
          <br>
          <strong>&bull;</strong> Apple, while being a correct answer, will likely yield less points than Hershey
          </br> 
          <br>
          The second two questions will be "Ranked List" questions. The goal is to name the top ranking of a list. The top 10 will score points in descending order.
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

      <div class="modal share-container" id='shareModal'>
        <button class="close-modal" onclick=closeModalById('shareModal')>×</button>
        <div class="share-text-container">
          <textarea id='share-text' class="share-text" readonly>{{ $currentGame->name }}, 0 Points. Q1: 90, Q2: 85, Q3: 90, Q4: 40. Play at uncoveredshorts.com</textarea>
          <button class="copy-btn">COPY</button>
        </div>
      </div>

      <script>
        function shareGame() {
          // Générer le texte à copier
          var shareText = "🕵🏼‍♂️ "+currentGameName+", "+playerFinalScore+" Points.\n";
          shareText += "Q1: "+score1+", Q2: "+score2+", Q3: "+score3+", Q4: "+score4+"\n";
          shareText += "🎲 Play at uncoveredshorts.com";

          // Sélectionner les éléments nécessaires
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
      </script>
    
      <script src="{{ asset('js/game.js') }}?t={{ time() }}"></script>

      <script>
        document.addEventListener('DOMContentLoaded', function() {
          if(localStorage.getItem('showRules') !== 'true') 
          { 
            openModalById('rulesModal')
            localStorage.setItem('showRules', 'true');
          }
        });
      </script>

  </body>

</html>
