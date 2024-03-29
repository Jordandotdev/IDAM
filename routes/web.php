<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\SuperAdminMiddleware;
use Illuminate\Support\Facades\Route;

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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified', 
])->group(function () {

   
    //SuperAdmin & Admin routes
    Route::group([
        'middleware'=> [
        'HighAuth',
    ]], function(){
       

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::middleware('SuperAdmin')->resource(
            'user',
            App\Http\Controllers\UserController::class
        );

        Route::resource(
            'listings',
            App\Http\Controllers\ListingsController::class
        );
    });
    
    

    //logged user routes


    //property owner routes


});