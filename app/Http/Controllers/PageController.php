<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Page;
use App\Services\Menu;
use App\Services\Settings;
use App\Services\Breadcrumbs;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($lang = 'en', $slug = null)
    {
        $page = Page::translated()->where('slug', $slug ?? 'index')->firstOrFail();

        return view('base', [
            'page' => $page,
            'menu' => Menu::generate(),
            'contacts' => Contact::firstOrFail()->toArray(),
            'settings' => Settings::getSettings(),
            'lang' => config('app.locale'),
            'breadcrumbs' => Breadcrumbs::get($page),
        ]);
    }

}
