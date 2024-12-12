<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToolController;
use App\Http\Middleware\LogActions;
use App\Helpers\Price;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\HomeController;
use App\Services\RateService;

//Route::middleware(LogActions::class)->group(function() {
    Route::permanentRedirect('/', '/tools');

    Route::get('greeting', function() {
        return "hello world";
    })->name("helloworld");

    //Route::get('tools', [ToolController::class, 'index']);
    //Route::get('tools/{id}', [ToolController::class, 'show']);

    Route::resource('tools', ToolController::class);
    Route::resource('invoices', InvoiceController::class);
    //Route::get('invoices/order/{ord}', [InvoiceController::class, 'order'])->name('invoices.order');

    Route::resource('invoices', InvoiceController::class);
    Route::get('/search', [InvoiceController::class, 'search'])->name('search');

    Route::resource('logs', LogController::class)->withoutMiddleware(LogActions::class);

    Route::get('/toolsedit', function () {
        $tools = \App\Models\Tool::all();

        foreach ($tools as $tool) {
            $tool->update(['price' => json_encode([
                'amount' => $tool->price,
                'currency' => 'EUR',
                'currency_rate' => rand(0, 100) / 100,
            ])]);
        }
    });

    Route::get('/currency/{currency}', function ($currency) {
        $price = new Price($currency, 100, app()->make(RateService::class));
        return $price->toArray();
    });

    Route::get('/toolsedit', function () {
        $tools = \App\Models\Tool::all();

        foreach ($tools as $tool) {
            $tool->update(['price' => json_encode([
                'amount' => $tool->price,
                'currency' => 'EUR',
                'currency_rate' => rand(0, 100) / 100,
            ])]);
        }
    });

    Route::prefix('auth')->controller(AuthenticationController::class)->group(function() {
        Route::middleware('guest')->group(function() {
            Route::get('/login', 'showForm')->name('login');
            Route::post('/login', 'login');
            Route::get('/callback', 'callback')->name('authentication.callback');
        });

        Route::middleware('auth')->group(function() {
            Route::get('/logout', 'logout')->name('logout');
        });
    });

    Route::get('/home', HomeController::class)->middleware('auth')->name('home');
//});
