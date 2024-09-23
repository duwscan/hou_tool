<?php

namespace App\Filament\Resources;

use App\Filament\Actions\CustomDeleteAction;
use App\Filament\Resources\FacultyResource\Pages\CreateFaculty;
use App\Filament\Resources\FacultyResource\Pages\EditFaculty;
use App\Filament\Resources\FacultyResource\Pages\ListFaculties;
use App\Filament\Resources\FacultyResource\Pages\ViewFaculty;
use App\Filament\Resources\FacultyResource\RelationManagers\GraduateStandardsRelationManager;
use App\Filament\Resources\FacultyResource\RelationManagers\ProgramsRelationManager;
use App\Filament\Resources\GraduateStandardResource\Pages\CreateGraduateStandard;
use App\Filament\Resources\GraduateStandardResource\Pages\EditGraduateStandard;
use App\Filament\Resources\GraduateStandardResource\Pages\ListGraduateStandards;
use App\Models\Faculty;
use App\Models\GraduateStandard;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;

class FacultyResource extends Resource
{
    protected static ?string $model = Faculty::class;
    protected static ?string $navigationIcon = 'heroicon-o-home-modern';
    protected static ?string $navigationGroup="Tiện ích";
    protected static ?string $pluralModelLabel = 'Khoa';

    public static function getRecordTitle(?Model $record): string|null|Htmlable
    {
        return $record->name;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->label("Tên Khoa")->required(),
                Forms\Components\TextInput::make('link')->label("Trang Chủ")->required()->url(),
                Textarea::make('description')
                    ->label('Mô tả')
                    ->placeholder('Viết mô tả cho khoa')
                    ->rows(5)
                    ->required(),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label("ID")->searchable(),
                Tables\Columns\TextColumn::make('name')->label("Tên Khoa")->searchable(),
                Tables\Columns\TextColumn::make('link')->label("Trang Chủ")->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label("Chi tiết")
                    ->modal(false)
                    ->url(fn($record) => route('filament.admin.resources.faculties.view', $record)),
                Tables\Actions\EditAction::make()->label("Sửa"),
                CustomDeleteAction::make()->label("Xóa"),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('Không có khoa nào');
    }

    public static function getRelations(): array
    {
        return [
            GraduateStandardsRelationManager::class,
            ProgramsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFaculties::route('/'),
            'create' => CreateFaculty::route('/create'),
            'edit' => EditFaculty::route('/{record}/edit'),
            'view' => ViewFaculty::route('/{record}'),
        ];
    }
}
