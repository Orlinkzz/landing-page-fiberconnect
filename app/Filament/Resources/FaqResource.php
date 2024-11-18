<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FaqResource\Pages;
use App\Filament\Resources\FaqResource\RelationManagers;
use App\Models\Faq;
use App\Models\KategoriFaq;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FaqResource extends Resource
{
    protected static ?string $model = Faq::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';

    protected static ?string $navigationGroup = 'Home';

    protected static ?string $navigationBadgeTooltip = 'Manampilkan seluruh FaQ';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\RichEditor::make('question')
                    ->required()
                    ->placeholder('Masukan pertanyaan yang sering di tanyakan'),
                Forms\Components\RichEditor::make('answer')
                    ->required()
                    ->placeholder('Masukan jawaban sesuai dengan yang di tanyakan'),
                Forms\Components\Select::make('status')
                    ->options([
                        'Aktif' => 'Aktif',
                        'Tidak Aktif' => 'Tidak Aktif',
                        'Draft' => 'Draft'
                    ]) ->default('Draft'),
                Forms\Components\Select::make('kategori_id')
                    ->label('Perusahaan')
                    ->options(KategoriFaq::all()->pluck('name', 'id')->toArray())
                    ->required()
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('question')
                    ->limit(30)
                    ->markdown()
                    ->tooltip(fn ($record) => $record->question)
                    ->searchable(),
                Tables\Columns\TextColumn::make('answer')
                    ->limit(30)
                    ->markdown()
                    ->tooltip(fn ($record) => $record->answer)
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Aktif' => 'success',
                        'Tidak Aktif' => 'danger',
                        'Draft' => 'warning',
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('kategori.name')
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
            'index' => Pages\ListFaqs::route('/'),
            'create' => Pages\CreateFaq::route('/create'),
            'edit' => Pages\EditFaq::route('/{record}/edit'),
        ];
    }
}
