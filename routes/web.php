<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

//Route::get('lang/{language}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);
Route::get('/{lang?}', [PageController::class, 'show']);
Route::get('/{lang}/page/{slug}', [PageController::class, 'show']);
