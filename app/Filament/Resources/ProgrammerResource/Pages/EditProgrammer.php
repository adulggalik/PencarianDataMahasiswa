<?php

namespace App\Filament\Resources\ProgrammerResource\Pages;

use App\Filament\Resources\ProgrammerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProgrammer extends EditRecord
{
    protected static string $resource = ProgrammerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
