<body>
    @extends('admin.layout')

    @section('content')

        <main id="pgmain">
            <h2>Ranked Answers for Question {{ $question->number }}</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                
                <div class="admin-content">
                <form action="{{ route('ranked-answers.updateAll', ['question' => $question->id]) }}" method="POST">
                @csrf
                @method('PUT')
                
                <h3><u>Question </u>: {{ $question->value }}</h3>
                <div class="spacing"></div>
            
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Answer</th>
                                <th>Points</th>
                            </tr>
                        </thead>

                        @for ($i = 0; $i < 10; $i++)
                        <tr>
                            <td class='rank'>{{ $i + 1 }}</td>
                            <td><input class='inputTable' type="text" name="answers[{{ $i }}][answer]" id="answer_{{ $i }}" value="{{ $rankedAnswers[$i]->value ?? '' }}"></td>
                            <td class='point'>{{ 100 - ($i * 10) }}</td>
                        </tr>
                        @endfor
                    </table>

                    <button type="submit" class="btn btn-primary">Save All</button>
                </form>

            </div>
        </main>

    @endsection

</body>