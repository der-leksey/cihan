<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Models\BlockCollectionTranslation;

class BlockCollection extends Model
{
    use HasFactory;
    use Translatable;

    protected $fillable = [
        'name',
        'items',
    ];

    public $translatedAttributes = [
        'items',
    ];
}
