<?php

namespace App\Filament\Resources\ProgramResource\Pages;

use App\Filament\Resources\ProgramResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProgram extends CreateRecord
{
    protected static string $resource = ProgramResource::class;
    protected ?string $heading="Tạo mới chương trình đào tạo";

    protected function getCreatedNotificationMessage(): ?string
    {
        return 'Tạo Chương Trình Đào Tạo Thành Công';
    }

    public function getBreadcrumb(): string
    {
        return 'Tạo mới';
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
