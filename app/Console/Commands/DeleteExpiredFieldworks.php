<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Fieldwork;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DeleteExpiredFieldworks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fieldworks:delete-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete expired fieldworks';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): void
    {
        $start = microtime(true);
        //Log::info('DeleteExpiredFieldworks command started at ' . now());
        
        $expiredFieldworks = Fieldwork::whereHas('employer', function ($query) {
            $query->where('applicationDeadline', '<', now());
        })->get();

        //Log::info('Query executed in ' . (microtime(true) - $start) . ' seconds');

        foreach ($expiredFieldworks as $fieldwork) {
            if ($fieldwork->isExpired()) {
                $fieldwork->delete();
                //Log::info('Deleted fieldwork ID: ' . $fieldwork->id);
            }
        }

        //Log::info('DeleteExpiredFieldworks command completed in ' . (microtime(true) - $start) . ' seconds');

        $this->info('Expired fieldwork records deleted successfully.');
    }
}
