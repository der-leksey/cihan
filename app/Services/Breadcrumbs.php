<?php

namespace App\Services;

use App\Models\Page;

class Breadcrumbs
{
    public static function get(object $page)
    {
        $home = Page::translated()->where('slug', 'index')->first();

        $breadcrumbs = [[
            'link' => '/' . config('app.locale'),
            'title' => $home->menutitle ?? $home->title,
        ]];

        $parent = $page->parent_id ?? 0;

        while (!empty($parent)):
            $pg = Page::translated()->where('id', $parent)->first();
            $parent = $pg->parent_id ?? 0;
            $breadcrumbs[] = [
                'title' => $pg->menutitle ?? $pg->title,
                'link' => '/' . config('app.locale') . '/page/' . $pg->slug,
            ];
        endwhile;

        $breadcrumbs[] = [
            'title' => $page->menutitle ?? $page->title,
        ];

        return $breadcrumbs;
    }
}
