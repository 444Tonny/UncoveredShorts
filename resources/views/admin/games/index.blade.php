<body>
    @extends('admin.layout')

    @section('content')

        <main id="pgmain">
            <h2>GAME LIST</h2>

            <div class="admin-content">

                <div class="row">
                    <a href="{{ route('games.create') }}" class="primary-btn my-btn create"><b>+</b> Create a new game</a>
                </div>

                <div class="spacing"></div>

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Status</th>
                            <th>Date Start</th>
                            <th>Date End</th>
                            <th class='center'>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($games as $game)
                            <tr>
                                <td>{{ $game->id }}</td>
                                <td>
                                    <span class='game-status {{ $game->status }}'> {{ $game->status }} </span>
                                </td>
                                <td>{!! date('d-m-Y', strtotime($game->date_start)) !!} <br> {!! date('H:i', strtotime($game->date_start)) !!}</td>
                                <td>{!! date('d-m-Y', strtotime($game->date_end)) !!} <br> {!! date('H:i', strtotime($game->date_start)) !!}</td>
                                <td class='center-buttons'>
                                    <a href="{{ route('games.edit', $game->id) }}" class='edit'>Edit</a>
                                    <form action="{{ route('games.destroy', $game->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class='delete'>Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="spacing"></div>
            </div>            
        </main>
    @endsection
    </body>
</html>