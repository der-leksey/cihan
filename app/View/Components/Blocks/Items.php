<?php

namespace App\View\Components\Blocks;

use Illuminate\View\Component;
use App\Models\BlockCollection;

class Items extends Component
{
    public $block;
    public $items;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($block)
    {
        $items = [];
        
        if (!empty($block['collection_id'])) {
            $itemsObj = BlockCollection::where('id', $block['collection_id'])->first();
            $items = !empty($itemsObj) ? $itemsObj->items : [];
        }
        
        $this->block = $block;
        $this->items = $items;
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
