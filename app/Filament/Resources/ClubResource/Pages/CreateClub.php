<?php

namespace App\Filament\Resources\ClubResource\Pages;

use App\Filament\Resources\ClubResource;
use Filament\Resources\Pages\CreateRecord;

class CreateClub extends CreateRecord
{
    protected static string $resource = ClubResource::class;
    protected ?string $heading = "Tạo Mới Câu Lạc Bộ";

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationMessage(): ?string
    {
        return 'Tạo Câu Lạc Bộ Thành Công';
    }

    public function getBreadcrumb(): string
    {
        return 'Tạo mới';
    }
}
