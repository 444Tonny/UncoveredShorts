<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <title>GAMES</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css?v4') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@100;200;400;500;700&display=swap" rel="stylesheet">
</head>
</head>
<body>
    <header></header>

    @extends('admin.layout')

    @section('content')


    <!-- (B) MAIN -->
    <main id="pgmain">
      <h2>GAMES</h2>

      <div class="game-list">

        <form class='newgame' action="#" method="POST">
            @csrf
            <button class='add-game' type="submit">+ New game</button>
        </form>

        <div class="list-head">
          <span class="head">Game</span>
          <span class="head">Status</span>
          <span class="head">Statistics</span>
          <span class="head">View</span>
        </div>

        @foreach($games as $game)
          <div class="list-row">
            <span class="date">what</span>
            <span class="status {{ strtolower($game->status) }}">{{ strtoupper($game->status) }}</span>
            <span class="stats">
              <a class='stats-btn' href="{{ route('gameStatistics', ['id' => $game->id_games]) }}">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" style="scale:1.1; opacity: 0.4;" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M160 80c0-26.5 21.5-48 48-48h32c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H208c-26.5 0-48-21.5-48-48V80zM0 272c0-26.5 21.5-48 48-48H80c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V272zM368 96h32c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H368c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48z"/></svg>
              </a>
            </span>
            <span class="view">
              <a href="{{ route('gameDetails', ['id' => $game->id_games]) }}" class='viewbtn'>View</a>
            </span>
          </div>
        @endforeach

        <div class="pagination">
          {{ $games->links() }}
      </div>

      </div>

    </main>

    @endsection

    <footer></footer>
</body>
</html>
