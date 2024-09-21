<body>
    @extends('admin.layout')

    @section('content')
        <main id="pgmain">

            <h2>CREATE A GAME</h2>

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
                <form action="{{ route('games.store') }}" method="POST">
                    @csrf

                    <button type="submit" class="primary-btn my-btn create"><b>+</b> Create</button>
                    
                    <div class="spacing"></div>
                    
                    <h3>Game informations</h3>
                    <div class="mywrapped-block">
                        <div class="myadmin-block">
                            <label for="date_end">Game name:</label>
                            <input type="text" name="name" id="name" value="{{ old('name') ?: 'Uncovered Shorts #' . $nextId }}" required>
                        </div>  
    
                        <div class="myadmin-block">
                            <label for="date_start">Start date: (Eastern Time)</label>
                            <input type="datetime-local" name="date_start" id="date_start" value="{{ old('date_start') }}">
                            
                            <label for="date_end">End date: (Eastern Time)</label>
                            <input type="datetime-local" name="date_end" id="date_end" value="{{ old('date_end') }}">
                        </div>   
                    </div>                 
                        
                    <h3>Questions</h3>
                    <div class="mywrapped-block">
                        @for ($i = 1; $i <= 4; $i++)
                        <div class="myadmin-block">
                            <input type="hidden" name="questions[{{ $i }}][number]" value="{{ $i }}">

                            <label for="question_{{ $i }}">Question {{ $i }}</label>
                            <textarea placeholder='Type the question...' name="questions[{{ $i }}][value]" id="question_{{ $i }}">{{ old('questions.'.$i.'.value') }}</textarea>

                            <label for="type_{{ $i }}">Type</label>
                            <select name="questions[{{ $i }}][type]" id="type_{{ $i }}">
                                @if ($i <= 2)
                                <option value="unique" selected>Unique</option>
                                @else
                                <option value="ranked" selected>Ranked</option>
                                <option value="ranked-few">Ranked (Few suggestions)</option>
                                @endif
                            </select>                              

                            <label for="sheet_url_{{ $i }}">Answer suggestions (Google sheet)</label>
                            <input type="text" placeholder='Enter a sheet URL...' name="questions[{{ $i }}][sheet_url]" value="{{ old('questions.'.$i.'.sheet_url') }}" id="sheet_url_{{ $i }}" required>
                        </div>
                        @endfor
                    </div>
                </form>
            </div>
            <div class="spacing"></div>
        </main>
    @endsection
</body>