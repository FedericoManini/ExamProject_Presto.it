<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/profile',[PublicController::class, 'profile'])->middleware('auth')->name('profile');
Route::patch('/profile/{article}', [PublicController::class, 'destroyItem'])->middleware('auth')->name('destroy_article');
Route::get('/contact/{article}', [PublicController::class, 'contact'])->middleware('auth')->name('contact');
Route::post('/contact/submit/{article}', [PublicController::class, 'contactSeller'])->middleware('auth')->name('submit');

Route::get('/',[PublicController::class, 'home'])->name('home');
Route::get('/category/{category}', [PublicController::class, 'categoryShow'])->name('categoryShow');
Route::get('/index', [PublicController::class, 'index'])->name('index');

Route::get('/article/create', [ArticleController::class, 'create'])->middleware('auth')->name('article.create');
Route::get('article/show/{article}', [ArticleController::class, 'show'])->name('article.show');

Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::patch('/accetta/article/{article}', [RevisorController::class, 'acceptArticle'])->middleware('isRevisor')->name('revisor.accept_article');
Route::patch('/rifiuta/article/{article}', [RevisorController::class, 'rejectArticle'])->middleware('isRevisor')->name('revisor.reject_article');

Route::get('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
Route::get('/rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'])->middleware('auth')->name('make.revisor');

Route::get('/ricerca/articolo', [PublicController::class,'searchArticles'])->name('article.search');

// cambio lingua
Route::post('/lingua/{lang}', [PublicController::class,'setLanguage'])->name('setLocale');