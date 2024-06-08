<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SchoolProfileResource\Pages;
use App\Filament\Resources\SchoolProfileResource\RelationManagers;
use App\Models\SchoolProfile;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SchoolProfileResource extends Resource
{
    protected static ?string $model = SchoolProfile::class;
    protected static ?string $navigationGroup = 'Academic Data';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationIcon = 'heroicon-o-information-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                RichEditor::make('vision')
                    ->label('Visi')
                    ->disableToolbarButtons(['attachFiles'])
                    ->columnSpan(2)
                    ->required(),
                RichEditor::make('mission')
                    ->label('Misi')
                    ->disableToolbarButtons(['attachFiles'])
                    ->columnSpan(2)
                    ->required(),
                RichEditor::make('history')
                    ->label('Sejarah')
                    ->disableToolbarButtons(['attachFiles'])
                    ->columnSpan(2)
                    ->required(),
                RichEditor::make('goals')
                    ->label('Tujuan')
                    ->disableToolbarButtons(['attachFiles'])
                    ->columnSpan(2),
                Toggle::make('is_active')
                    ->label('Active')

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index')
                    ->label('No')
                    ->rowIndex(),
                TextColumn::make('vision')
                    ->label('Visi')
                    ->html()
                    ->limit(15),
                TextColumn::make('mission')
                    ->label('Misi')
                    ->html()
                    ->limit(15),
                TextColumn::make('history')
                    ->label('Sejarah')
                    ->html()
                    ->limit(15),
                TextColumn::make('goals')
                    ->label('Tujuan')
                    ->html()
                    ->limit(15),
                ToggleColumn::make('is_active')
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
            'index' => Pages\ManageSchoolProfiles::route('/'),
        ];
    }
}
