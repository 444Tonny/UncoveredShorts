<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Leaderboard extends Model
{
    use HasFactory;

    protected $table = 'leaderboard';

    protected $fillable = [
        'initial',
        'unique_identifier',
        'game_id',
        'total_score',
        'category_name'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id');
    }

    public static function addScore($gameId, $initial, $unique_identifier, $totalScore, $selectedGroup)
    {
        // Create a new Leaderboard entry
        $leaderboardEntry = new self();
        $leaderboardEntry->game_id = $gameId;
        $leaderboardEntry->initial = $initial;
        $leaderboardEntry->unique_identifier = $unique_identifier;
        $leaderboardEntry->total_score = $totalScore;
        $leaderboardEntry->category_name = $selectedGroup;
        $leaderboardEntry->save();

        return $leaderboardEntry;
    }

    public static function getTodaysTop($gameId, $topEntries)
    {
        // Get today's date
        $today = Carbon::today();

        // Query to get the top entries for today's date
        $topScores = self::where('game_id', $gameId)
            ->whereDate('created_at', $today)
            ->orderBy('total_score', 'desc')
            ->orderBy('created_at', 'desc')
            ->take($topEntries)
            ->get();

        // Fill with dummy entries if needed
        if ($topScores->count() < $topEntries) {
            for ($i = $topScores->count(); $i < $topEntries; $i++) {
                $topScores->push(new self([
                    'initial' => '???',
                    'total_score' => 0,
                    'unique_identifier' => 'Unkown',
                    'game_id' => $gameId,
                    'created_at' => now(),
                ]));
            }
        }

        return $topScores;
    }

    public static function updateCategoryNameByIdentifier($uniqueIdentifier, $categoryName)
    {
        self::where('unique_identifier', $uniqueIdentifier)
            ->update(['category_name' => $categoryName]);
    }

    public static function getTopScoresByCategory($gameId, $topEntries, $categoryName)
    {
        // Get today's date
        $today = Carbon::today();

        // Query to get the top entries for today's date within the given category
        $topScores = self::where('game_id', $gameId)
            ->where('category_name', $categoryName)
            ->orderBy('total_score', 'desc')
            ->orderBy('created_at', 'desc')
            ->take($topEntries)
            ->get();

        // Fill with dummy entries if needed
        if ($topScores->count() < $topEntries) {
            for ($i = $topScores->count(); $i < $topEntries; $i++) {
                $topScores->push(new self([
                    'initial' => '???',
                    'total_score' => 0,
                    'unique_identifier' => 'Unknown',
                    'game_id' => $gameId,
                    'created_at' => now(),
                ]));
            }
        }

        return $topScores;
    }
}
