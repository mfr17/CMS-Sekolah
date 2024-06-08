<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Major;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\MajorResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MajorResource\RelationManagers;
use Closure;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;

class MajorResource extends Resource
{
    protected static ?string $model = Major::class;

    protected static ?string $navigationGroup = 'Academic Data';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Jurusan')
                    ->afterStateUpdated(function (Set $set, $state) {
                        $set('slug', Str::slug($state));
                    })
                    ->live(onBlur: true)
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                FileUpload::make('thumbnail')
                    ->disk('public')
                    ->directory('image/major')
                    ->image()
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                    ->maxSize(2048)
                    ->columnSpan(2)
                    ->required(),
                RichEditor::make('description')
                    ->label('Deskripsi')
                    ->disableToolbarButtons([
                        'attachFiles',
                    ])
                    ->columnSpan(2)
                    ->required(),
                RichEditor::make('instructor')
                    ->label('Pengajar')
                    ->disableToolbarButtons([
                        'attachFiles',
                    ])
                    ->columnSpan(2)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // TextColumn::make('index')
                //     ->label('No')
                //     ->rowIndex(),
                TextColumn::make('name')
                    ->sortable(),
                TextColumn::make('slug')
                    ->limit(15),
                TextColumn::make('description')
                    ->html()
                    ->limit(15),
                TextColumn::make('instructor')
                    ->html()
                    ->limit(10),
                ImageColumn::make('thumbnail')
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
            'index' => Pages\ManageMajors::route('/'),
        ];
    }
}
