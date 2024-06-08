<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteSettingResource\Pages;
use App\Filament\Resources\SiteSettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SiteSettingResource extends Resource
{
    protected static ?string $model = Setting::class;
    protected static ?string $navigationGroup = 'Site Data';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('label'),
                TextColumn::make('value')
                    ->limit(40),
            ])
            ->paginated(false)
            ->defaultPaginationPageOption(25)
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->form(function (Setting $record) {
                    switch ($record->type) {
                        case 'int':
                            return [Forms\Components\TextInput::make('value')->label($record->label)->tel()];
                            break;
                        case 'text':
                            return [Forms\Components\TextInput::make('value')->label($record->label)];
                            break;
                        case 'longtext':
                            return [Forms\Components\RichEditor::make('value')->label($record->label)];
                            break;
                        case 'image':
                            return [Forms\Components\FileUpload::make('value')
                                ->label($record->label)
                                ->image()
                                ->maxSize(3072)
                                ->disk('public')
                                ->directory('site/icon')];
                            break;
                    }
                }),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSiteSettings::route('/'),
        ];
    }
}
