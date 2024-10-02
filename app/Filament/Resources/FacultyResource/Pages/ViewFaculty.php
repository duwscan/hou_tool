<?php

namespace App\Filament\Resources\FacultyResource\Pages;

use App\Filament\Resources\FacultyResource;
use App\Filament\Resources\FacultyResource\RelationManagers\GraduateStandardsRelationManager;
use App\Filament\Resources\FacultyResource\RelationManagers\ProgramsRelationManager;
use Filament\Actions;
use Filament\Resources\Pages\PageRegistration;
use Filament\Resources\Pages\ViewRecord;

class ViewFaculty extends ViewRecord
{
    protected static string $resource = FacultyResource::class;
    protected ?string $heading="Chi Tiết Khoa";
    protected static ?string $breadcrumb = 'Chi Tiết Khoa';


    public function getRelationManagers(): array
    {
        return [
            GraduateStandardsRelationManager::class,
            ProgramsRelationManager::class,
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    public function hasCombinedRelationManagerTabsWithContent(): bool
    {
        return true;
    }


}
