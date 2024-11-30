<body>
    @extends('admin.layout')

    @section('content')
        <main id="pgmain">

            <h2>LEADERBOARDS</h2>

            <div class="container">

                <select onchange="showTable(this.value)">
                    <option value="1" selected>Overall</option>
                    @php $k = 2; @endphp
                    @foreach ($groups as $group)
                        <option value="{{ $k }}">{{ $group['category_name'] }}</option>
                        @php $k++; @endphp
                    @endforeach
                </select>
    
                <div id="table1" class="tabs tab-content active">
                    <table>
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>User ID</th>
                                <th>Initials</th>
                                <th>Total Score</th>
                                <th>Submitted at</th>
                                <th>Group</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $r = 1; ?>
                            @forelse ($overallLeaderboard as $element)
                                <?php if($element['initial'] === '???'){ ?>
                                    <tr><td colspan="5" style="text-align: center;">End of results</td></tr>
                                <?php break;} ?>
                                <tr>
                                    <td>{{ $r }}</td>
                                    <td>{{ $element['unique_identifier'] }}</td>
                                    <td>{{ strtoupper($element['initial']) }}</td>
                                    <td>{{ $element['total_score'] }}</td>
                                    <td>{{ \Carbon\Carbon::parse($element['created_at'])->format('d/m/Y H:i') }}</td>
                                    <td>
                                        @if ($element['category_name'] == 'Group Leaderboard')
                                            No Group
                                        @else
                                            {{ $element['category_name'] }}
                                        @endif
                                    </td>
                                </tr>
                                <?php $r++; ?>
                            @empty
                                <tr>
                                    <td colspan="5" style="text-align: center;">End of results</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
    
                <?php $i = 2; ?>
                @foreach ($groupLeaderboards as $groupLeaderboard)
    
                    <div id="table{{$i}}" class="tabs tab-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Rank</th>
                                    <th>User ID</th>
                                    <th>Initials</th>
                                    <th>Total Score</th>
                                    <th>Submitted at</th>
                                    <th>Group</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $g = 1; ?>
                                @foreach ($groupLeaderboard as $element)
                                    <?php if($element->unique_identifier == 'Unknown'){ ?>
                                        <tr><td colspan="5" style="text-align: center;">End of results</td></tr>
                                    <?php break;} ?>
                                    <tr>
                                        <td>{{ $g }}</td>
                                        <td>{{ $element->unique_identifier}}</td>
                                        <td>{{ strtoupper($element->initial) }}</td>
                                        <td>{{ $element->total_score}}</td>
                                        <td>{{ \Carbon\Carbon::parse($element->created_at)->format('d/m/Y H:i') }}</td>
                                        <td>{{ $element->category_name}}</td>
                                    </tr>
                                    <?php $g++ ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <?php $i++; ?>
                @endforeach
            </div>

            <div class="spacing"></div>
        </main>
    @endsection

    <script>
        // Fonction pour afficher l'onglet actif
        function showTable(id) {
            // Masquer tous les tableaux
            const tables = document.querySelectorAll('.tab-content');
            tables.forEach(table => {
                table.classList.remove('active');
            });

            // Désactiver tous les onglets
            const tabs = document.querySelectorAll('.tab');
            tabs.forEach(tab => {
                tab.classList.remove('active');
            });

            // Afficher l'onglet et le tableau sélectionné
            document.getElementById('table'+id).classList.add('active');
            //document.getElementById('tab'+id).classList.add('active');
        }
    </script>

    <style>
        /* Style de base pour les onglets */
        .container
        {
            padding: 40px !important;
        }

        .tabs {
            display: flex;
            cursor: pointer;
            margin-bottom: 0px;
            flex-direction: row;
            flex-wrap: wrap;
        }

        .tab {
            padding: 10px 20px;
            background-color: #f1f1f1;
            margin-right: 5px;
            border: 1px solid #ddd;
            border-radius: 5px 5px 0 0;
        }

        .tab.active {
            background-color: #4CAF50;
            color: white;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        /* Style pour les tables */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th{
            font-size:14px;
            background: white;
        }

        td{
            font-size:12px;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        tr:nth-child(odd) {
            background-color: #f0f0f0;
        }
    </style>
</body>