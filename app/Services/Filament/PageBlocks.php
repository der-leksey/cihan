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
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Grid;
use FilamentCurator\Forms\Components\MediaPicker;
use FilamentTiptapEditor\TiptapEditor;

class PageBlocks {

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

    public static function get()
    {
        return Builder::make('blocks')
            ->blocks([
                static::paragraph(),
                static::contact_form(),
                // Builder\Block::make('heading')
                //     ->schema([
                //         TextInput::make('content')
                //             ->label('Heading')
                //             ->required(),
                //         TextInput::make('abc')
                //             ->label('222')
                //             //->hidden(fn (Closure $get) => $get('level') == 'h1')
                //             ->required(),
                //         Select::make('level')
                //             ->options([
                //                 'h1' => 'Heading 1',
                //                 'h2' => 'Heading 2',
                //                 'h3' => 'Heading 3',
                //                 'h4' => 'Heading 4',
                //                 'h5' => 'Heading 5',
                //                 'h6' => 'Heading 6',
                //             ])
                //             ->required()
                //             ->reactive(),
                //     ]),
                
                // Builder\Block::make('image')
                //     ->schema([
                //         FileUpload::make('url')
                //             ->label('Image')
                //             ->image()
                //             ->required(),
                //         TextInput::make('alt')
                //             ->label('Alt text')
                //             ->required(),
                //     ]),
                // static::form(),
                ])->collapsible();
    }

}