<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Frontend\RecruitmentController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ], function () {

    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/about_us', 'about_us')->name('about_us');
        Route::get('/contact_us', 'contact_us')->name('contact_us');
        Route::get('blogs', 'blogs')->name('frontend.blogs');
        Route::get('blog/{id}', 'blogDetails')->name('blog.details');
        Route::get('privacy-policy', 'privacyPolicy')->name('privacy-policy');
        Route::get('usage-policy', 'usagePolicy')->name('usage-policy');
        Route::get('services', 'services')->name('services');
        Route::get('project','project')->name('project');
        Route::get('team','team')->name('team');
        Route::get('service/{id}', 'serviceDetails')->name('service.details');
        Route::get('/recruitments', 'recruitment')->name('recruitments');
        //check out service request
        Route::get('checkout/{id}','checkout')->name('checkout');
        Route::post('store/{id}','store')->name('store');

    });
});

Route::post('/contact_us', [ContactController::class,'store'])->name('contact.store');
Route::post('/recruitments', [RecruitmentController::class,'store'])->name('recruitments.store');
