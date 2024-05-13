<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingsController;

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

Route::get('/listings/property/{listing}', [ListingsController::class, 'show'])->name('listing.show');

//auth routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {


    //SuperAdmin & Admin routes
    Route::group([
        'middleware' => [
            'HighAuth',
        ]
    ], function () {


        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');


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


        Route::resource(
            'listings',
            App\Http\Controllers\ListingsController::class
        );
    });



    //logged user routes


    //property owner routes


});