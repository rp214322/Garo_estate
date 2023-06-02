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

Auth::routes();

Route::get('/', [\App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::get('/contact',[\App\Http\Controllers\HomeController::class,'contact'])->name('contact');
Route::post('/inquiry',[App\Http\Controllers\HomeController::class,'StoreInquiry'])->name('store.inquiry');
Route::get('/feedback',[App\Http\Controllers\HomeController::class,'feedback'])->name('feedback');
Route::post('/storefeedback',[App\Http\Controllers\HomeController::class,'StoreFeedback'])->name('store.feedback');
Route::get('/terms',[App\Http\Controllers\HomeController::class,'terms'])->name('terms');
Route::get('/property',[App\Http\Controllers\PropertiesController::class,'property'])->name('property');
Route::get('/property/{slug}',[App\Http\Controllers\PropertiesController::class,'viewproperty'])->name('viewproperty');
Route::get('/favouite/property/{id}',[App\Http\Controllers\PropertiesController::class,'FavouriteProperty'])->name('favourite.property');
Route::get('/favouite/property',[App\Http\Controllers\UsersController::class,'FavouriteList'])->name('favourite.list');
Route::get('/profile',[\App\Http\Controllers\UsersController::class,'profile'])->name('profile');
Route::post('/profile',[App\Http\Controllers\UsersController::class,'updateProfile'])->name('update.profile');

Route::get('property/fetch',[\App\Http\Controllers\Admin\PropertiesController::class,'fetch'])->name('fetchData');

//Admin Section
Route::get('admin/login',[\App\Http\Controllers\Admin\AuthController::class,'getLogin'])->name('admin.login');
Route::post('admin/login',[\App\Http\Controllers\Admin\AuthController::class,'postLogin'])->name('admin.post.login');

Route::middleware('admin')->prefix('admin')->namespace('\App\Http\Controllers\Admin')->name('admin.')->group(function(){

	Route::get('/',[\App\Http\Controllers\Admin\DashboardController::class,'index'])->name('dashboard');

	// Route for profile
	Route::get('profile',[\App\Http\Controllers\Admin\AuthController::class,'getProfile'])->name('profile');
	Route::post('profile',[\App\Http\Controllers\Admin\AuthController::class,'postProfile'])->name('post.profile');

	// Route for Change Password
	Route::get('password',[\App\Http\Controllers\Admin\AuthController::class,'getPassword'])->name('password');
	Route::post('password',[\App\Http\Controllers\Admin\AuthController::class,'postPassword'])->name('post.password');

	// Route for Setting
    Route::get('settings',[\App\Http\Controllers\Admin\DashboardController::class,'settings'])->name('setting');
    Route::post('settings',[\App\Http\Controllers\Admin\DashboardController::class,'post_settings'])->name('post.setting');


    Route::resource('users',UsersController::class);

    Route::resource('categories',CategoriesController::class);

    Route::resource('amenities',AmenitiesController::class);

    Route::resource('properties',PropertiesController::class);
    Route::post('properties/status',[\App\Http\Controllers\Admin\PropertiesController::class,'updateStatus'])->name('properties.status');

    Route::resource('property.galleries',PropertyGalleriesController::class);

    Route::resource('feedbacks',FeedbacksController::class);

    Route::resource('inquiries',InquiriesController::class);
    Route::post('inquiries/status',[\App\Http\Controllers\Admin\InquiriesController::class,'updateStatus'])->name('inquiries.status');

    Route::resource('areas',AreasController::class);


	// Route for Logout
	Route::post('logout',[\App\Http\Controllers\Admin\AuthController::class,'getLogout'])->name('admin.logout');

});
