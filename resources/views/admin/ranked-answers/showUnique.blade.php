<body>
    @extends('admin.layout')

    @section('content')

        <main id="pgmain">
            <h2>Ranked Answers for Question {{ $question->number }}</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Answer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rankedAnswers as $rankedAnswer)
                    <tr>
                        <td>{{ $rankedAnswer->rank }}</td>
                        <td>{{ $rankedAnswer->value }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        
            <h3>Add Ranked Answer</h3>
            <form action="{{ route('ranked-answers.store') }}" method="POST">
                @csrf
                <input type="hidden" name="question_id" value="{{ $question->id }}">
                <div id="ranked-answer-fields">
                    <div class="form-group">
                        <label for="rank">Rank:</label>
                        <input type="text" name="rank[]" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="value">Answer:</label>
                        <input type="text" name="value[]" class="form-control">
                    </div>
                </div>
                <button type="button" id="add-ranked-answer" class="btn btn-primary">Add Answer</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>

            <script>
                document.getElementById('add-ranked-answer').addEventListener('click', function() {
                    var container = document.getElementById('ranked-answer-fields');
                    var rankInput = document.createElement('input');
                    rankInput.setAttribute('type', 'text');
                    rankInput.setAttribute('name', 'rank[]');
                    rankInput.classList.add('form-control');

                    var valueInput = document.createElement('input');
                    valueInput.setAttribute('type', 'text');
                    valueInput.setAttribute('name', 'value[]');
                    valueInput.classList.add('form-control');

                    container.appendChild(rankInput);
                    container.appendChild(valueInput);
                });
            </script>
        </main>

    @endsection

</body>