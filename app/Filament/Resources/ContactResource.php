<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages\CreateContact;
use App\Filament\Resources\ContactResource\Pages\EditContact;
use App\Filament\Resources\ContactResource\Pages\ListContacts;
use App\Models\Contact;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('address')
                    ->required()
                    ->label('Address')
                    ->maxLength(255),

                TextInput::make('phone')
                    ->required()
                    ->label('Phone')
                    ->maxLength(20),

                TextInput::make('email')
                    ->required()
                    ->email()
                    ->label('Email')
                    ->maxLength(100),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('address')->searchable(),
                TextColumn::make('phone'),
                TextColumn::make('email'),
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
            'index' => ListContacts::route('/'),
            'create' => CreateContact::route('/create'),
            'edit' => EditContact::route('/{record}/edit'),
        ];
    }
}
