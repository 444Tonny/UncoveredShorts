<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\StreakLeaderboard; 

class ResetStreakCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'streak:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset streaks for entries not updated in the last 24 hours';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Set the cutoff time to 00:01 of the current day in the 'America/New_York' timezone
        $cutoffTime = Carbon::now('America/New_York')->startOfDay()->addMinutes(1)->subDay();

        // Find all entries where updated_at is not within the last 24 hours and set streak to 0
        StreakLeaderboard::where('updated_at', '<', $cutoffTime)
            ->update(['streak' => 0]);

        $formattedCutoffTime = $cutoffTime->format('Y-m-d H:i:s');

        // Display the message with the cutoff time
        $this->info("Streaks reset successfully for entries not updated before {$formattedCutoffTime} (EST).");
    
        return 0;
    }
}
