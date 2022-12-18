<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Models\BlockCollectionTranslation;

class Setting extends Model
{
    use HasFactory;
    use Translatable;

    protected $fillable = [
        'name',
        'section',
        'type',
        'value',
    ];

    public $translatedAttributes = [
        'value',
    ];
}
