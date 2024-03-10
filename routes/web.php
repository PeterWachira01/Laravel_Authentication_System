<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/
Route::get('/', function(){
    return view('welcome');
})->name('home');
/* route for login */
Route::get('/login', [AuthManager::class, 'login'])->name('login');

Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');

/* route for registration */
Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');

Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');

Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function (){
    Route::get('/profile', function(){
        return "Get the JOB!!!";
    });
});

/* route for email verification */

Route::get('/auth/verify-email/{verification_code}', 'AuthManager@verifyEmail')->name('verify_email');


Route::post('/auth/check_email_unique','AuthManager@check_email_unique')->name('check_email_uniquel');