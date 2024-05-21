<body>
    @extends('admin.layout')

    @section('content')
        <main id="pgmain">

            <h2>PLAYERS ANSWER</h2>

            <div class="statistics">
                
                <div class="stats-charts">
                    <h3>{{ $game->name ?: 'Game#'.$game->id }}</h3>

                    @foreach($questions as $question)
    <figure>
        <table class="barChart_h">
            <caption>Q{{ $question->number }}: {{ $question->value }}</caption>
            <tbody>
                <!-- Y-axis -->
                <tr>
                    <th class="blankCell"></th>
                    <th class="y-axis"></th>
                </tr>
                
                <!-- Data Rows -->
                @if($statistics[$question->id]['type'] == 'ranked')
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
                @elseif($statistics[$question->id]['type'] == 'unique')
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