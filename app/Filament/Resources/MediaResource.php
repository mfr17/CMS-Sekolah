<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MediaResource\Pages;
use App\Filament\Resources\MediaResource\RelationManagers;
use App\Models\Media;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MediaResource extends Resource
{
    protected static ?string $model = Media::class;
    protected static ?string $navigationGroup = 'Site Data';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationIcon = 'heroicon-o-folder';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required(),
                TextInput::make('description')
                    ->required(),
                Select::make('type')
                    ->options([
                        'image' => 'Image',
                        'video' => 'Video'
                    ])
                    ->live()
                    ->required(),
                Select::make('group')
                    ->options([
                        'information' => 'Information',
                        'gallery' => 'Gallery',
                        'profile' => 'Profile'
                    ])
                    ->live()
                    ->required(),
                TextInput::make('url')
                    ->label('Video Url (Youtube)')
                    ->visible(
                        fn ($get) => $get('type') == 'video'
                    )
                    ->required(),
                FileUpload::make('url')
                    ->label('Image')
                    ->disk('public')
                    ->directory('media')
                    ->image()
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                    ->maxSize(2048)
                    ->visible(
                        fn ($get) => $get('type') == 'image'
                    )
                    ->required(),
                Toggle::make('is_active')
                    ->label('Publish')
                    ->inline(false)
                    ->required()
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
                    ->limit(20),
                TextColumn::make('description')
                    ->limit(20),
                ImageColumn::make('url')
                    ->label("Thumbnail")
                    ->searchable(),
                TextColumn::make('type')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('group')
                    ->sortable()
                    ->searchable(),
                ToggleColumn::make('is_active')
                    ->label('Publish')
                    ->sortable(),
            ])
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
            'index' => Pages\ManageMedia::route('/'),
        ];
    }
}
