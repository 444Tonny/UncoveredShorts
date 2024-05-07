<body>
    @extends('admin.layout')

    @section('content')
        <main id="pgmain">
            <h2>CREATE A GAME</h2>

            <div class="admin-content">
                <form action="{{ route('games.store') }}" method="POST">
                    @csrf
                    
                    <h3>Game Date</h3>
                    <div class="myadmin-block">
                        <label for="date_start">Start date :</label>
                        <input type="datetime-local" name="date_start" id="date_start">
                        
                        <label for="date_end">End date</label>
                        <input type="datetime-local" name="date_end" id="date_end">
                    </div>
                        
                    <h3>Questions</h3>
                    <div class="mywrapped-block">
                        @for ($i = 1; $i <= 4; $i++)
                        <div class="myadmin-block">
                            <input type="hidden" name="questions[{{ $i }}][number]" value="{{ $i }}">

                            <label for="question_{{ $i }}">Question {{ $i }}</label>
                            <input type="text" placeholder='Type the question...' name="questions[{{ $i }}][value]" id="question_{{ $i }}">

                            <label for="type_{{ $i }}">Type</label>
                            <select name="questions[{{ $i }}][type]" id="type_{{ $i }}">
                                <option value="unique">Unique</option>
                                <option value="ranked">Ranked</option>
                            </select>

                            <label for="sheet_url_{{ $i }}">Answer suggestions (Google sheet)</label>
                            <input type="text" placeholder='Enter a sheet URL...' name="questions[{{ $i }}][sheet_url]" id="sheet_url_{{ $i }}">
                        </div>
                        @endfor
                    </div>
                    <button type="submit" class=''>CREATE</button>
                </form>
            </div>
            <div class="spacing"></div>
        </main>
    @endsection
</body>