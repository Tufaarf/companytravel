<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioResource\Pages\CreatePortfolio;
use App\Filament\Resources\PortfolioResource\Pages\EditPortfolio;
use App\Filament\Resources\PortfolioResource\Pages\ListPortfolios;
use App\Models\Portfolio;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\ImageUpload;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class PortfolioResource extends Resource
{
    protected static ?string $model = Portfolio::class;

    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->label('Title')
                    ->maxLength(255),

                Textarea::make('description')
                    ->required()
                    ->label('Description')
                    ->maxLength(1000),

                TextInput::make('category')
                    ->required()
                    ->label('Category')
                    ->maxLength(50),

                FileUpload::make('image_url')
                    ->required()
                    ->image()
                    ->label('Image'),

                TextInput::make('detail_url')
                    ->nullable()
                    ->url()
                    ->label('Detail URL')
                    ->maxLength(255),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable(),
                TextColumn::make('description')->limit(50),
                ImageColumn::make('image_url'),
                TextColumn::make('category'),
                TextColumn::make('detail_url'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                //
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPortfolios::route('/'),
            'create' => CreatePortfolio::route('/create'),
            'edit' => EditPortfolio::route('/{record}/edit'),
        ];
    }
}
