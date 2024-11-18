<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KarirResource\Pages;
use App\Filament\Resources\KarirResource\RelationManagers;
use App\Models\Karir;
use App\Models\KategoriKarir;
use App\Models\Perusahaan;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class KarirResource extends Resource
{
    protected static ?string $model = Karir::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationGroup = 'Home';

    protected static ?string $navigationBadgeTooltip = 'Manampilkan Karir Yang Masih Aktif';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::whereNotNull('closing_date')
                                ->where('closing_date', '>', now())
                                ->count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->placeholder('Masukkan Judul')
                    ->required(),
                Forms\Components\TextInput::make('location')
                    ->placeholder('Masukkan Lokasi pekerjaan Example: Cirebon, Bandung Etc')
                    ->required(),
                Forms\Components\RichEditor::make('description')
                    ->tooltip('Jika ingin menambahkan enter saat di view tuliskan tag `<br>` tanpa tanda `')
                    ->placeholder('Masukkan Deskripsi Pekerjaan')
                    ->required(),
                Forms\Components\RichEditor::make('requirements')
                    ->tooltip('Jika ingin menambahkan enter saat di view tuliskan tag `<br>` tanpa tanda `')
                    ->placeholder('Masukkan Persyaratan yang dibutuhkan.')
                    ->required(),
                Forms\Components\TextInput::make('salary')
                    ->default('Negotiable')
                    ->placeholder('Default Negotiable, bisa juga langsung input nominal 2xxxxxx'),
                Forms\Components\DatePicker::make('posted_date')
                    ->default(Carbon::today())
                    ->required(),
                Forms\Components\Select::make('perusahaan_id')
                    ->label('perusahaan')
                    ->options(Perusahaan::all()->pluck('name', 'id')->toArray())
                    ->required()
                    ->searchable(),
                Forms\Components\DatePicker::make('closing_date')
                    ->default(Carbon::today())
                    ->required(),
                Forms\Components\Select::make('kategori_id')
                    ->label('Kategori')
                    ->options(KategoriKarir::all()->pluck('name', 'id')->toArray())
                    ->required()
                    ->searchable(),
                Forms\Components\Select::make('work_location')
                    ->label('Lokasi Kerja')
                    ->options([
                        'WFH' => 'WFH',
                        'WFO' => 'WFO'
                    ])
                    ->default('WFH')
                    ->required()
                    ->searchable(),
                Forms\Components\Select::make('work_type')
                    ->label('Jam Kerja')
                    ->options([
                        'Full-time' => 'Full-time',
                        'Part-time' => 'Part-time'
                    ])
                    ->default('Full-time')
                    ->required()
                    ->searchable(),
                Forms\Components\TextInput::make('candidate_needed')
                    ->default(1)
                    ->numeric()
                    ->placeholder('Default 1 kandidat'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->markdown()
                    ->description(fn ($record): string => Str::limit($record->requirements, 30, '...'))
                    ->tooltip(fn ($record): string => $record->requirements)
                    ->limit(30)
                    ->searchable(),
                Tables\Columns\TextColumn::make('location')->searchable(),
                Tables\Columns\TextColumn::make('salary')->searchable(),
                Tables\Columns\TextColumn::make('closing_date')
                    ->description(fn ($record): string => $record->posted_date, position: 'above')
                    ->badge(fn ($record) => now()->greaterThan($record->posted_date) ? 'Expired' : 'Active')
                    ->searchable(),
                Tables\Columns\TextColumn::make('perusahaan.name')
                    ->label('Perusahaan')
                    ->description(fn ($record): string => $record->kategori->name, position: 'above')
                    ->limit(28)
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= $column->getCharacterLimit()) {
                            return null;
                        }
                        return $state;
                    })
                    ->searchable(),
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->label('Update')
                //     ->searchable(),
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
            'index' => Pages\ListKarirs::route('/'),
            'create' => Pages\CreateKarir::route('/create'),
            'edit' => Pages\EditKarir::route('/{record}/edit'),
        ];
    }
}
