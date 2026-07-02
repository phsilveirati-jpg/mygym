<?php

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => App\Http\Middleware\CheckUserRole::class,
        ]);
    })
    ->withSchedule(function (Schedule $schedule) {
        $schedule->command('app:remind-members')->dailyAt('16:49')->timezone('Australia/Melbourne');
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
