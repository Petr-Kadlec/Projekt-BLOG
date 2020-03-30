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
Route::get('blog/{slug}',  ['as' => 'Blog.single' , 'uses' => 'BlogController@getSingle']);
Route::get('Contact', 'PagesController@getContact');
Route::get('About','PagesController@getAbout')->name("about");  
Route::get('/','PagesController@getIndex')->name('home');

Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => "blog.index"]);


Route::resource('admin/Posts',"PostController")->middleware('auth');



Auth::routes();



Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::prefix("admin")->group(function(){
 
    Route::get("/login" , "Auth\AdminLoginController@showLoginForm")->name("admin.login");
    Route::post("/login" , "Auth\AdminLoginController@login")->name("admin.login.submit");
    Route::resource('Posts',"PostController")->middleware('auth:admin');
    Route::resource('categories',"CategoryController");
    Route::resource('tags',"TagController");


   

    Route::get('/', 'AdminController@index')->name("admin.dashboard");

});

