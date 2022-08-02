<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//default route
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('vista1');
// });

// Route::get('/{var}', function ($var) {
//     return view('vista1', ['name'=> $var]);
// });

if(View::exists('vista2'))
{
    Route::get('/', function () {
        return view('vista2');
    });
}
else{
    Route::get('/', function () {
        return "the needed view doesnt exist!";
    });
}
//route
// Route::get('/route1', function () {
//     return "<h1> This is a test</h1>";
// });

//route with var
Route::get('/route1/{name?}', function ($name = 'younes') {
    return "<h1>Hola ".$name."</h1>";
})->name("route01");

//route with where
Route::get('/user/{user}', function ($user) {
    return "<h1>Hola ".$user."</h1>";
})->where('user', '[0-9]+');//[A-Za-z]+

//route with redirect function
Route::get('/route2', function () {
    return redirect()->route("route01");
});

//route with associative array
Route::get('/array', function () {
    //route with array
    // $arr = ['lundi', 'mardi', 'mercredi'];
    //route with associative array
    $arr = [
        'id'=> '12',
        'desc'=> 'product 01'
    ];
    return $arr;
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
