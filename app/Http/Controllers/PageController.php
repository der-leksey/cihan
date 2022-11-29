<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RyanChandler\FilamentNavigation\Facades\FilamentNavigation;
use App;
use App\Models\Page;
use App\Models\Contact;
use App\Models\Setting;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($lang = 'en', $slug = 'index')
    {
        App::setLocale($lang);

        $page = Page::translated()->where('slug', $slug)->firstOrFail();

        $menu = FilamentNavigation::get('main-menu')->toArray();
        foreach ($menu['items'] ?? [] as $key => $item) {
            $resource = Page::where('slug', $item['data']['slug'])->first();
            if (!empty($resource) && $resource->is_published) {
                $menu['items'][$key]['label'] = $resource->menutitle ?? $resource->title;
            } else {
                unset($menu['items'][$key]);
            }
        }

        $settings = Setting::all()->pluck(
            'value', 
            'name'
        )->toArray();

        $contacts = Contact::firstOrFail()->toArray();

        return view('base', [
            'page' => $page,
            'menu' => $menu,
            'contacts' => $contacts,
            'settings' => $settings,
            'lang' => config('app.locale'),
        ]);
    }

}
