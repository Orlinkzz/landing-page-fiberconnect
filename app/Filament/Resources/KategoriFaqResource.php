<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriFaqResource\Pages;
use App\Filament\Resources\KategoriFaqResource\RelationManagers;
use App\Models\KategoriFaq;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KategoriFaqResource extends Resource
{
    protected static ?string $model = KategoriFaq::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationGroup = 'Master data';

    protected static ?string $navigationBadgeTooltip = 'Manampilkan Total Kategori faqs';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->placeholder('Masukkan nama kategori, example: Umum, Billing, Etc')
                    ->required(),
                Forms\Components\TextInput::make('description')
                    ->placeholder('Masukkan deskripsi'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('description')->searchable(),
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
            'index' => Pages\ListKategoriFaqs::route('/'),
            'create' => Pages\CreateKategoriFaq::route('/create'),
            'edit' => Pages\EditKategoriFaq::route('/{record}/edit'),
        ];
    }
}
