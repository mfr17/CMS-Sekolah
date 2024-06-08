<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Post;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PostResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PostResource\RelationManagers;
use Closure;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;
    protected static ?string $navigationGroup = 'Site Data';
    protected static ?int $navigationSort = 5;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->afterStateUpdated(function (Set $set, $state) {
                        $set('slug', Str::slug($state));
                    })
                    ->live(onBlur: true)
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                FileUpload::make('thumbnail')
                    ->label('Thumbnail')
                    ->disk('public')
                    ->directory('posts/thumbnail')
                    ->image()
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                    ->required()
                    ->columnSpan(2),
                Select::make('category_id')
                    ->required()
                    ->relationship(name: 'category', titleAttribute: 'name'),
                DateTimePicker::make('publish_at')
                    ->required(),
                RichEditor::make('body')
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('posts/image')
                    ->required()
                    ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index')
                    ->label('No')
                    ->rowIndex(),
                TextColumn::make('title')
                    ->searchable()
                    ->limit(15),
                TextColumn::make('slug')
                    ->limit(15),
                TextColumn::make('body')
                    ->limit(20)
                    ->html(),
                TextColumn::make('category.name')
                    ->searchable()
                    ->limit(15)
                    ->sortable(),
                ImageColumn::make('thumbnail'),
                TextColumn::make('publish_at')
                    ->dateTime()
                    ->sortable()
            ])->defaultSort('publish_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePosts::route('/'),
        ];
    }
}
