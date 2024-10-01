<?php

namespace App\Filament\Resources\FacultyResource\Pages;

use App\Filament\Resources\FacultyResource;
use App\HandleCrudFilament;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Guava\FilamentNestedResources\Concerns\NestedPage;

class EditFaculty extends EditRecord
{
    protected static string $resource = FacultyResource::class;
    protected ?string $heading="Chỉnh sửa khoa";

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

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Sửa Khoa Thành Công';
    }

    public function getBreadcrumb(): string
    {
        return 'Sửa';
    }

}
