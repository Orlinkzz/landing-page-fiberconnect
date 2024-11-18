<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarouselResource\Pages;
use App\Filament\Resources\CarouselResource\RelationManagers;
use App\Models\Carousel;
use App\Models\Promo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class CarouselResource extends Resource
{
    protected static ?string $model = Carousel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';

    protected static ?string $navigationGroup = 'Home';

    protected static ?string $navigationBadgeTooltip = 'Manampilkan Carousel Yang Masih Draft';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'Draft')->count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->placeholder('Masukkan Nama Carousel')
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->placeholder('Masukkan Judul Carousel'),
                Forms\Components\RichEditor::make('description')
                    ->tooltip('Jika ingin menambahkan enter saat di view tuliskan tag `<br>` tanpa tanda `')
                    ->columnSpan(2)
                    ->required()
                    ->placeholder('Masukkan Deskripsi Carousel'),
                Forms\Components\FileUpload::make('image_url_mobile')
                    ->required()
                    ->directory('carousel')
                    ->visibility('private')
                    ->previewable(false)
                    ->tooltip('Masukkan Gambar Mobile 1:1 Carousel'),
                Forms\Components\FileUpload::make('image_url_desktop')
                    ->required()
                    ->directory('carousel')
                    ->visibility('private')
                    ->previewable(false)
                    ->tooltip('Masukkan Gambar Desktop Carousel'),
                Forms\Components\Select::make('status')
                    ->disabled(fn ($record) => isset($record) && $record->id === 2)
                    ->options([
                        'Aktif' => 'Aktif',
                        'Tidak Aktif' => 'Tidak Aktif',
                        'Draft' => 'Draft'
                    ]) ->default('Draft'),
                Forms\Components\Select::make('promo_id')
                    ->label('Promo')
                    ->options(Promo::all()->pluck('nama_promo', 'id')->toArray())
                    ->tooltip('Tambahkan relasi ke table promo, ketika carousel di click akan langsung menuju detail promo yang di tuju')
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->limit(30)
                    ->searchable(),
                Tables\Columns\TextColumn::make('promo.nama_promo')
                    ->getStateUsing(fn ($record) => $record->promo->nama_promo ?? 'Tidak ada relasi ke table promo')
                    ->description(fn ($record) => $record->title, position: 'above')
                    ->tooltip(fn ($record) => $record->promo->nama_promo ?? 'Tidak ada relasi ke table promo')
                    ->limit(30)
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->limit(30)
                    ->markdown()
                    ->tooltip(fn ($record) => $record->description)
                    ->searchable(),
                Tables\Columns\TextColumn::make('image_url_mobile')
                    ->description(fn ($record): string => Str::limit($record->image_url_desktop, 30), position: 'above')
                    ->limit(30)
                    ->label('Image Mobile')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->description(fn ($record) => $record->id === 2 ? Str::limit('Jangan di nonaktifkan, Karena mempengaruhi menu `metode-pembayaran`', 10) : null)
                    ->tooltip(fn ($record) => $record->id === 2 ? 'Jangan di nonaktifkan, Karena mempengaruhi menu `metode-pembayaran`' : null)
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
            'index' => Pages\ListCarousels::route('/'),
            'create' => Pages\CreateCarousel::route('/create'),
            'edit' => Pages\EditCarousel::route('/{record}/edit'),
        ];
    }
}
