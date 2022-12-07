<?php

namespace App\View\Components;

use Illuminate\View\Component;
use FilamentCurator\Models\Media;
use ImageResizer;


class Image extends Component
{

    public $path;
    public $thumb;
    public $width;
    public $height;
    public $ext;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $w, $h = null, $ratio = null)
    {
        $this->id = $id;
        $this->path = '';

        if ($w == '1/2') {
            $w = 632;
        } else if ($w == '1/3') {
            $w = 411;
        } else if ($w == '1/4') {
            $w = 300;
        }

        if (!empty($ratio)) {
            $ratio = explode('/', $ratio);
            $h = (int)($w * $ratio[1] / $ratio[0]);
        }

        $thumb_name = [$id, $w, $h ?? 0];
        $thumb_name = implode('_', $thumb_name);
        $thumb_path = "/storage/media/thumbs/{$thumb_name}.webp";

        $media = Media::where('id', $id)->first();

        if (!empty($media)) {
            if ($media->ext != 'svg') {
                if (!file_exists(public_path() . $thumb_path)) {
                    $img = ImageResizer::make(public_path() . "/storage/{$media->filename}");
                    $img->fit($w, $h, function($constraint) {
                        $constraint->upsize();
                    });
                    $img->save(public_path() . $thumb_path, 95, 'webp');
    
                    $this->cached = false;
                } else {
                    $this->cached = true;
                }
                $this->ext = 'webp';
            } else {
                $this->ext = 'svg';
            }
            
            $this->width = $w;
            $this->height = $h ?? 'auto';
            $this->path = $media->getSizeUrl('');
            $this->thumb = $thumb_path;
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
