<?php

namespace App\Filament\Resources;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use RyanChandler\FilamentNavigation\Facades\FilamentNavigation;
use App\Models\Page;


FilamentNavigation::addItemType('Page link', [
    TextInput::make('id')
        // ->label('Page')
        // ->placeholder('Select page')
        // ->searchable()
        // ->options(function() {
        //     return Page::translated()->get()->pluck('title', 'id');
        // })
]);
