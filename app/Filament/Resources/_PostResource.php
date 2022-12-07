<?php

namespace App\Filament\Resources;

use App;
use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use App\Models\PostTranslation;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;
use Closure;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Builder as BuilderField;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use FilamentCurator\Forms\Components\MediaPicker;
use FilamentTiptapEditor\TiptapEditor;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()->schema([
                TextInput::make('title')
                    ->reactive()
                    ->afterStateUpdated(function (Closure $get, Closure $set, $state) {
                        
                    })->required(),

                // Select::make('locale')
                //     ->options([
                //         'en' => 'en',
                //         'ru' => 'ru',
                //     ])
                //     //->disablePlaceholderSelection()
                //     //->default('ru')
                //     ->reactive()
                //     ->afterStateUpdated(function (Closure $get, Closure $set, $state) {
                //         // $post = Post::findOrFail($get('id'));
                //         // $set('title', $post->translate($state)->title);
                //         // $set('image', $post->translate($state)->image);
                //         // $set('content', $state);
                //     })->required(),
                // TextInput::make('slug')->required(),
                //MediaPicker::make('image'),
                //RichEditor::make('content')->required(),
                // Toggle::make('is_published'),
                TiptapEditor::make('content'),

            ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->searchable(),
                TextColumn::make('title')->limit(20)->sortable()->searchable(),
                TextColumn::make('slug')->limit(50)->sortable()->searchable(),
                ImageColumn::make('image'),
                BooleanColumn::make('is_published')->searchable(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}