<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SitemapController;

Route::get('/sitemap.xml', [SitemapController::class, 'index']);

Route::get('', function () {
    return redirect('/en');
});

Route::get('/{lang}', [PageController::class, 'show']);
Route::get('/{lang}/page/{slug}', [PageController::class, 'show']);