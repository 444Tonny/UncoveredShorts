<body>
    @extends('admin.layout')

    @section('content')
        <main id="pgmain">

            <h2>PLAYERS ANSWER</h2>

            <h3 class='statistics'>{{ $game->name ?: 'Game#'.$game->id }}</h3>

            <div class="stats-boxes">
                <div class="box">
                    <label>TOP SCORE</label>
                    <span class="value">{{ $scoreStatistics['TopScore'] == intval($scoreStatistics['TopScore']) ? intval($scoreStatistics['TopScore']) : number_format($scoreStatistics['TopScore'], 1) }}</span>
                </div>

                <div class="box">
                    <label>AVERAGE SCORE</label>
                    <span class="value">{{ $scoreStatistics['AverageScore'] == intval($scoreStatistics['AverageScore']) ? intval($scoreStatistics['AverageScore']) : number_format($scoreStatistics['AverageScore'], 1) }}</span>
                </div>

                <div class="box">
                    <label>GAMES TODAY</label>
                    <span class="value">{{ $gamePlayedTheDayCount }}</span>
                </div>

                <div class="box">
                    <label>GAMES ARCHIVE</label>
                    <span class="value">{{ $gamePlayedArchiveCount }}</span>
                </div>
                
                <div class="box">
                    <label>TOTAL GAMES</label>
                    <span class="value">{{ $scoreStatistics['GamesPlayed'] }}</span>
                </div>
            </div>

            <div class="statistics">
                
                <div class="stats-charts">

                    <?php $iCA = 0 ?>
                    @foreach($questions as $question)
                        <figure>
                            <table class="barChart_h">
                                <caption>Q{{ $question->number }}: {{ $question->value }}</caption>
                                <caption>
                                    <br>Correct answers : {{ $correctAnswerCount[$iCA] }} / {{ $totalVotes[$iCA] }} = 
                                    {{ $totalVotes[$iCA] > 0 ? round(($correctAnswerCount[$iCA] / $totalVotes[$iCA]) * 100, 0) : 0 }}%
                                </caption>
                                <?php $iCA++ ?>
                                <tbody>
                                    <!-- Y-axis -->
                                    <tr>
                                        <th class="blankCell"></th>
                                        <th class="y-axis"></th>
                                    </tr>
                                    
                                    <!-- Data Rows -->
                                    @if($statistics[$question->id]['type'] == 'ranked' or $statistics[$question->id]['type'] == 'ranked-few')
                                        @foreach($statistics[$question->id]['answers'] as $answer)
                                            <tr>
                                                <th scope="row">
                                                    <b>{{ ucfirst($answer['value']) }}</b> <br>
                                                    <span style="color: {{ $answer['is_correct'] ? 'green' : 'red' }};">
                                                        ({{ $answer['is_correct'] ? 'Correct' : 'Incorrect' }})
                                                    </span>
                                                </th>
                                                <td>
                                                    <span style="width:{{ $answer['percentage'] }}%"><b>{{ $answer['count'] }}</b></span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @elseif($statistics[$question->id]['type'] == 'unique' or $statistics[$question->id]['type'] == 'unique-few')
                                        @foreach($statistics[$question->id]['answers'] as $answer)
                                            <tr>
                                                <th scope="row">
                                                    <b>{{ ucfirst($answer['value']) }}</b> <br>
                                                    <span style="color: {{ $answer['is_correct'] ? 'green' : 'red' }};">
                                                        ({{ $answer['is_correct'] ? 'Correct' : 'Incorrect' }})
                                                    </span>
                                                </th>
                                                <td>
                                                    <span style="width:{{ $answer['percentage'] }}%"><b>{{ $answer['count'] }}</b></span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </figure>
                    @endforeach
            
                </div>
            </div>

            <div class="spacing"></div>
        </main>
    @endsection
</body>