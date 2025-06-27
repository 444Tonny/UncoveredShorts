<body>
    @extends('admin.layout')

    @section('content')
        <main id="pgmain">
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-zoom/1.1.1/chartjs-plugin-zoom.min.js"></script>

            <h2>STATISTICS</h2>

            <div class="statistics">
                <div class="stats-blocks">
                    <div class="sb-single" id='single-TodayVisits'>
                        <label for=""><b>TODAY</b><br> Today's games played </label>
                        <p class='lv-stats' id='TodayVisits'>{{ number_format($todaysGameStats['todayGames']) }}</p>
                    </div>                 
                    <div class="sb-single" id='single-WeekVisits'>
                        <label for=""><b>LAST 7 DAYS</b><br> Today's games played </label>
                        <p class='lv-stats' id='WeekVisits'>{{ number_format($todaysGameStats['weekGames']) }}</p>
                    </div>                  
                    <div class="sb-single" id='single-MonthVisits'>
                        <label for=""><b>LAST 30 DAYS</b><br> Today's games played </label>
                        <p class='lv-stats' id='MonthVisits'>{{ number_format($todaysGameStats['monthGames']) }}</p>
                    </div>        
                    <div class="sb-single" id='single-TotalVisits'>
                        <label for=""><b>OVERALL</b><br> Today's games played </label>
                        <p class='lv-stats' id='TotalVisits'>{{ number_format($todaysGameStats['totalGames']) }}</p>
                    </div>
                </div>

                <div class="stats-blocks">
                    <div class="sb-single" id='single-TodayGames'>
                        <label for=""><b>TODAY</b><br> All games played </label>
                        <p class='lv-stats' id='TodayGames'>{{ number_format($overallGamesStats['todayGames']) }}</p>
                    </div>
                    <div class="sb-single" id='single-WeekGames'>
                        <label for=""><b>LAST 7 DAYS</b><br> All games played </label>
                        <p class='lv-stats' id='WeekGames'>{{ number_format($overallGamesStats['weekGames']) }}</p>
                    </div>
                    <div class="sb-single" id='single-MonthGames'>
                        <label for=""><b>LAST 30 DAYS</b><br> All games played </label>
                        <p class='lv-stats' id='MonthGames'>{{ number_format($overallGamesStats['monthGames']) }}</p>
                    </div>
                    <div class="sb-single" id='single-TotalGames'>
                        <label for=""><b>OVERALL</b><br> All games played </label>
                        <p class='lv-stats' id='TotalGames'>{{ number_format($overallGamesStats['totalGames']) }}</p>
                    </div>
                </div>

                &nbsp;
                <div style="width: 90%; min-height: 300px; margin: auto; overflow-x: auto; margin-top: 40px;">
                    <canvas id="lineChart"></canvas>
                </div>
                &nbsp;
                

                <script>
                    var ctx = document.getElementById('lineChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: @json($chartDataGames['labels']),
                            datasets: [
                            {
                                label: "Today's games",
                                data: @json($chartDataGames['data']),
                                borderColor: 'rgb(40, 48, 57)',
                                borderWidth: 3,
                                fill: true,
                                hoverBorderJoinStyle: 'round',
                                tension: 0.1
                            },
                            {
                                label: 'All games',
                                data: @json($chartDataOverallGames['data']),
                                borderColor: '#e0de4f',
                                borderWidth: 3,
                                fill: false,
                                hoverBorderJoinStyle: 'round',
                                tension: 0.1
                            }]
                        },
                        options: {
                            plugins: {
                                zoom: {
                                    zoom: {
                                        wheel: {
                                            enabled: true,
                                        },
                                        pinch: {
                                            enabled: true
                                        },
                                        mode: 'x'
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true
                                },
                                
                                x: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>

                <div class="stats-charts">
                    <h3 style="width:100%; text-align: center; margin-top: 70px;">COUNTRY</h3>

                    <figure>
                        <table class="barChart_h">
                            <caption>Country of visitors (Last 7 days)</caption>
                            <tbody>
                            <!-- Y-axis -->
                            <tr>
                              <th class="blankCell"></th>
                              <th class="y-axis">
                              </th>
                            </tr>
                            @foreach ($countryStats as $cs)
                            <!-- Data Rows -->
                            <tr class="firstRow">
                              <th scope="row">{{ empty($cs->country) ? 'Unknown' : $cs->country }}</th>
                              <td><span style="width:{{ ($cs->visits * 100 ) / $visitStats['weekVisits'] }}%"><b>{{ $cs->visits }}</b></span></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </figure>     
                    
                    <figure>
                        <table class="barChart_h">
                            <caption>Country of fully completed quizzes (Last 7 days)</caption>
                            <tbody>
                            <!-- Y-axis -->
                            <tr>
                              <th class="blankCell"></th>
                              <th class="y-axis">
                              </th>
                            </tr>
                            @foreach ($countryGamesStats as $cgs)
                                
                            <!-- Data Rows -->
                            <tr class="firstRow">
                              <th scope="row">{{ empty($cgs->country) ? 'Unknown' : $cgs->country }}</th>
                              <td><span style="width:{{ ($cgs->played * 100 ) / $overallGamesStats['weekGames'] }}%"><b>{{ $cgs->played }}</b></span></td>
                            </tr>

                            @endforeach
                          </tbody>
                        </table>
                    </figure>  
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