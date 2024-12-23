<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgrammerResource\Pages;
use App\Models\Programmer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProgrammerResource extends Resource
{
    protected static ?string $model = Programmer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Input Nama
                Forms\Components\TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->maxLength(100),

                // Input Email
                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->unique()
                    ->required(),

                // Input Keahlian
                Forms\Components\TextInput::make('specialization')
                    ->label('Keahlian')
                    ->required()
                    ->maxLength(100),

                // Input Deskripsi
                Forms\Components\Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(4)
                    ->nullable(),

                // Input Foto
                Forms\Components\FileUpload::make('photo')
                    ->label('Foto')
                    ->image()
                    ->disk('public') // Tentukan disk penyimpanan
                    ->directory('programmer_photos') // Tentukan folder tempat foto disimpan
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Kolom Nama
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->sortable()
                    ->searchable(),

                // Kolom Email
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->sortable()
                    ->searchable(),

                // Kolom Keahlian
                Tables\Columns\TextColumn::make('specialization')
                    ->label('Keahlian')
                    ->sortable()
                    ->searchable(),

                // Kolom Tanggal Input
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Input')
                    ->dateTime()
                    ->sortable(),

                // Kolom Foto
                Tables\Columns\ImageColumn::make('photo')
                    ->label('Foto')
                    ->disk('public') // Tentukan disk penyimpanan
                    ->height(50) // Tentukan ukuran gambar
                    ->width(50),
            ])
            ->filters([ /* Tambahkan filter jika diperlukan */ ])
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
        return [/* Tambahkan relations jika ada */];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProgrammers::route('/'),
            'create' => Pages\CreateProgrammer::route('/create'),
            'edit' => Pages\EditProgrammer::route('/{record}/edit'),
        ];
    }
}
