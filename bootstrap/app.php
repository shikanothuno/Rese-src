<?php

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
            "admin" => \App\Http\Middleware\AdminMiddleware::class,
            "store.representative" => \App\Http\Middleware\StoreRepresentativeMiddleware::class,
            "reservation.user" => \App\Http\Middleware\ReservationUserMiddleware::class,
            "not.genaral.user" => \App\Http\Middleware\NotGeneralUser::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
