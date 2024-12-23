<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MahasiswaResource\Pages;
use App\Filament\Resources\MahasiswaResource\RelationManagers;
use App\Models\Mahasiswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Forms\Components\FileUpload;

class MahasiswaResource extends Resource
{
    protected static ?string $model = Mahasiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Kolom Nim
                Forms\Components\TextInput::make('nim')
                    ->label('NIM')
                    ->required()
                    ->unique()
                    ->maxLength(20),

                // Kolom Nama Mahasiswa
                Forms\Components\TextInput::make('nama')
                    ->label('Nama')
                    ->required()
                    ->maxLength(100),

                // Kolom Jurusan
                Forms\Components\TextInput::make('jurusan')
                    ->label('Jurusan')
                    ->required()
                    ->maxLength(50),

                // Kolom Upload File
                FileUpload::make('image')
                    ->label('Image')
                    ->directory('mahasiswa-images')
                    ->image()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nim')
                    ->label('NIM')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('jurusan')
                    ->label('Jurusan')
                    ->sortable()
                    ->searchable(),

                // Menambahkan kolom untuk menampilkan gambar
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->disk('public'), // Menggunakan disk 'public'
            ])
            ->filters([
                // Filter lainnya jika ada
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Definisikan relations jika ada
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMahasiswas::route('/'),
            'create' => Pages\CreateMahasiswa::route('/create'),
            'edit' => Pages\EditMahasiswa::route('/{record}'),
        ];
    }
}
