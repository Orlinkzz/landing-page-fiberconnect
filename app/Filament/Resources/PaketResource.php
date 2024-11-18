<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaketResource\Pages;
use App\Filament\Resources\PaketResource\RelationManagers;
use App\Models\Paket;
use App\Models\Perusahaan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use function Filament\Support\format_money;
class PaketResource extends Resource
{
    protected static ?string $model = Paket::class;

    protected static ?string $navigationIcon = 'heroicon-o-queue-list';

    protected static ?string $navigationGroup = 'Home';

    protected static ?string $navigationBadgeTooltip = 'Manampilkan Paket Yang Masih Draft';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'Draft')
                                ->count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_paket')
                    ->required()
                    ->placeholder('Masukkan Nama Paket'),
                Forms\Components\TextInput::make('kuota')
                    ->placeholder('Masukkan Kuata yang di dapatkan, example Unlimited')
                    ->required()
                    ->default('Unlimited'),
                Forms\Components\TextInput::make('kecepatan')
                    ->placeholder('Masukkan Kecepatan Internet, example 30 Mbps')
                    ->required()
                    ->default('10 Mbps'),
                Forms\Components\TextInput::make('harga')
                    ->placeholder('Masukkan Harga Paker')
                    ->numeric()
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        'Aktif' => 'Aktif',
                        'Tidak Aktif' => 'Tidak Aktif',
                        'Draft' => 'Draft'
                    ]) ->default('Draft'),
                Forms\Components\Select::make('perusahaan_id')
                    ->label('perusahaan')
                    ->options(Perusahaan::all()->pluck('name', 'id')->toArray())
                    ->default(1)
                    ->required()
                    ->searchable(),
                Forms\Components\RichEditor::make('fitur')
                    ->tooltip('Jika ingin menambahkan enter saat di view tuliskan tag `<br>` tanpa tanda `')
                    ->required()
                    ->placeholder('Masukkan Fitur apa saja yang di dapatkan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_paket')
                    ->searchable(),
                Tables\Columns\TextColumn::make('harga')
                    ->money('IDR')
                    ->formatStateUsing(function ($state) {
                        return Str::replace('IDR', 'Rp', format_money($state, 'IDR'));
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('kecepatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kuota')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fitur')
                    ->limit(30)
                    ->markdown()
                    ->searchable(),
                Tables\Columns\TextColumn::make('perusahaan.city')
                    ->label('Wilayah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Aktif' => 'success',
                        'Tidak Aktif' => 'danger',
                        'Draft' => 'warning',
                    })
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
            'index' => Pages\ListPakets::route('/'),
            'create' => Pages\CreatePaket::route('/create'),
            'edit' => Pages\EditPaket::route('/{record}/edit'),
        ];
    }
}
