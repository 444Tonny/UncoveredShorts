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

                <form action="{{ route('ranked-answers.updateAll', ['question' => $question->id]) }}" method="POST">
                @csrf
                @method('PUT')
  
                <button type="submit" class="primary-btn my-btn create"><b>&#x21bb;</b> Update the answers</button>               
                <div class="spacing"></div>
                
                <h3><u>Question </u>: {{ $question->value }}</h3>
                <div class="spacing-20"></div>
            
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
                            <td class='rank'><b>#</b>{{ $i + 1 }}</td>
                            <td><input placeholder='Type here...' class='inputTable' type="text" name="answers[{{ $i }}][answer]" id="answer_{{ $i }}" value="{{ $rankedAnswers[$i]->value ?? '' }}"></td>
                            <td class='point'>{{ 100 - ($i * 10) }}</td>
                        </tr>
                        @endfor
                    </table>
                </form>

            </div>
        </main>

    @endsection

</body>