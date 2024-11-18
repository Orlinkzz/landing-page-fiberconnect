<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SocialMediaResource\Pages;
use App\Filament\Resources\SocialMediaResource\RelationManagers;
use App\Models\Perusahaan;
use App\Models\SocialMedia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Guava\FilamentIconPicker\Forms\IconPicker;
use Guava\FilamentIconPicker\Tables\IconColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class SocialMediaResource extends Resource
{
    protected static ?string $model = SocialMedia::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static ?string $navigationGroup = 'Master data';

    protected static ?string $navigationBadgeTooltip = 'Manampilkan seluruh media social';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('perusahaan_id')
                    ->label('Perusahaan')
                    ->options(Perusahaan::all()->pluck('name', 'id')->toArray())
                    ->required()
                    ->searchable(),
                Forms\Components\TextInput::make('platform')
                    ->required()
                    ->placeholder('Masukan Nama platform media social'),
                Forms\Components\TextInput::make('url')
                    ->required()
                    ->placeholder('Masukan Url untuk redirect social media'),
                IconPicker::make('icon')
                    ->label('Icon Social Media')
                    ->sets(['fontawesome-brands'])
                    ->label('Icon'),
                Forms\Components\Select::make('status')
                    ->disabled(fn ($record) => isset($record) && $record->id === 1)
                    ->required()
                    ->options([
                        'Aktif' => 'Aktif',
                        'Tidak Aktif' => 'Tidak Aktif',
                        'Draft' => 'Draft'
                    ]) ->default('Draft'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('perusahaan.name')
                    ->description('')
                    ->tooltip('')
                    ->searchable(),
                IconColumn::make('icon'),
                Tables\Columns\TextColumn::make('platform')
                    ->description('')
                    ->tooltip('')
                    ->searchable(),
                Tables\Columns\TextColumn::make('url')
                    ->description('')
                    ->tooltip('')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                ->badge()
                ->description(fn ($record) => $record->id === 1 ? Str::limit('Jangan di nonaktifkan, Karena mempengaruhi redirect WA admin', 10) : null)
                ->tooltip(fn ($record) => $record->id === 1 ? 'Jangan di nonaktifkan, Karena mempengaruhi redirect WA admin' : null)
                ->color(fn (string $state): string => match ($state) {
                    'Aktif' => 'success',
                    'Tidak Aktif' => 'danger',
                    'Draft' => 'warning',
                })
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
            'index' => Pages\ListSocialMedia::route('/'),
            'create' => Pages\CreateSocialMedia::route('/create'),
            'edit' => Pages\EditSocialMedia::route('/{record}/edit'),
        ];
    }
}
