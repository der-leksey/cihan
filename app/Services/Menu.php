<?php

namespace App\Services;

use App\Models\Page;
use RyanChandler\FilamentNavigation\Facades\FilamentNavigation;


class Menu
{
    private static function processItem($item)
    {
        $item['link'] = $item['data']['url'] ?? '/';

        if (!empty($item['data']['id'])) {
            $resource = Page::where('id', $item['data']['id'])->first();

            if (!empty($resource)/* && $resource->is_published*/) {
                $link = '/' . config('app.locale');
                $link = $resource->slug == 'index' ? $link : $link . '/page/' . $resource->slug;
                $item['link'] = $link;
                $item['label'] = $resource->menutitle ?? $resource->title;
            }
        }

        return $item;
    }

    public static function generate()
    {
        $menu = FilamentNavigation::get('main-menu')->toArray();
        $menu = $menu['items'] ?? [];

        foreach ($menu as $key => &$item) {
            $item = static::processItem($item);

            if (!empty($item['children'])) {
                foreach ($item['children'] as $child_key => &$child) {
                    $child = static::processItem($child);
                }
            }
        }

        return $menu;
    }

}

