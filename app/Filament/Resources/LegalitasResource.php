<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LegalitasResource\Pages;
use App\Filament\Resources\LegalitasResource\RelationManagers;
use App\Models\Legalitas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LegalitasResource extends Resource
{
    protected static ?string $model = Legalitas::class;

    protected static ?string $navigationGroup = 'Landing Page';

    protected static ?string $navigationIcon = 'heroicon-o-document-check';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_legalitas')
                    ->label('Nama Legalitas Usaha')
                    ->required(),

                Forms\Components\FileUpload::make('image')
                    ->label('File Dokumen')
                    ->image()
                    ->disk('public') // Menyimpan gambar ke storage 'public'
                    ->required()
                    ->maxSize(10240), // Maksimal ukuran file 10MB
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_legalitas')
                    ->label('Nama Legalitas')
                    ->searchable(),

                Tables\Columns\ImageColumn::make('image')
                    ->label('Dokumen')
                    ->disk('public')
                    ->width(150)
                    ->height(150),
            ])
            ->filters([
                // Add any filters if needed
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
            // If there are any relations to show, add them here
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLegalitas::route('/'),
            'create' => Pages\CreateLegalitas::route('/create'),
            'edit' => Pages\EditLegalitas::route('/{record}/edit'),
        ];
    }
}
