<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriKarirResource\Pages;
use App\Filament\Resources\KategoriKarirResource\RelationManagers;
use App\Models\KategoriKarir;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KategoriKarirResource extends Resource
{
    protected static ?string $model = KategoriKarir::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationGroup = 'Master data';

    protected static ?string $navigationBadgeTooltip = 'Manampilkan Total Kategori Karir';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->placeholder('Masukkan nama kategori, example: IT, Admin, Etc')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListKategoriKarirs::route('/'),
            'create' => Pages\CreateKategoriKarir::route('/create'),
            'edit' => Pages\EditKategoriKarir::route('/{record}/edit'),
        ];
    }
}
