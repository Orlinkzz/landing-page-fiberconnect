<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeritaResource\Pages;
use App\Filament\Resources\BeritaResource\RelationManagers;
use App\Models\Berita;
use App\Models\KategoriBerita;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Carbon;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationGroup = 'Home';

    protected static ?string $navigationBadgeTooltip = 'Manampilkan Berita Yang Masih Draft';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'Draft')
                                ->count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->placeholder('Masukkan Judul Berita')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal')
                    ->default(Carbon::today())
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        'Aktif' => 'Aktif',
                        'Tidak Aktif' => 'Tidak Aktif',
                        'Draft' => 'Draft'
                    ]) ->default('Draft'),
                Forms\Components\Select::make('kategori_id')
                    ->label('Kategori')
                    ->options(KategoriBerita::all()->pluck('nama_kategori', 'id')->toArray())
                    ->required()
                    ->searchable(),
                Forms\Components\FileUpload::make('gambar')
                    ->required()
                    ->directory('berita')
                    ->previewable(false)
                    ->visibility('private'),
                Forms\Components\RichEditor::make('konten')
                    ->tooltip('Jika ingin menambahkan enter saat di view tuliskan tag `<br>` tanpa tanda `')
                    ->placeholder('Masukkan konten atau isi berita...')
                    ->columnSpan(2)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->limit(30)
                    ->searchable(),
                Tables\Columns\TextColumn::make('konten')
                    ->limit(30)
                    ->markdown()
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal')
                    ->since()
                    ->dateTimeTooltip()
                    ->badge()
                    ->searchable(),
                Tables\Columns\TextColumn::make('kategori.nama_kategori')
                    ->label('Kategori')
                    // ->icon('heroicon-m-envelope')
                    // ->iconColor('primary')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Teknologi' => 'primary',
                        'Kebijakan dan Regulasi' => 'success',
                        'Layanan Pelanggan' => 'gray',
                        'Inovasi dan Produk Baru' => 'success',
                        'Keamanan dan Privasi' => 'warning',
                        'Pembaruan Jaringan' => 'danger',

                        'Pendidikan dan Pelatihan' => 'gray',
                        'Kemitraan dan Kolaborasi' => 'success',
                        'Statistik dan Riset Pasar' => 'primary',
                        'Acara dan Konferensi' => 'success',
                        'Inisiatif Sosial' => 'warning',
                        'Pengumuman Perusahaan' => 'danger',
                    })
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
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }
}
