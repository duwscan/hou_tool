<?php

namespace App\Filament\Clusters\Faculty\Resources\GraduateStandardResource\Pages;

use App\Filament\Clusters\Faculty\Resources\GraduateStandardResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGraduateStandard extends EditRecord
{
    protected static string $resource = GraduateStandardResource::class;
    protected ?string $heading="Chỉnh sửa chuẩn đầu ra";

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
