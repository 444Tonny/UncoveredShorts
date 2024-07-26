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
      <div class='admin-logo-container'>
        <img class='h-logo' src="{{ asset('img/logo.png') }}" alt="uncovered-short-logo" style='width:70%'>
      </div>

      <!-- (A2) MENU ITEMS -->
      <a href="{{ route('games.index') }}" id="menu-games">
        <i class="ico">
          <svg id='Dice_Four_24' width='18' height='18' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='20' height='20' stroke='none' fill='#000000' opacity='0'/>
          <g transform="matrix(0.91 0 0 0.91 12 12)" >
          <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255, 255, 255); fill-rule: nonzero; opacity: 1;" transform=" translate(-16, -16)" d="M 5 5 L 5 27 L 27 27 L 27 5 L 5 5 z M 7 7 L 25 7 L 25 25 L 7 25 L 7 7 z M 11 9 C 9.895430500338414 9 9 9.895430500338414 9 11 C 9 12.104569499661586 9.895430500338414 13 11 13 C 12.104569499661586 13 13 12.104569499661586 13 11 C 13 9.895430500338414 12.104569499661586 9 11 9 z M 21 9 C 19.895430500338414 9 19 9.895430500338414 19 11 C 19 12.104569499661586 19.895430500338414 13 21 13 C 22.104569499661586 13 23 12.104569499661586 23 11 C 23 9.895430500338414 22.104569499661586 9 21 9 z M 11 19 C 9.895430500338414 19 9 19.895430500338414 9 21 C 9 22.104569499661586 9.895430500338414 23 11 23 C 12.104569499661586 23 13 22.104569499661586 13 21 C 13 19.895430500338414 12.104569499661586 19 11 19 z M 21 19 C 19.895430500338414 19 19 19.895430500338414 19 21 C 19 22.104569499661586 19.895430500338414 23 21 23 C 22.104569499661586 23 23 22.104569499661586 23 21 C 23 19.895430500338414 22.104569499661586 19 21 19 z" stroke-linecap="round" />
          </g>
          </svg>
        </i>
        <i class="txt">Games</i>
      </a>
      <a href="{{ route('statistics.index') }}" id="menu-statistics">
        <i class="ico">
          <svg id='Graph_Stats_Ascend_24' width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='20' height='20' stroke='none' fill='#FFFFFF' opacity='0'/>
            <g transform="matrix(1.01 0 0 1.01 12 12)" >
            <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255, 255, 255); fill-rule: nonzero; opacity: 1;" transform=" translate(-11.15, -12.85)" d="M 14 7 L 14 9 L 17.586 9 L 12 14.586 L 8 10.586 L 1.2930000000000001 17.293 L 2.707 18.707 L 8 13.414 L 12 17.414 L 19 10.414000000000001 L 19 14 L 21 14 L 21 7 L 14 7 z" stroke-linecap="round" />
            </g>
            </svg>
        </i>
        <i class="txt">Statistics</i>
      </a>

      <a href="{{ route('leaderboard.index') }}" id="menu-statistics">
        <i class="ico">          
        <svg width="22px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M15 19H9V12.5V8.6C9 8.26863 9.26863 8 9.6 8H14.4C14.7314 8 15 8.26863 15 8.6V14.5V19Z" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M15 5H9" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M20.4 19H15V15.1C15 14.7686 15.2686 14.5 15.6 14.5H20.4C20.7314 14.5 21 14.7686 21 15.1V18.4C21 18.7314 20.7314 19 20.4 19Z" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M9 19V13.1C9 12.7686 8.73137 12.5 8.4 12.5H3.6C3.26863 12.5 3 12.7686 3 13.1V18.4C3 18.7314 3.26863 19 3.6 19H9Z" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        </i>
        <i class="txt">Leaderboard</i>
      </a>

      <a href="{{ route('subscribers.index') }}" id="menu-statistics">
        <i class="ico">
          <svg width="24px" height="24px" viewBox="0 0 24 24" fill="#ffffff" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.75 5.25L3 6V18L3.75 18.75H20.25L21 18V6L20.25 5.25H3.75ZM4.5 7.6955V17.25H19.5V7.69525L11.9999 14.5136L4.5 7.6955ZM18.3099 6.75H5.68986L11.9999 12.4864L18.3099 6.75Z"/>
          </svg>
        </i>
        <i class="txt">Subscribers</i>
      </a>

      <a href="{{ route('adminCredentials') }}" id="menu-credentials">
        <i class="ico">
          <svg id='Privacy_24' fill='white' width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>
          <g transform="matrix(0.95 0 0 0.95 12 12)" >
          <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255, 255, 255); fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -11.5)" d="M 12 1 C 8.6761905 1 6 3.6761905 6 7 L 6 8 C 4.9 8 4 8.9 4 10 L 4 20 C 4 21.1 4.9 22 6 22 L 18 22 C 19.1 22 20 21.1 20 20 L 20 10 C 20 8.9 19.1 8 18 8 L 18 7 C 18 3.6761905 15.32381 1 12 1 z M 12 3 C 14.27619 3 16 4.7238095 16 7 L 16 8 L 8 8 L 8 7 C 8 4.7238095 9.7238095 3 12 3 z M 12 11 C 14.2 11 16 12.8 16 15 C 16 17.2 14.2 19 12 19 C 9.8 19 8 17.2 8 15 C 8 12.8 9.8 11 12 11 z M 12 13 C 10.895 13 10 13.895 10 15 C 10 16.105 10.895 17 12 17 C 13.105 17 14 16.105 14 15 C 14 14.795 13.959344 14.602016 13.902344 14.416016 C 13.744344 14.759016 13.403 15 13 15 C 12.448 15 12 14.552 12 14 C 12 13.597 12.240984 13.255656 12.583984 13.097656 C 12.397984 13.040656 12.205 13 12 13 z" stroke-linecap="round" />
          </g>
          </svg>
        </i>
        <i class="txt">Credentials</i>
      </a>
      
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
      
      <a class='logout' href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="ico">
            <svg id='Logout_Rounded_Down_24' width='20' height='20' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>
            <g transform="matrix(0.8 0 0 0.8 12 12)" >
            <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255, 255, 255); fill-rule: nonzero; opacity: 1;" transform=" translate(-15, -15.51)" d="M 15 3 C 8.3845336 3 3 8.3845336 3 15 C 3 17.554923 3.8185753 19.9167 5.1816406 21.853516 C 5.499312302821298 22.305483416500678 6.123228083499321 22.4143516028213 6.5751954999999995 22.0966799 C 7.027162916500678 21.7790081971787 7.136031102821298 21.15509241650068 6.8183594 20.703125 C 5.6774247 19.081941 5 17.129077 5 15 C 5 9.4654664 9.4654664 5 15 5 C 20.534534 5 25 9.4654664 25 15 C 25 17.129077 24.322575 19.081941 23.181641 20.703125 C 22.863969297178702 21.15509219558678 22.972837304413222 21.779007797178703 23.4248045 22.0966795 C 23.87677169558678 22.414351202821297 24.500687297178704 22.305483195586778 24.818359 21.853516 C 26.181425 19.9167 27 17.554923 27 15 C 27 8.3845336 21.615466 3 15 3 z M 14.984375 12.986328 C 14.43285880343316 12.99494907306296 13.992447279873389 13.448468138368236 14 14 L 14 24.585938 L 11.707031 22.292969 C 11.518759981155519 22.0994359864488 11.260235858549075 21.990249842732712 10.990234 21.990234 C 10.583310933388129 21.990341027517083 10.217025100118086 22.236989716506184 10.063903235086288 22.614004421849202 C 9.910781370054488 22.991019127192217 10.001357595904953 23.423219121112922 10.292969 23.707031 L 14.205078 27.619141 C 14.394520667973628 27.867482090132395 14.689111881749115 28.013052981457662 15.001460524511453 28.012669756147325 C 15.313809167273789 28.01228653083699 15.608042288389186 27.86599320196093 15.796875 27.617188 L 19.707031 23.707031 C 19.968271794792877 23.45621442686285 20.07350663500295 23.083764007781856 19.982149810984033 22.73332194847753 C 19.89079298696512 22.382879889173207 19.617120110826793 22.10920701303488 19.26667805152247 22.017850189015967 C 18.916235992218144 21.92649336499705 18.54378557313715 22.031728205207123 18.292969 22.292969 L 16 24.585938 L 16 14 C 16.0037014610102 13.729699667173675 15.89782332475401 13.469413346079792 15.706490332869745 13.278448278708167 C 15.51515734098548 13.087483211336544 15.254667707530459 12.982106271031087 14.984375 12.986328 z" stroke-linecap="round" />
            </g>
            </svg>
          </i>
          <i class="txt">Logout</i>
      </a>
    

    </div>

    <script> 
    </script>
</body>
</html>
