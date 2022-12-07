<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Models\Contact;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Setting;

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

        // menu
        $menu = ['items' => []];
        $menu_obj = Menu::where('name', 'main')->first();
        if (!empty($menu_obj)) {
            $menu['items'] = $menu_obj->items;
        }

        foreach ($menu['items'] ?? [] as $key => &$item) {
            $resource = Page::where('slug', $item['slug'])->first();
            if (!empty($resource) && $resource->is_published) {
                $menu['items'][$key]['label'] = $resource->menutitle ?? $resource->title;

                
                if (!empty($item['children'])) {
                    foreach ($item['children'] as $child_key => &$child) {
                        $resource = Page::where('slug', $child['slug'])->first();
                        $menu['items'][$key]['children'][$child_key]['label'] = $resource->menutitle ?? $resource->title;
                    }
                }
                
            } else {
                unset($menu['items'][$key]);
            }
        }

        // crumbs
        $breadcrumbs = [[
            'link' => '/' . config('app.locale'),
            'title' => 'Home'
        ]];
        $parent = $page->parent_id ?? 0;
        while (!empty($parent)):
            $pg = Page::translated()->where('id', $parent)->firstOrFail();
            $parent = $pg->parent_id ?? 0;
            $breadcrumbs[] = [
                'title' => $pg->menutitle ?? $pg->title,
                'link' => '/' . config('app.locale') . '/page/' . $pg->slug,
            ];
        endwhile;
        $breadcrumbs[] = [
            'title' => $page->menutitle ?? $page->title,
        ];


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
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

}
