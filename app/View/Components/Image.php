<?php

namespace App\View\Components;

use Illuminate\View\Component;
use FilamentCurator\Models\Media;

class Image extends Component
{
    public $id;
    public $path;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
        $this->path = '';
        $media = Media::where('id', $id)->first();
        if (!empty($media)) {
            $this->path = $media->getSizeUrl('') ?? '';
        }
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        //$this->id = 5;
        return view('components.image');
    }
}
