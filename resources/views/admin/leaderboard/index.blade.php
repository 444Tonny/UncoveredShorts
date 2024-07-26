<body>
    @extends('admin.layout')

    @section('content')
        <main id="pgmain">

            <h2>LEADERBOARD</h2>

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

                <form action="" method="">
                    @csrf
                    
                    <div class="spacing"></div>
                        
                    <h3>Leaderboard groups</h3>
                    <div class="mywrapped-block">
                        <div class="myadmin-block">

                            <label for="">List of groups (Google sheet)</label>
                            
                            <div class="row-sheet">
                                <input type="text" placeholder='Enter a sheet URL...' name="sheet_url" value="{{ $googleSheetUrl }}" id="sheet_url" required>
                                <a target="_blank" href="{{ $googleSheetUrl }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="22" height="22" viewBox="0 0 30 30">
                                    <path d="M 25.980469 2.9902344 A 1.0001 1.0001 0 0 0 25.869141 3 L 20 3 A 1.0001 1.0001 0 1 0 20 5 L 23.585938 5 L 13.292969 15.292969 A 1.0001 1.0001 0 1 0 14.707031 16.707031 L 25 6.4140625 L 25 10 A 1.0001 1.0001 0 1 0 27 10 L 27 4.1269531 A 1.0001 1.0001 0 0 0 25.980469 2.9902344 z M 6 7 C 4.9069372 7 4 7.9069372 4 9 L 4 24 C 4 25.093063 4.9069372 26 6 26 L 21 26 C 22.093063 26 23 25.093063 23 24 L 23 14 L 23 11.421875 L 21 13.421875 L 21 16 L 21 24 L 6 24 L 6 9 L 14 9 L 16 9 L 16.578125 9 L 18.578125 7 L 16 7 L 14 7 L 6 7 z"></path>
                                    </svg>
                                </a>
                            </div>
                            <br>

                            <div class="spacing-20"></div>

                            <a id="syncButton" href="#" class="btn btn-primary">Synchronize groups</a>
                        
                        </div>
                    </div>
                </form>
            </div>

            <div class="spacing"></div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById('syncButton').addEventListener('click', function(event) {
                        event.preventDefault(); // Empêche le comportement par défaut du lien
                    
                        var sheetUrl = document.getElementById('sheet_url').value;
                        var routeUrl = "{{ route('leaderboard.synchronize') }}"; // Assurez-vous que cette route est bien définie
                    
                        // Crée l'URL avec le paramètre
                        var fullUrl = routeUrl + '?sheet_url=' + encodeURIComponent(sheetUrl);
                    
                        // Redirige vers l'URL construite
                        window.location.href = fullUrl;
                    });
                });
            </script>

        </main>
    @endsection
</body>
