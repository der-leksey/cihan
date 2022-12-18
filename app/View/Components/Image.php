<?php

namespace App\View\Components;

use Illuminate\View\Component;
use FilamentCurator\Models\Media;
use Intervention\Image\Facades\Image as ImageResizer;

class Image extends Component
{
    public $path;
    public $thumb;
    public $width;
    public $height;
    public $cached;
    public $ext;
    public $type;
    public $format;

    private $fullPath;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $w, $h = null, $ratio = null, $type = 'image', $format = 'webp')
    {
        $this->id = $id;
        $this->path = "/storage/images/noimage.png";
        $this->fullPath = public_path() . "/storage/images/noimage.png";
        $this->type = $type;
        $this->format = $format;
        $this->cached = true;

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

        $thumb_name = [$id ?: 0, $w, $h ?? 0];
        $thumb_name = implode('_', $thumb_name);
        $this->thumb = "/storage/media/thumbs/{$thumb_name}.{$this->format}";
        
        $this->width = $w;
        $this->height = $h ?? 'auto';
        
        if ($id) {
            $media = Media::where('id', $id)->first();

            if (!empty($media) && !empty($media->filename)) {
                $this->ext = $media->ext == 'svg' ? 'svg' : $this->format;
                $this->path = "/storage/{$media->filename}";
                $this->fullPath = public_path() . "/storage/{$media->filename}";
            }
        }

        if (!file_exists(public_path() . $this->thumb)) {
            $this->cached = false;

            if ($this->ext != 'svg') {
                $img = ImageResizer::make($this->fullPath);
                $img->fit($w, $h, function($constraint) {
                    $constraint->upsize();
                });
                $img->save(public_path() . $this->thumb, 95, $this->format);
            }
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
