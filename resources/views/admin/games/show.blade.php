<!-- resources/views/admin/games/show.blade.php -->
<h1>Détails du jeu</h1>

<p>Date de début : {{ $game->date_start }}</p>
<p>Date de fin : {{ $game->date_end }}</p>
<p>Créé le : {{ $game->created_at }}</p>
<p>Modifié le : {{ $game->updated_at }}</p>
