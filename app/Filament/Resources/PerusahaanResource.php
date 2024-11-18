<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PerusahaanResource\Pages;
use App\Filament\Resources\PerusahaanResource\RelationManagers;
use App\Models\Perusahaan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class PerusahaanResource extends Resource
{
    protected static ?string $model = Perusahaan::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $navigationGroup = 'Master data';

    protected static ?string $navigationBadgeTooltip = 'Manampilkan Total Perusahaan dan Branch';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->placeholder('Masukan Nama Parusahaan Main atau Branch'),
                Forms\Components\Textarea::make('address')
                    ->required()
                    ->placeholder('Masukan Alamat Parusahaan'),
                Forms\Components\TextInput::make('city')
                    ->required()
                    ->placeholder('Masukan Kota tau Kab Parusahaan'),
                Forms\Components\TextInput::make('state')
                    ->required()
                    ->placeholder('Masukan Provinsi'),
                Forms\Components\TextInput::make('postal_code')
                    ->required()
                    ->placeholder('Masukan Kode Pos'),
                Forms\Components\TextInput::make('country')
                    ->default('Indonesia')
                    ->placeholder('Masukan Negara'),
                Forms\Components\TextInput::make('maps')
                    ->tooltip("
                        1. Buka Google Maps di browser.
                        2. Pilih Lokasi yang ingin ditampilkan.
                        3. Klik Bagikan, pilih Sematkan peta.
                        4. Salin URL dari bagian src di iframe.
                        Ingan jangan di copy semua cukup isi dari src
                    ")
                    ->placeholder('Masukan Link google maps'),
                Forms\Components\Select::make('branch_type')
                    ->label('Tipe Pursahaan')
                    ->required()
                    ->options([
                        'Branch' => 'Branch',
                        'Main' => 'Main'
                    ])
                    ->default('Branch')
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->description('')
                    ->tooltip('')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->description(fn ($record): string => Str::limit($record->maps, 30, '...'))
                    ->tooltip(fn ($record): string => $record->maps)
                    ->limit(30)
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->description(fn ($record): string => Str::limit($record->state, 30, '...'))
                    ->tooltip('')
                    ->searchable(),
                Tables\Columns\TextColumn::make('country')
                    ->description('')
                    ->tooltip('')
                    ->searchable(),
                Tables\Columns\TextColumn::make('branch_type')
                    ->description('')
                    ->tooltip('')
                    ->searchable(),
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
            'index' => Pages\ListPerusahaans::route('/'),
            'create' => Pages\CreatePerusahaan::route('/create'),
            'edit' => Pages\EditPerusahaan::route('/{record}/edit'),
        ];
    }
}
