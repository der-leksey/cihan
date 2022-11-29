<?php

namespace App\Filament\Resources\PostResource\Pages;

use App;
use App\Filament\Resources\PostResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostTranslation;


class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    public Post $post;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    // protected function handleRecordUpdate(Model $record, array $data): Model
    // {
    //     $record->update($data);
    //     //$record->translate($data['locale'])->update($data);
    //     return $record;
    // }
}
