<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PromoResource\Pages;
use App\Filament\Resources\PromoResource\RelationManagers;
use App\Models\Perusahaan;
use App\Models\Promo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Support\Enums\IconPosition;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Carbon;

class PromoResource extends Resource
{
    protected static ?string $model = Promo::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    protected static ?string $navigationGroup = 'Home';

    protected static ?string $navigationBadgeTooltip = 'Manampilkan Total Close Date Yang Masih Aktif';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::whereNotNull('closing_date')
                                ->where('tanggal_selesai', '>', now())
                                ->count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_promo')
                    ->placeholder('Masukkan Nama Promo')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_mulai')
                    ->default(Carbon::today())
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        'Aktif' => 'Aktif',
                        'Tidak Aktif' => 'Tidak Aktif',
                        'Draft' => 'Draft'
                    ]) ->default('Draft'),
                Forms\Components\DatePicker::make('tanggal_selesai')
                    ->default(Carbon::today()->addMonth())
                    ->required(),
                Forms\Components\FileUpload::make('gambar')
                    ->required()
                    ->directory('promo')
                    ->previewable(false)
                    ->visibility('private'),
                Forms\Components\Select::make('perusahaan_id')
                    ->label('perusahaan')
                    ->options(Perusahaan::all()->pluck('name', 'id')->toArray())
                    ->required()
                    ->searchable(),
                Forms\Components\RichEditor::make('deskripsi')
                    ->tooltip('Jika ingin menambahkan enter saat di view tuliskan tag `<br>` tanpa tanda `')
                    ->placeholder('Masukkan Keterangan Promo.')
                    ->columnSpan(2)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_promo')->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->limit(30)
                    ->markdown()
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_mulai')
                    ->label('Tanggal')
                    ->description(fn ($record): string => $record->tanggal_selesai, position: 'above')
                    ->badge(fn ($record) => now()->greaterThan($record->tanggal_selesai) ? 'Expired' : 'Active')
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
            'index' => Pages\ListPromos::route('/'),
            'create' => Pages\CreatePromo::route('/create'),
            'edit' => Pages\EditPromo::route('/{record}/edit'),
        ];
    }
}
