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

Route::get('cocktail/main',[
    'uses' => 'CocktailCategoryController@showCocktailCategories'
]);

Route::get('about-us', function () {
    return view('about-us');
});



Route::get('drink-category-grid-full/{id}/{category}/{page}', [
    'uses'=>'DrinkCategoryGridFullController@showSubCategories'
]);

Route::get('drink-page/{idproduct}',[
    'uses'=>'DrinkPageController@showProduct'
]);

Route::post('drink-page/{idproduct}',[
    'uses'=>'DrinkPageController@storeReview'
]);

Route::get('test',[
    'uses'=>'test@test'
]);


Route::get('cocktail/category/{category?}',[
    'uses' => 'CocktailCategoryController@showCocktailList'
]);

Route::get('cocktail/view/{id}',[
    'uses' => 'CocktailCategoryController@showCocktailInformation'
]);

Route::get('cocktail/user-cocktails/{category?}',[
    'uses' => 'CocktailCategoryController@ShowUserCocktailsByCategory'
])->middleware('session');

Route::get('cocktail/add-cocktail/{response?}',[
    'uses' => 'CocktailsByUsersController@loadCocktailCategories'
])->middleware('session');

Route::get('cocktail/user-cocktail-page/{id}',[
    'uses' => 'CocktailCategoryController@showUserCocktailInformation'
])->middleware('session');

Route::get('/login/{response?}', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/register','Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register','Auth\RegisterController@register')->name('register.submit');

Route::get('/profile', 'ProfileController@create');


Route::get('/myImages', 'ProfileController@loadPics')->middleware('session');
Route::post('myImages-add', 'ProfileController@addPhoto')->middleware('session');

Route::post('/profile/update', 'ProfileController@updateProfile')->name('profile.update');
Route::post('/profile/reset', 'Auth\ResetPasswordController@resetPassword')->name('password.reset');

Route::post('cocktail/add-my-cocktail', 'CocktailsByUsersController@addCocktailByUser');

Route::get('/password', 'Auth\ForgotPasswordController@create')->name('forgot');
Route::post('/password','Auth\ForgotPasswordController@send')->name('forgot.submit');


Route::get('/getpage/{category}/{page}/','AjaxController@cocktailPagination');

Route::get('/getUserCocktails/{category}/{page}','AjaxController@userCocktailPagination');


