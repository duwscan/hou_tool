<?php

namespace App\Filament\Clusters\Faculty\Resources\FacultyResource\Pages;

use App\Filament\Clusters\Faculty\Resources\FacultyResource;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\CreateRecord;
use GuzzleHttp\Promise\Create;

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
