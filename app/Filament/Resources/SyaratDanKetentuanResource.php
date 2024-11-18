<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SyaratDanKetentuanResource\Pages;
use App\Filament\Resources\SyaratDanKetentuanResource\RelationManagers;
use App\Models\SyaratDanKetentuan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SyaratDanKetentuanResource extends Resource
{
    protected static ?string $model = SyaratDanKetentuan::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Master data';

    protected static ?string $navigationLabel = 'Syarat dan Ketentuan';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\RichEditor::make('syarat_dan_ketentuan')
                    ->tooltip('Jika ingin menambahkan enter saat di view tuliskan tag `<br>` tanpa tanda `')
                    ->placeholder('Masukkan Tentang Fiberconnect.')
                    ->columnSpan(2)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('syarat_dan_ketentuan')
                    ->html()
                    ->limit(150)
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
            'index' => Pages\ListSyaratDanKetentuans::route('/'),
            'create' => Pages\CreateSyaratDanKetentuan::route('/create'),
            'edit' => Pages\EditSyaratDanKetentuan::route('/{record}/edit'),
        ];
    }
}
