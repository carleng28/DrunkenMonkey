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

Route::get('/', function () {
    return view('index');
});

Route::get('cocktail-main', function () {
    return view('cocktail-main');
});

Route::get('about-us', function () {
    return view('about-us');
});

Route::get('sign-in', function () {
    return view('sign-in');
});

Route::get('sign-up', function () {
    return view('sign-up');
});

Route::get('password', function () {
    return view('password');
});

Route::get('drink-category-grid-full', function () {
    return view('drink-category-grid-full');
});


Route::get('cocktail-category/{category?}',[
    'uses' => 'CocktailCategoryController@buildCocktailList'
]);


