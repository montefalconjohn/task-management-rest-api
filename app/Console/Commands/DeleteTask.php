<?php

namespace App\Console\Commands;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DeleteTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $trash = Task::onlyTrashed()
            ->where('deleted_at', '<=', Carbon::now()->subDays(30)->toDateTimeString())
            ->get();

        foreach ($trash as $task) {
            $task->forceDelete();
        }

        Log::info('here');
        return 1;
    }
}
