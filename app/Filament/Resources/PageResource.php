<?php

namespace App\Filament\Resources;

use App;
use App\Models\Page;
use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Closure;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Builder as BuilderField;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Grid;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;


class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Grid::make(3)
                ->schema([
                    Card::make()->schema([
                        TextInput::make('title')->required(),
                        TextInput::make('description'),
                        RichEditor::make('content'),
                        BuilderField::make('blocks')
                            ->blocks([
                                BuilderField\Block::make('heading')
                                    ->schema([
                                        TextInput::make('content')
                                            ->label('Heading')
                                            ->required(),
                                        TextInput::make('abc')
                                            ->label('222')
                                            ->hidden(fn (Closure $get) => $get('level') == 'h1')
                                            ->required(),
                                        Select::make('level')
                                            ->options([
                                                'h1' => 'Heading 1',
                                                'h2' => 'Heading 2',
                                                'h3' => 'Heading 3',
                                                'h4' => 'Heading 4',
                                                'h5' => 'Heading 5',
                                                'h6' => 'Heading 6',
                                            ])
                                            ->required()
                                            ->reactive(),
                                    ]),
                                BuilderField\Block::make('paragraph')
                                    ->schema([
                                        MarkdownEditor::make('content')
                                            ->label('Paragraph')
                                            ->required(),
                                    ]),
                                BuilderField\Block::make('image')
                                    ->schema([
                                        FileUpload::make('url')
                                            ->label('Image')
                                            ->image()
                                            ->required(),
                                        TextInput::make('alt')
                                            ->label('Alt text')
                                            ->required(),
                                    ]),
                                ])
                    ])->columnSpan(2),

                    Card::make()->schema([
                        TextInput::make('slug')->required(),
                        TextInput::make('menutitle'),
                        Toggle::make('published'),
                        FileUpload::make('image')->image(),
                        TextInput::make('parent_id')->numeric(),
                        TextInput::make('order')->numeric(),
                    ])->columnSpan(1),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->searchable(),
                TextColumn::make('title')->limit(20)->sortable()->searchable(),
                TextColumn::make('slug')->limit(50)->sortable()->searchable(),
                // SelectColumn::make('parent')
                //     ->default(0)
                //     ->options(Page::all()->pluck('title', 'id')),
                TextColumn::make('parent_id')->sortable()->formatStateUsing(fn (Page $record)
                    => !empty($record->parent) ? Page::findOrFail($record->parent_id)->title : ''
                ),
                TextInputColumn::make('order')->rules(['integer', 'filled'])->sortable(),
                ImageColumn::make('image'),
                BooleanColumn::make('is_published')->sortable()->action(function($record, $column) {
                    $name = $column->getName();
                    $record->update([
                        $name => !$record->$name
                    ]);
                }),
            ])
            ->filters([
                SelectFilter::make('parent_id')
                    ->options(Page::all()->pluck('title', 'id'))
                    ->searchable()
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

    // protected function getTableRecordsPerPageSelectOptions(): array 
    // {
    //     return [1000];
    // } 
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }    
}
