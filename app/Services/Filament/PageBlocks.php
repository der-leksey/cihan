<?php
namespace App\Services\Filament;

use App;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Illuminate\Support\Str;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Grid;
use FilamentCurator\Forms\Components\MediaPicker;
use FilamentTiptapEditor\TiptapEditor;

class PageBlocks
{

    private static function make($name, $fields = [])
    {
        return Builder\Block::make($name)
            ->schema(array_merge(static::share_fields(), $fields));
    }
    
    private static function share_fields()
    {
        return [
            TextInput::make('title'),
            TextInput::make('introtext'),
        ];
    }

    private static function paragraph()
    {
        return Builder\Block::make('paragraph')
            ->schema([
                MarkdownEditor::make('content')
                    ->label('Paragraph')
                    ->required(),
            ]);
    }

    private static function contact_form()
    {
        return static::make('contact_form', [
            MediaPicker::make('image'),
        ]);
    }

    private static function cards()
    {
        return static::make('cards', [
            TextInput::make('parent_id')->numeric()->required(),
        ]);
    }

    private static function items()
    {
        return static::make('items', [
            Repeater::make('items')
                ->schema([
                    MediaPicker::make('image'),
                    TextInput::make('title'),
                    Textarea::make('text')->rows(3),
                ])
        ]);
    }

    public static function get()
    {
        return Builder::make('blocks')
            ->blocks(
                [
                    static::paragraph(),
                    static::cards(),
                    static::items(),
                    static::contact_form(),
                ]
            )->collapsible();
    }
    
}