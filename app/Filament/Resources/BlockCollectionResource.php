<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlockCollectionResource\Pages;
use App\Filament\Resources\BlockCollectionResource\RelationManagers;
use App\Models\BlockCollection;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use FilamentCurator\Forms\Components\MediaPicker;

class BlockCollectionResource extends Resource
{
    protected static ?string $model = BlockCollection::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('name')->required(),
                    Repeater::make('items')
                        ->schema([
                            MediaPicker::make('image'),
                            TextInput::make('title'),
                            Textarea::make('text')->rows(3),
                        ])
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->searchable(),
                TextColumn::make('name')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlockCollections::route('/'),
            'create' => Pages\CreateBlockCollection::route('/create'),
            'edit' => Pages\EditBlockCollection::route('/{record}/edit'),
        ];
    }    
}
