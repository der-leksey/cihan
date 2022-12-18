<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Page;

class SitemapController extends Controller
{
    public function index() {
        $pages = Page::all();
        return response()->view('service.sitemap', [
            'pages' => $pages
        ])->header('Content-Type', 'text/xml');
      }
}