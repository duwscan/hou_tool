<?php

namespace App\Filament\Clusters\Faculty\Resources\ProgramResource\Pages;

use App\Filament\Clusters\Faculty\Resources\ProgramResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
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
