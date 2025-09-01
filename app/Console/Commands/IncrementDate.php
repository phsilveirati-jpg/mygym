<?php

namespace App\Console\Commands;

use App\Models\ScheduledClass;
use Illuminate\Console\Command;

class IncrementDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:increment-date {--days=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Increment all the scheduled class date';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $days = (int) $this->option('days'); // Cast 'days' to integer

        ScheduledClass::all()->each(function ($class) use ($days) {
            $class->date_time = $class->date_time->addDays($days);
            $class->save();
        });
    }
}
