<?php

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
Auth::routes();

/*Route::get('/', function () {
    return view('index');
})->name('home');*/

Route::get('/','HomeController@index')->name('home');

Route::get('/home','HomeController@index')->name('home');

Route::get('cocktail-main',[
    'uses' => 'CocktailCategoryController@showCocktailCategories'
]);

Route::get('about-us', function () {
    return view('about-us');
});

Route::get('profile', function () {
    return view('profile');
});
/*
Route::get('sign-in', function () {
    return view('sign-in');
});*/

/*Route::get('/sign-up', function () {
    return view('sign-up');
});*/

/*Route::get('password', function () {
    return view('password');
});*/

Route::get('drink-category-grid-full/{id}/{category}', function () {
    return view('drink-category-grid-full');
});


Route::get('cocktail-category/{category?}',[
    'uses' => 'CocktailCategoryController@showCocktailList'
]);

Route::get('cocktail-page/{id}',[
    'uses' => 'CocktailCategoryController@showCocktailInformation'
]);

Route::get('user-cocktails/{category?}',[
    'uses' => 'CocktailCategoryController@ShowUserCocktailsByCategory'
]);

Route::get('user-cocktail-page/{id}',[
    'uses' => 'CocktailCategoryController@showUserCocktailInformation'
]);
/*Route::post('/sign-up', 'loginController@sign');
Route::post('/login-me', 'loginController@login');*/


Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/register','Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register','Auth\RegisterController@register')->name('register.submit');




