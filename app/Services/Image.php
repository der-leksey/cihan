<?php

namespace App\Services;

use FilamentCurator\Models\Media;
use Intervention\Image\Facades\Image as ImageResizer;

class Image
{
    public static $defaultPath = '/storage/images/noimage.png';

    public static function getPath($id = 0)
    {
        $path = static::$defaultPath;
        $media = Media::where('id', (int)$id)->first();
        if (!empty($media) && !empty($media->filename)) {
            $path = '/storage/' . $media->filename;
        }
        return $path;
    }

    // public static function getThumb()
    // {
    //     $settings = ImageResizer::get()->pluck('value', 'name');
    //     return $settings;
    // }
}
