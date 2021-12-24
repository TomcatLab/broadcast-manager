<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CronController;
use App\Http\Controllers\SettingsController;


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

Route::get('/', [HomeController::class, 'index'])->name('dashboard');
Route::get('/home', [HomeController::class, 'index'])->name('dashboard');
Route::get('/cron/status', [HomeController::class, 'status'])->name('crone-status');

Route::get('/providers', [ProviderController::class, 'index'])->name('providers');
Route::get('/providers/new-provider', [ProviderController::class, 'new'])->name('new-provider');
Route::post('/providers/new-provider', [ProviderController::class, 'save'])->name('new-provider');
Route::get('/providers/publish-provider/{id}', [ProviderController::class, 'publish'])->name('provider-publish');
Route::get('/providers/publish-provider/{id}/{val}', [ProviderController::class, 'publish'])->name('provider-publish');
Route::get('/providers/new-provider/{id}', [ProviderController::class, 'new'])->name('new-provider');
Route::post('/providers/new-provider/{id}', [ProviderController::class, 'save'])->name('new-provider');
Route::get('/providers/delete-provider/{id}', [ProviderController::class, 'delete'])->name('delete-provider');

Route::get('/providers/add-category', [ProviderController::class, 'addCategory'])->name('add-category');
Route::post('/providers/add-category', [ProviderController::class, 'saveCategory'])->name('add-category');
Route::get('/providers/add-category/{id}', [ProviderController::class, 'addCategory'])->name('add-category');
Route::post('/providers/add-category/{id}', [ProviderController::class, 'saveCategory'])->name('add-category');
Route::get('/providers/edit-provider-category/{id}/{pcid}', [ProviderController::class, 'addCategory'])->name('edit-provider-category');
Route::post('/providers/edit-provider-category/{id}/{pcid}', [ProviderController::class, 'saveCategory'])->name('edit-provider-category');
Route::get('/providers/delete-provider-category/{id}', [ProviderController::class, 'deleteProviderCategory'])->name('delete-provider-category');

Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
Route::get('/categories/new-category', [CategoriesController::class, 'new'])->name('new-category');
Route::post('/categories/new-category', [CategoriesController::class, 'save'])->name('new-category');
Route::get('/categories/new-category/{id}', [CategoriesController::class, 'new'])->name('new-category');
Route::post('/categories/new-category/{id}', [CategoriesController::class, 'save'])->name('new-category');
Route::get('/categories/delete-category/{id}', [CategoriesController::class, 'delete'])->name('delete-category');

Route::group(['namespace' => 'settings', 'prefix' => 'settings'], function(){
    Route::get('/general', [SettingsController::class, 'general']);
    Route::post('/general', [SettingsController::class, 'generalSave']);
    Route::get('/menu', [SettingsController::class, 'menu']);
    Route::post('/menu', [SettingsController::class, 'saveMenu']);
    Route::get('/menu/delete/{id}', [SettingsController::class, 'delete']);
});

Route::get('/cron', [CronController::class, 'index'])->name('crone');

Route::get('/test', function(){
    return Bbc::fetch();
});



Auth::routes();

// // Registration Routes...
// $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// $this->post('register', 'Auth\RegisterController@register');

// // Password Reset Routes...
// $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// $this->post('password/reset', 'Auth\ResetPasswordController@reset');