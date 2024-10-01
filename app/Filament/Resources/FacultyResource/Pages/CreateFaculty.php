<?php

namespace App\Filament\Resources\FacultyResource\Pages;

use App\Filament\Resources\FacultyResource;
use Filament\Resources\Pages\CreateRecord;
use Guava\FilamentNestedResources\Concerns\NestedPage;

class CreateFaculty extends CreateRecord
{
    protected static string $resource = FacultyResource::class;
    protected ?string $heading = "Tạo mới Khoa";

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationMessage(): ?string
    {
        return 'Tạo Khoa Thành Công';
    }

    public function getBreadcrumb(): string
    {
        return 'Tạo mới';
    }

}
