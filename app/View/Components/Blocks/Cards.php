<?php

namespace App\View\Components\Blocks;

use Illuminate\View\Component;
use App;
use App\Models\Page;

class Cards extends Component
{
    public $block;
    public $lang;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($block)
    {
        $items = Page::where('parent_id', $block['parent_id'] ?? 0)->get();

        $this->block = $block;
        $this->block['items'] = $items;
        $this->lang = App::getLocale();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blocks.cards');
    }
}
