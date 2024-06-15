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
                    <div class="sb-single" id='single-TodayGames'>
                        <label for=""><b>TODAY</b><br> Games played </label>
                        <p class='lv-stats' id='TodayGames'>{{ $gamesStats['todayGames'] }}</p>
                    </div>
                    <div class="sb-single" id='single-WeekGames'>
                        <label for=""><b>LAST 7 DAYS</b><br> Games played </label>
                        <p class='lv-stats' id='WeekGames'>{{ $gamesStats['weekGames'] }}</p>
                    </div>
                    <div class="sb-single" id='single-MonthGames'>
                        <label for=""><b>LAST 30 DAYS</b><br> Games played </label>
                        <p class='lv-stats' id='MonthGames'>{{ $gamesStats['monthGames'] }}</p>
                    </div>
                    <div class="sb-single" id='single-TotalGames'>
                        <label for=""><b>OVERALL</b><br> Games played </label>
                        <p class='lv-stats' id='TotalGames'>{{ $gamesStats['totalGames'] }}</p>
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
                            labels: @json($data['labels']),
                            datasets: [{
                                label: 'Games played',
                                data: @json($data['data']),
                                borderColor: 'rgb(40, 48, 57)',
                                borderWidth: 3,
                                fill: true,
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
                    <h3>COUNTRY</h3>

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
                              <td><span style="width:{{ ($cgs->played * 100 ) / $gamesStats['weekGames'] }}%"><b>{{ $cgs->played }}</b></span></td>
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