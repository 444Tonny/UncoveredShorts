<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class StreakLeaderboard extends Model
{
    use HasFactory;

    protected $table = 'streak_leaderboard';

    protected $fillable = [
        'initial',
        'unique_identifier',
        'last_game_id',
        'streak',
    ];

    public function lastGame()
    {
        return $this->belongsTo(Game::class, 'last_game_id');
    }

    /* Fonction pour ajouter une entrée nombre de streak
    ou mettre à jour car on ne conserve que ceux actif
    */
    public static function addStreak($lastGameId, $initial, $uniqueIdentifier, $streak)
    {
        // Check if the unique identifier already exists
        $streakLeaderboardEntry = self::where('unique_identifier', $uniqueIdentifier)->first();

        if ($streakLeaderboardEntry) {
            // Update the existing entry
            $streakLeaderboardEntry->last_game_id = $lastGameId;
            $streakLeaderboardEntry->streak = $streak;
            $streakLeaderboardEntry->save();
        } else {
            // Create a new entry
            $streakLeaderboardEntry = new self();
            $streakLeaderboardEntry->last_game_id = $lastGameId;
            $streakLeaderboardEntry->initial = $initial;
            $streakLeaderboardEntry->unique_identifier = $uniqueIdentifier;
            $streakLeaderboardEntry->streak = $streak;
            $streakLeaderboardEntry->save();
        }

        return $streakLeaderboardEntry;
    }

    public static function getTopStreaks($topEntries = 10)
    {
        // Query to get the top streak entries, ignoring those with streak = 0
        $topStreaks = self::where('streak', '>', 0)
            ->orderBy('streak', 'desc')
            ->orderBy('created_at', 'desc')
            ->take($topEntries)
            ->get();
    
        // Fill with dummy entries if needed
        if ($topStreaks->count() < $topEntries) {
            for ($i = $topStreaks->count(); $i < $topEntries; $i++) {
                $topStreaks->push(new self([
                    'initial' => '???',
                    'streak' => 0,
                    'unique_identifier' => 'Unknown',
                    'last_game_id' => null,
                    'created_at' => now(),
                ]));
            }
        }
    
        return $topStreaks;
    }
}
