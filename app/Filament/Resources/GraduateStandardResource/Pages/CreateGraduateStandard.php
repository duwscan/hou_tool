<?php

namespace App\Filament\Resources\GraduateStandardResource\Pages;

use App\Filament\HasParentResource;
use App\Filament\Resources\GraduateStandardResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\PageRegistration;
use Guava\FilamentNestedResources\Concerns\NestedPage;
use Illuminate\Database\Eloquent\Model;

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

}
