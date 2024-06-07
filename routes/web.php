<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingsController;
use App\Http\Controllers\ContractsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//general routes

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/property', function () {
    return view('PropertyView');
})->name('PropertyView');

Route::get('/Listings/{listing:id}', [ListingsController::class, 'show'])->name('listing.show');

//Authenticated User Routes

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::group([
        'middleware' => [
            'HighAuth',
        ]
    ], function () {

        //general routes : Auth
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::resource('contracts', ContractsController::class);

        //joint routes for Listings
        // Super Admin, Admin, Property Owner
        Route::group([
            'middleware' => [
                'Listings',
            ]
        ], function () {
            Route::resource(
                'listings',
                App\Http\Controllers\ListingsController::class
            );
        });

        //Super Admin specific routes
        Route::group([
            'middleware' => [
                'SuperAdmin',
            ]
        ], function () {
            Route::resource(
                'user',
                App\Http\Controllers\UserController::class
            );
        });

    });

});