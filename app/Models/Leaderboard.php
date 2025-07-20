<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Request;

class Leaderboard extends Model
{
    use HasFactory;

    protected $table = 'leaderboard';

    protected $fillable = [
        'initial',
        'unique_identifier',
        'game_id',
        'total_score',
        'category_name',
        'ip_address'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id');
    }

    public static function addScore($gameId, $initial, $unique_identifier, $totalScore, $selectedGroup)
    {
        $ip_address = Request::ip(); 

        $ip_address6FirstChar = substr(strtoupper($ip_address), 0, 6);
        $initial13Char = substr(strtoupper($initial), 0, 13);

        $scoreMin = $totalScore - 3;
        $scoreMax = $totalScore + 3;

        // Vérifie si une entrée similaire existe dans les 3 dernières minutes
        $recentMatch = self::where('game_id', $gameId)
            ->where(function ($query) use ($ip_address6FirstChar, $initial13Char) {
                $query->whereRaw('UPPER(LEFT(ip_address, 6)) = ?', [$ip_address6FirstChar])
                    ->orWhereRaw('UPPER(LEFT(initial, 13)) = ?', [$initial13Char]);
            })
            ->whereBetween('total_score', [$scoreMin, $scoreMax])
            ->where('created_at', '>=', Carbon::now()->subMinutes(5))
            ->exists();

        if ($recentMatch) {
            abort(403, 'Unauthorized activity detected. Your score cannot be published on the leaderboard.');
        }

        // Create a new Leaderboard entry
        $leaderboardEntry = new self();
        $leaderboardEntry->game_id = $gameId;
        $leaderboardEntry->initial = $initial;
        $leaderboardEntry->unique_identifier = $unique_identifier;
        $leaderboardEntry->total_score = $totalScore;
        $leaderboardEntry->category_name = $selectedGroup;
        $leaderboardEntry->ip_address = $ip_address;
        $leaderboardEntry->save();

        return $leaderboardEntry;
    }

    public static function getTodaysTop($gameId, $topEntries)
    {
        // Get today's date
        $today = Carbon::today();

        // Query to get the top entries for today's date
        $topScores = self::where('game_id', $gameId)
            //->whereDate('created_at', $today)
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
