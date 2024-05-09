<body>
    @extends('admin.layout')

    @section('content')

        <main id="pgmain">
            <h2>Unique Answers for Question {{ $question->number }}</h2>

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
                <form action="{{ route('unique-answers.updateAll', ['question' => $question->id]) }}" method="POST">
                @csrf
                @method('PUT')
                    <h3>{{ $question->value }}</h3>
            
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Percentage (%)</th>
                                <th>Answer</th>
                                <th>Points</th>
                            </tr>
                        </thead>

                        @for ($i = 0; $i < 10; $i++)
                        <tr>
                            <td class='percentage'><input class='inputTable' type="text" name="answers[{{ $i }}][percentage]" id="percentage_{{ $i }}" value="{{ $uniqueAnswers[$i]->percentage ?? '' }}"></td>
                            <td><input class='inputTable' type="text" name="answers[{{ $i }}][answer]" id="answer_{{ $i }}" value="{{ $uniqueAnswers[$i]->value ?? '' }}"></td>
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