<body>
    @extends('admin.layout')

    @section('content')
        <main id="pgmain">

            <h2>EDIT A GAME</h2>

            <!------ Messages ------>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <!---------------------->

            <div class="admin-content">

                <form action="{{ route('games.update', $game->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <button type="submit" class="primary-btn my-btn create"><b>&#x21bb;</b> Update the game</button>
                    
                    <div class="spacing"></div>

                    <h3>Game informations</h3>
                    <div class="mywrapped-block">
                        <div class="myadmin-block">
                            <label for="name">Game name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') ?: $game->name }}">
                        </div>
                    
                        <div class="myadmin-block">
                            <label for="date_start">Start date :</label>
                            <input type="datetime-local" name="date_start" id="date_start" value="{{ old('date_start') ?: \Carbon\Carbon::parse($game->date_start)->format('Y-m-d\TH:i') }}">
                            
                            <label for="date_end">End date</label>
                            <input type="datetime-local" name="date_end" id="date_end" value="{{ old('date_end') ?: \Carbon\Carbon::parse($game->date_end)->format('Y-m-d\TH:i') }}">
                        </div>   
                    </div>     
                    
                    <div class="spacing-20"></div>
                        
                    <h3>Questions</h3>
                    <div class="mywrapped-block">
                        <?php $k = 1 ?>
                        @foreach ($game->questions as $question)
                        <div class="myadmin-block">
                            <input type="hidden" name="questions[{{ $k }}][number]" value="{{ $k }}">
                            <input type="hidden" name="questions[{{ $k }}][id]" value="{{ $question->id }}">

                            <label for="question_{{ $question->id }}">Question {{ $question->number }}</label>
                            <input type="text" placeholder='Type the question...' name="questions[{{ $k }}][value]" value="{{ $question->value }}" id="question_{{ $k }}">

                            <label for="type_{{ $k }}">Type</label>
                            <select name="questions[{{ $k }}][type]" id="type_{{ $k }}">
                                @if ($k <= 2)
                                <option value="unique" selected>Unique</option>
                                @else
                                <option value="ranked" selected>Ranked</option>
                                @endif
                            </select>             

                            <label for="sheet_url_{{ $k }}">Answer suggestions (Google sheet)</label>
                            <input type="text" placeholder='Enter a sheet URL...' name="questions[{{ $k }}][sheet_url]" value="{{ $question->sheet_url }}" id="sheet_url_{{ $k }}">
                            
                            <div class="spacing-20"></div>

                            <!-- Bouton "Answer" -->
                            @if ($k <= 2)
                                <a href="{{ route('unique-answers.show', ['question' => $question->id]) }}" class="btn btn-primary">View answers</a>
                            @else
                                <a href="{{ route('ranked-answers.show', ['question' => $question->id]) }}" class="btn btn-primary">View answers</a>
                            @endif
                        
                        </div>
                        <?php $k++ ?>
                        @endforeach
                    </div>
                </form>
            </div>
            <div class="spacing"></div>
        </main>
    @endsection
</body>
