<?php

namespace App\Filament\Resources\BlockCollectionResource\Pages;

use App\Filament\Resources\BlockCollectionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBlockCollection extends EditRecord
{
    protected static string $resource = BlockCollectionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
