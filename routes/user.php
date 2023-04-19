<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\AgentController;
use App\Http\Controllers\User\ProjectController;
use App\Http\Controllers\User\BlogController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\PdfController;
use App\Http\Controllers\User\LocationController;
use App\Http\Controllers\User\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('index');

// Route::get('/search', [HomeController::class,'search'])->name('search');

// Route::get('/faq', 'FaqController@show')->name('faq');


// Route::get('/contact-us', 'ContactController@show')->name('contact');
// Route::get('/consulting', 'ContactController@show1')->name('consulting');
Route::post('/contact-post', [ContactController::class,'store'])->name('contact.post');
Route::post('/conseling', [ContactController::class,'conseling'])->name('conseling.store');
// Route::post('/consulting-post', 'ContactController@store1')->name('consulting.post');

//Route::get('projects/{id?}', 'ProjectController@index')->name('project.index');
Route::get('properties/{id}', [ProjectController::class,'show'])->name('project.show');
Route::get('agent/{slug}', [AgentController::class,'show'])->name('agent.show');

//Route::get('/villas/{id?}', 'VillaController@index')->name('villa.index');
//Route::get('/villa/{id}', 'VillaController@show')->name('villa.show');
//Route::get('/villas-search/{type}', 'VillaController@search')->name('villas.search');

Route::get('{slug}', [BlogController::class,'show'])->name('blog.show');

// Route::get('/services/{slug?}', 'ServiceController@index')->name('service.index');
// Route::get('/service/{id}', 'ServiceController@show')->name('service.show');


Route::get('خرید-خانه-در-استانبول', [HomeController::class,'conseling'])->name('conseling');
Route::get('شهروندی-ترکیه', [HomeController::class,'citizenship'])->name('citizenship');
Route::get('پروژه-ها', [HomeController::class,'projects'])->name('projects');
Route::get('listings/office', [HomeController::class,'office'])->name('projects.office');
Route::get('listings/villa', [HomeController::class,'villa'])->name('projects.villa');
Route::get('listings/consept', [HomeController::class,'consept'])->name('projects.consept');
Route::get('listings/installments', [HomeController::class,'installments'])->name('projects.installments');

Route::get('درباره-ما', [HomeController::class,'about_us'])->name('about_us');
Route::get('اخبار-و-مقالات-به-روز-ترکیه', [NewsController::class,'index'])->name('news.index');
Route::get('تماس-با-ما', [HomeController::class,'contact_us'])->name('contact_us');

Route::get('/download-pdf/{id}', [PdfController::class, 'download'])->name('download.pdf');

Route::get('/location/{id}', [LocationController::class, 'show'])->name('location.show');

Route::post('/login_user',[LoginController::class,'login_panel'])->name('login_panel');
