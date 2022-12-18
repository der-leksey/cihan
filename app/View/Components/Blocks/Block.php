<?php

namespace App\View\Components\Blocks;

use Illuminate\View\Component;
use App;
use App\Models\Page;

class Block extends Component
{
    public $block;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($block)
    {
        // $items = Page::where('parent_id', 3)->get();

        $this->block = $block;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blocks.block');
    }
}
