<body>
    @extends('admin.layout')

    @section('content')
        <main id="pgmain">

            <h2>STATISTICS</h2>

            <div class="statistics">
                <div class="stats-blocks">
                    <div class="sb-single" id='single-TodayVisits'>
                        <label for=""><b>TODAY</b><br> Unique visits </label>
                        <p class='lv-stats' id='TodayVisits'>{{ $visitStats['todayVisits'] }}</p>
                    </div>                 
                    <div class="sb-single" id='single-WeekVisits'>
                        <label for=""><b>LAST 7 DAYS</b><br> Unique visits </label>
                        <p class='lv-stats' id='WeekVisits'>{{ $visitStats['weekVisits'] }}</p>
                    </div>                  
                    <div class="sb-single" id='single-MonthVisits'>
                        <label for=""><b>LAST 30 DAYS</b><br> Unique visits </label>
                        <p class='lv-stats' id='MonthVisits'>{{ $visitStats['monthVisits'] }}</p>
                    </div>        
                    <div class="sb-single" id='single-TotalVisits'>
                        <label for=""><b>OVERALL</b><br> Unique visits </label>
                        <p class='lv-stats' id='TotalVisits'>{{ $visitStats['totalVisits'] }}</p>
                    </div>
                </div>

                <div class="stats-blocks">
                    <div class="sb-single sb-single-bw" id='single-TodayGames'>
                        <label for=""><b>TODAY</b><br> Games played </label>
                        <p class='lv-stats' id='TodayGames'>{{ $gamesStats['todayGames'] }}</p>
                    </div>
                    <div class="sb-single sb-single-bw" id='single-WeekGames'>
                        <label for=""><b>LAST 7 DAYS</b><br> Games played </label>
                        <p class='lv-stats' id='WeekGames'>{{ $gamesStats['weekGames'] }}</p>
                    </div>
                    <div class="sb-single sb-single-bw" id='single-MonthGames'>
                        <label for=""><b>LAST 30 DAYS</b><br> Games played </label>
                        <p class='lv-stats' id='MonthGames'>{{ $gamesStats['monthGames'] }}</p>
                    </div>
                    <div class="sb-single sb-single-bw" id='single-TotalGames'>
                        <label for=""><b>OVERALL</b><br> Games played </label>
                        <p class='lv-stats' id='TotalGames'>{{ $gamesStats['totalGames'] }}</p>
                    </div>
                </div>

                <div class="stats-charts">
                    <h3>COUNTRY</h3>

                    <figure>
                        <table class="barChart_h">
                            <caption>The country of visitors</caption>
                    
                            <tbody>
                            <!-- Y-axis -->
                            <tr>
                              <th class="blankCell"></th>
                              <th class="y-axis">
                              </th>
                            </tr>
                            
                            <!-- Data Rows -->
                            <tr class="firstRow">
                              <th scope="row">United States:</th>
                              <td><span style="width:10%"><b>70</b></span></td>
                            </tr>
                            <tr>
                              <th scope="row">Canada:</th>
                              <td><span style="width:30%"><b>30</b></span></td>
                            </tr>
                            <tr>
                              <th scope="row">Canada:</th>
                              <td><span style="width:30%"><b>30</b></span></td>
                            </tr>
                            <tr>
                              <th scope="row">Canada:</th>
                              <td><span style="width:30%"><b>30</b></span></td>
                            </tr>
                          </tbody>
                        </table>
                    </figure>          
                      
                    <figure>
                        <table class="barChart_h">
                          <caption>Country of fully completed quizzes</caption>
                    
                          <tbody>
                            <!-- Y-axis -->
                            <tr>
                              <th class="blankCell"></th>
                              <th class="y-axis">
                              </th>
                            </tr>
                            
                            <!-- Data Rows -->
                            <tr class="firstRow">
                              <th scope="row">United States:</th>
                              <td><span style="width:10%"><b>70</b></span></td>
                            </tr>
                            <tr>
                              <th scope="row">Canada:</th>
                              <td><span style="width:30%"><b>30</b></span></td>
                            </tr>
                          </tbody>
                        </table>
                    </figure>         
                </div>
                
                <div class="stats-charts">
                    <h3>ANSWERS</h3>

                    @for($i = 0 ; $i < 4 ; $i ++)
                    <figure>
                        <table class="barChart_h">
                          <caption>Q1: What is the question number #1 ?</caption>
                    
                          <tbody>
                            <!-- Y-axis -->
                            <tr>
                              <th class="blankCell"></th>
                              <th class="y-axis">
                              </th>
                            </tr>
                            
                            <!-- Data Rows -->
                            <tr class="firstRow">
                              <th scope="row">United States:</th>
                              <td><span style="width:10%"><b>70</b></span></td>
                            </tr>
                            <tr>
                          </tbody>
                        </table>
                    </figure> 
                    @endfor         
            
                </div>
            </div>

            <div class="spacing"></div>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                var percentages = document.querySelectorAll('.percentage');
                
                percentages.forEach(function(percentage) {
                    var percentageValue = parseInt(percentage.classList[1].split('-')[1]);
                    var bar = percentage.querySelector('span');
                    bar.style.width = percentageValue + '%';
                });
            });
            </script>
        </main>
    @endsection
</body>