<?php

namespace App\Filament\Clusters\Faculty\Resources\GraduateStandardResource\Pages;

use App\Filament\Clusters\Faculty\Resources\GraduateStandardResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\CreateRecord;

class CreateGraduateStandard extends CreateRecord
{
    protected static string $resource = GraduateStandardResource::class;
    protected ?string $heading="Tạo mới chuẩn đầu ra";

    protected function getCreatedNotificationMessage(): ?string
    {
        return 'Tạo chuẩn đầu ra thành công';
    }

    public function getBreadcrumb(): string
    {
        return 'Tạo mới';
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    /**
     * @param string|null $heading
     */


}
