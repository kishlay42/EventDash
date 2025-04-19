<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

protected function schedule(Schedule $schedule)
{
    $schedule->call(function () {
        $tasks = \App\Models\Task::whereDate('due_date', now()->addDay()->toDateString())->get();

        foreach ($tasks as $task) {
            $user = $task->user; // Assuming tasks are assigned to users
            $user->notify(new \App\Notifications\TaskReminderNotification($task));
        }
    })->daily();
}
    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
