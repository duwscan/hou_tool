<?php

namespace App\Filament\Resources\FacultyResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class GraduateStandardsRelationManager extends RelationManager
{
    protected static string $relationship = 'graduateStandards';

    protected static ?string $title = 'Chuẩn đầu ra';
    protected static bool $shouldSkipAuthorization = true;
    protected static ?string $modelLabel = 'Chuẩn đầu ra';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->label('Tên'),
                Forms\Components\FileUpLoad::make('file_path')
                    ->required()
                    ->disk('public')
                    ->visibility('public')
                    ->label('File'),
            ])->columns(1);
    }

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                Tables\Actions\CreateAction::make()->label("Thêm mới"),
            ])
            ->columns([
                Tables\Columns\TextColumn::make('id')->label("ID")->searchable(),
                Tables\Columns\TextColumn::make('faculty.name')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make()->label("Xóa"),
                Tables\Actions\ViewAction::make()->label("Chi tiết"),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('Không có chuẩn đầu ra nào');

    }

    public function isReadOnly(): bool
    {
        return false;
    }

}
