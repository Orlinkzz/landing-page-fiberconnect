<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TentangKamiResource\Pages;
use App\Filament\Resources\TentangKamiResource\RelationManagers;
use App\Models\TentangKami;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class TentangKamiResource extends Resource
{
    protected static ?string $model = TentangKami::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Master data';

    protected static ?string $navigationLabel = 'Tentang Kami';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\RichEditor::make('tentang_kami')
                    ->tooltip('Jika ingin menambahkan enter saat di view tuliskan tag `<br>` tanpa tanda `')
                    ->placeholder('Masukkan Tentang Fiberconnect.')
                    ->required(),
                Forms\Components\RichEditor::make('visi')
                    ->tooltip('Jika ingin menambahkan enter saat di view tuliskan tag `<br>` tanpa tanda `')
                    ->placeholder('Masukkan Visi Fiberconnect.')
                    ->required(),
                Forms\Components\RichEditor::make('misi')
                    ->tooltip('Jika ingin menambahkan enter saat di view tuliskan tag `<br>` tanpa tanda `')
                    ->placeholder('Masukkan Misi Fiberconnect.')
                    ->required(),
                Forms\Components\RichEditor::make('tentang_tim')
                    ->tooltip('Jika ingin menambahkan enter saat di view tuliskan tag `<br>` tanpa tanda `')
                    ->placeholder('Masukkan Tentang Tim Fiberconnect.')
                    ->required(),
                Forms\Components\RichEditor::make('pilih_kami')
                    ->tooltip('Jika ingin menambahkan enter saat di view tuliskan tag `<br>` tanpa tanda `')
                    ->placeholder('Masukkan Kenapa Harus Memilih Kami (Fiberconnect).')
                    ->columnSpan(2)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tentang_kami')
                    ->tooltip(fn ($record): string => $record->tentang_kami)
                    ->limit(20),
                Tables\Columns\TextColumn::make('visi')
                    ->tooltip(fn ($record): string => $record->visi)
                    ->limit(20),
                Tables\Columns\TextColumn::make('misi')
                    ->tooltip(fn ($record): string => $record->misi)
                    ->limit(20),
                Tables\Columns\TextColumn::make('tentang_tim')
                    ->tooltip(fn ($record): string => $record->tentang_tim)
                    ->limit(20),
                Tables\Columns\TextColumn::make('pilih_kami')
                    ->markdown()
                    ->tooltip(fn ($record): string => $record->pilih_kami)
                    ->limit(20),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListTentangKamis::route('/'),
            'create' => Pages\CreateTentangKami::route('/create'),
            'edit' => Pages\EditTentangKami::route('/{record}/edit'),
        ];
    }
}
