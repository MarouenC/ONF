<?php

use Illuminate\Support\Facades\Route;

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



Route::get('/', [App\Http\Controllers\Newhomecontroller::class, 'index'])->name('home');

Route::group([
    'namespace' => 'App\Http\Controllers',
], function () {
    Route::resource('product', 'Productscontroller');
    Route::resource('profile', 'profilecontoller');
    Route::resource('cart', 'Cartcontroller');
    Route::resource('order', 'Orderscontroller');
    Route::resource('checkout', 'checkoutcontroller');
    Route::post('/follow', 'followersController@store');
    Route::delete('/unfollow/{id}', 'followersController@destroy');
});
Auth::routes();


/*
php artisan cache:clear

php artisan route:cache

Route::get('/profile-picture', function () {
    $johnFullName = User::where('username', 'johndoe')->first()->full_name;

    return view('profile-picture', [
        'image' => \Avatar::create($johnFullName)->toSvg()
    ]);
});*/

/*Route::get('/profile-picture', function () {
    $johnFullName = User::where('username', 'johndoe')->first()->full_name;

    return view('profile-picture', [
        'image' => \Avatar::create($johnFullName)->toBase64()
    ]);
});
*/ 
    



