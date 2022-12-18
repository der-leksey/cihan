<?php

namespace App\Filament\Resources\BlockCollectionResource\Pages;

use App\Filament\Resources\BlockCollectionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBlockCollections extends ListRecords
{
    protected static string $resource = BlockCollectionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
