<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Models\PostTranslation;

class Page extends Model
{
    use HasFactory;
    use Translatable;

    protected $fillable = [
        'title',
        'menutitle',
        'description',
        'slug',
        'is_published',
        'parent_id',
        'order',
        'content',
        'blocks',
        'options',
        'image',
    ];

    public $translatedAttributes = [
        'title',
        'menutitle',
        'description',
        'content',
        'blocks',
        'options',
        'image',
    ];
}
