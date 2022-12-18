<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageTranslation extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'title',
        'menutitle',
        'description',
        'content',
        'blocks',
        'options',
        'image',
    ];

    protected $casts = [
        'blocks' => 'array',
        'options' => 'array'
    ];
}
