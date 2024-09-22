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
                            <label for="name">Game name:</label>
                            <input type="text" name="name" id="name" value="{{ old('name') ?: $game->name }}" required>
                        </div>
                    
                        <div class="myadmin-block">
                            <label for="date_start">Start date: (Eastern Time)</label>
                            <input type="datetime-local" name="date_start" id="date_start" value="{{ old('date_start') ?: \Carbon\Carbon::parse($game->date_start)->format('Y-m-d\TH:i') }}">
                            
                            <label for="date_end">End date: (Eastern Time)</label>
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
                            <textarea placeholder='Type the question...' name="questions[{{ $k }}][value]" id="question_{{ $k }}">{{ $question->value }}</textarea>

                            <label for="type_{{ $k }}">Type</label>
                            <select name="questions[{{ $k }}][type]" id="type_{{ $k }}">
                                @if ($k <= 2)
                                <option value="unique" selected>Unique</option>
                                @else
                                <option value="ranked" <?php if ($question->type === 'ranked') echo 'selected'; ?>>Ranked</option>
                                <option value="ranked-few" <?php if ($question->type === 'ranked-few') echo 'selected'; ?>>Ranked (Show suggestions)</option>
                                @endif
                            </select>             

                            <label for="sheet_url_{{ $k }}">Answer suggestions (Google sheet)</label>
                            
                            <div class="row-sheet">
                                <input type="text" placeholder='Enter a sheet URL...' name="questions[{{ $k }}][sheet_url]" value="{{ $question->sheet_url }}" id="sheet_url_{{ $k }}">
                                <a target='_blank' href='{{ $question->sheet_url }}'>
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="22" height="22" viewBox="0 0 30 30">
                                    <path d="M 25.980469 2.9902344 A 1.0001 1.0001 0 0 0 25.869141 3 L 20 3 A 1.0001 1.0001 0 1 0 20 5 L 23.585938 5 L 13.292969 15.292969 A 1.0001 1.0001 0 1 0 14.707031 16.707031 L 25 6.4140625 L 25 10 A 1.0001 1.0001 0 1 0 27 10 L 27 4.1269531 A 1.0001 1.0001 0 0 0 25.980469 2.9902344 z M 6 7 C 4.9069372 7 4 7.9069372 4 9 L 4 24 C 4 25.093063 4.9069372 26 6 26 L 21 26 C 22.093063 26 23 25.093063 23 24 L 23 14 L 23 11.421875 L 21 13.421875 L 21 16 L 21 24 L 6 24 L 6 9 L 14 9 L 16 9 L 16.578125 9 L 18.578125 7 L 16 7 L 14 7 L 6 7 z"></path>
                                    </svg>
                                </a>
                            </div>
                            <br>
                            &nbsp;
                            <div>
                                <input type="checkbox" name="verify_{{$k}}" id="verify_{{$k}}" onchange="updateHref({{$k}})" <?php if ($question->type !== 'ranked-few') echo 'checked'; ?>> Check to verify the data in Google Sheets.
                            </div>        

                            <div class="spacing-20"></div>

                            <!-- Bouton "Answer" -->
                            @if ($k <= 2)
                                <a id="syncBtn_{{$k}}" href="{{ route('unique-answers.synchronize', ['question' => $question->id]) }}" class="btn btn-primary">Synchronize answers</a>
                            @else
                                <a id="syncBtn_{{$k}}" href="{{ route('ranked-answers.synchronize', ['question' => $question->id]) }}" class="btn btn-primary">Synchronize answers</a>
                            @endif
                        
                        </div>
                        <?php $k++ ?>
                        @endforeach
                    </div>
                </form>
            </div>

            <script>
                function updateHref(k) {
                    const checkbox = document.getElementById(`verify_${k}`);
                    const syncBtn = document.getElementById(`syncBtn_${k}`);
                    const baseUrl = syncBtn.href.split('?')[0];
                    const verifyParam = checkbox.checked ? 'yes' : 'no';
            
                    syncBtn.href = `${baseUrl}?verify=${verifyParam}`;
                }
            
                // Initial call to set the href correctly based on the default state
                document.addEventListener('DOMContentLoaded', function () {
                    updateHref(1);
                    updateHref(2);
                    updateHref(3);
                    updateHref(4);
                });
            </script>

            <div class="spacing"></div>
        </main>
    @endsection
</body>
