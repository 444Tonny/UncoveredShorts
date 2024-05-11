<body>
    @extends('admin.layout')

    @section('content')

        <main id="pgmain">
            <h2>Correct answers for question {{ $question->number }}</h2>

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
                    <button type="submit" class="primary-btn my-btn create"><b>&#x21bb;</b> Update the answers</button>               
                    <div class="spacing"></div>

                    <h3><u>Question </u>: {{ $question->value }}</h3>

                    <div class="spacing-20"></div>
            
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Answer</th>
                                <th>Percentage (%)</th>
                                <th>Points</th>
                            </tr>
                        </thead>

                        @for ($i = 0; $i < 10; $i++)
                        <tr>
                            <td><input class='inputTable' type="text" name="answers[{{ $i }}][answer]" id="answer_{{ $i }}" value="{{ $uniqueAnswers[$i]->value ?? '' }}" placeholder="Type here..."></td>
                            <td class='percentage'><input class='inputTable' type="text" name="answers[{{ $i }}][percentage]" id="percentage_{{ $i }}" value="{{ $uniqueAnswers[$i]->percentage ?? '' }}" placeholder="%..."></td>
                            <td class='point'>{{ isset($uniqueAnswers[$i]) ? 100 - $uniqueAnswers[$i]->percentage : 0 }}</td>
                        </tr>
                        @endfor
                    </table>
                </form>

            </div>
        </main>

    @endsection

</body>