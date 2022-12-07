<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Filament\Resources\MenuResource\RelationManagers;
use App\Models\Menu;
use App\Models\Page;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Awcodes\FilamentTableRepeater\Components\TableRepeater;
use Yemenpoint\FilamentTree\Forms\Components\TreeField;


class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    //private static function

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('name')->required(),
                    TreeField::make("items"),
                    // Repeater::make('items')
                    //     ->columns(2)
                    //     ->schema([
                    //         TextInput::make('name'),
                    //         // Select::make('model')
                    //         //     ->label('Model')
                    //         //     ->placeholder('Select model')
                    //         //     ->options([
                    //         //         'page' => 'Page',
                    //         //         //'post' => 'Posts'
                    //         //     ])
                    //         //     ->required()
                    //             //->reactive(),
                    //         Select::make('slug')
                    //             ->label('Page')
                    //             ->placeholder('Select page')
                    //             ->searchable()
                    //             ->options(function() {
                    //                 return Page::translated()->get()->pluck('title', 'slug');
                    //             }),
                    //         TableRepeater::make('children')
                    //             ->columnSpan(2)
                    //             ->columns(2)
                    //             ->schema([
                    //                 TextInput::make('name'),
                    //                 // Select::make('model')
                    //                 //     ->label('Model')
                    //                 //     ->placeholder('Select model')
                    //                 //     ->options([
                    //                 //         'page' => 'Page',
                    //                 //         //'post' => 'Posts'
                    //                 //     ])
                    //                 //     ->required()
                    //                 //     //->reactive(),
                    //                 Select::make('slug')
                    //                     ->label('Page')
                    //                     ->placeholder('Select page')
                    //                     ->searchable()
                    //                     ->options(function() {
                    //                         return Page::translated()->get()->pluck('title', 'slug');
                    //                     }),
                    //             ])
                    //     ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }    
}
