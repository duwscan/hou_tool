<?php

namespace App\Filament\Clusters\Faculty\Resources\ProgramResource\Pages;

use App\Filament\Clusters\Faculty\Resources\ProgramResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProgram extends EditRecord
{
    protected static string $resource = ProgramResource::class;

    protected ?string $heading="Chỉnh sửa chương trình đào tạo";

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}