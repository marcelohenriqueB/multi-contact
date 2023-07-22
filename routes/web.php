<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PeopleController;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect() -> route('people.index');
});

Route::resource('people', PeopleController::class);

Route::prefix('person/{person}/') ->group(function(){
    Route::resource('contacts', ContactController::class);
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
