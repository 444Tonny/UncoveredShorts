<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin/admin-layout.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@200;400;500;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
</head>
<body>
    <!-- (A) SIDEBAR -->
    <div id="pgside">
      <!-- (A1) BRANDING OR USER -->
      <!-- LINK TO DASHBOARD OR LOGOUT -->
      <div id="pguser">
        <span class="txt">UNCOVERED <br> SHORTS</span>
      </div>

      <!-- (A2) MENU ITEMS -->
      <a href="{{ route('games.index') }}" id="menu-games">
        <i class="ico">&#9858;</i>
        <i class="txt">Games</i>
      </a>
      <a href="" id="menu-credentials">
        <i class="ico">&#9432;</i>
        <i class="txt">Statistics</i>
      </a>

      <a href="" id="menu-credentials">
        <i class="ico">&#9432;</i>
        <i class="txt">Sheets</i>
      </a>

      <a href="" id="menu-credentials">
        <i class="ico">&#9432;</i>
        <i class="txt">Credentials</i>
      </a>
      
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
      
      <a class='logout' href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="ico">&#9906;</i>
          <i class="txt">Logout</i>
      </a>
    

    </div>

    <script> 
    </script>
</body>
</html>
