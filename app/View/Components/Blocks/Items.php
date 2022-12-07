<?php

namespace App\View\Components\Blocks;

use Illuminate\View\Component;
use App;

class Items extends Component
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
        $this->block = $block;
        //$this->block['items'] = [1,2,3];
        $this->lang = App::getLocale();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blocks.items');
    }
}
