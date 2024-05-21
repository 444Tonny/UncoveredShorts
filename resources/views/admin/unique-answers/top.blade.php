<body>
    @extends('admin.layout')

    @section('content')
        <main id="pgmain">

            <h2>STATISTICS OF THE GAME</h2>

            <div class="statistics">
                
                <div class="stats-charts">
                    <h3>ANSWERS</h3>

                    @for($i = 0 ; $i < 4 ; $i ++)
                    <figure>
                        <table class="barChart_h">
                          <caption>Q{{$i+1}}: Question number #{{$i+1}}</caption>
                    
                          <tbody>
                            <!-- Y-axis -->
                            <tr>
                              <th class="blankCell"></th>
                              <th class="y-axis">
                              </th>
                            </tr>
                            
                            <!-- Data Rows -->
                            <tr class="firstRow">
                              <th scope="row">Answer:</th>
                              <td><span style="width:1%"><b>0</b></span></td>
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