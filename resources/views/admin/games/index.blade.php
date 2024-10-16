<body>
    @extends('admin.layout')

    @section('content')

        <main id="pgmain">
            <h2>GAME LIST</h2>

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
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <!---------------------->

            <div class="admin-content">

                <div>
                    <a href="{{ route('games.create') }}" class="primary-btn my-btn create"><b>+</b> Create a new game</a>
                </div>

                <div class="spacing"></div>

                <table>
                    <thead>
                        <tr>
                            <th class='center'>Archive</th>
                            <th>#</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Statistics</th>
                            <th class='center'>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($games as $game)
                            <tr>
                                <form action="{{ route('games.update_archiveable', $game->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <td class="center">
                                        <input type="checkbox" name="is_archiveable" id="archive-checkbox-{{ $game->id }}"
                                                onchange="this.form.submit()" {{ $game->is_archiveable ? 'checked' : '' }}>
                                    </td>
                                </form>
                                <td>{{ $game->name ?: 'Game#'.$game->id }}</td>
                                <td>
                                    <span class='game-status {{ $game->status }}'> {{ $game->status }} </span>
                                </td>
                                <td>
                                    <b>{!! date('F j, Y', strtotime($game->date_start)) !!}</b> <br> <i> {!! date('H:i', strtotime($game->date_start)) !!} (Start) </i>
                                    <br><br> 
                                    <b>{!! date('F j, Y', strtotime($game->date_end)) !!}</b> <br> <i> {!! date('H:i', strtotime($game->date_end)) !!} (End) </i>
                                
                                </td>
                                <td>
                                    <a href="{{ route('game.showStatistics', ['id' => $game->id]) }}" class="btn btn-primary">
                                        <svg id='Graph_Stats_Ascend_24' width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='20' height='20' stroke='none' fill='#FFFFFF' opacity='0'/>
                                            <g transform="matrix(1.01 0 0 1.01 12 12)" >
                                            <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(32, 32, 32); fill-rule: nonzero; opacity: 1;" transform=" translate(-11.15, -12.85)" d="M 14 7 L 14 9 L 17.586 9 L 12 14.586 L 8 10.586 L 1.2930000000000001 17.293 L 2.707 18.707 L 8 13.414 L 12 17.414 L 19 10.414000000000001 L 19 14 L 21 14 L 21 7 L 14 7 z" stroke-linecap="round" />
                                            </g>
                                            </svg>
                                            STATS</a>
                                </td>
                                <td class='center-buttons'>
                                    <?php if ($game->status == 'ready') { ?>
                                        <a target='_blank' href="{{ route('games.preview', $game->id) }}" class='preview'>Preview</a>
                                        <br>
                                    <?php } ?>
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
                <div class="pagination">
                    {{ $games->links() }}
                </div>
                <div class="spacing"></div>
            </div>            
        </main>
    @endsection
    </body>
</html>