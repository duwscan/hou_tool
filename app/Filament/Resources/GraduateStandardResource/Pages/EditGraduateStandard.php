<?php

namespace App\Filament\Resources\GraduateStandardResource\Pages;

use App\Filament\HasParentResource;
use App\Filament\Resources\GraduateStandardResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Guava\FilamentNestedResources\Concerns\NestedPage;

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

}
