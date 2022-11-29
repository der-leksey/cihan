<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NavigationResource\Pages;
use App\Filament\Resources\NavigationResource\RelationManagers;
use App\Models\Navigation;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Forms\Components\Select;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use RyanChandler\FilamentNavigation\Facades\FilamentNavigation;
use App\Models\Page;

FilamentNavigation::addItemType('Page link', [
    Select::make('slug')
        ->label('Page')
        ->placeholder('Select page')
        ->searchable()
        ->options(function() {
            return Page::translated()->get()->pluck('title', 'slug');
        })
]);