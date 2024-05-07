<!-- resources/views/admin/games/edit.blade.php -->
<h1>Modifier le jeu</h1>

<form action="{{ route('games.update', $game->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <label for="date_start">Date de début :</label>
    <input type="datetime-local" name="date_start" id="date_start" value="{{ $game->date_start }}">
    
    <label for="date_end">Date de fin :</label>
    <input type="datetime-local" name="date_end" id="date_end" value="{{ $game->date_end }}">
    
    <button type="submit">Modifier</button>
</form>
