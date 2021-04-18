<?php
use App\Restaurant;
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

Route::any ( '/search', function () {
    $q = Request::get ( 'q' );
    $restaurant = Restaurant::where ( 'title', 'LIKE', '%' . $q . '%' )->get ();
    if (count ( $restaurant ) > 0)
        return view ( 'welcome' )->withDetails ( $restaurant )->withQuery ( $q );
    else
        return view ( 'welcome' )->withMessage ( 'No Details found. Try to search again !' );
} );

// Route::get('/cart','CartsController');





Route::get('/search','RestaurantsController@search');


Route::resource('users', 'UsersController');
Route::resource('users.update', 'UsersController');
Route::resource('users.show', 'UsersController');



Route::resource('restaurants', 'RestaurantsController');
Route::resource('restaurants/{restaurant_id}/consumables', 'ConsumablesController');



Route::get('/', function () {
    return view('welcome', ['totalPrice' => 'Samantha']);
});


Route::group(['middleware' => 'auth'], function() {
	
Route::get('/cart', 'CartsController@index')->name('cart');
Route::get('/add/{id}', 'CartsController@update')->name('cartProduct.AddToCart');
Route::get('/remove/{id}', 'CartsController@remove')->name('cartProduct.removeFromCart');
// Route::get('/totalPrice', 'CartsController@totalPrice')->name('totalPrice');

Route::get('/', function () {
    return view('welcome', ['name' => 'Samantha']);
});


// Route::get('/add/{id}', 'AddConsumableController@update')->name('consumable.AddToCart');
// Route::get('/remove/{id}', 'AddConsumableController@remove')->name('consumable.RemoveFromCart');

Route::resource('cart', 'CartsController');
Route::resource('order', 'OrdersController');


});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/welcome', 'HomeController@index')->name('welcome');



