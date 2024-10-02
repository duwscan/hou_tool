<?php

namespace App\Filament\Resources\FacultyResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProgramsRelationManager extends RelationManager
{
    protected static string $relationship = 'programs';
    protected static ?string $title = 'Chương trình đào tạo';
    protected static bool $shouldSkipAuthorization = true;

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
            ->heading('Chương trình đào tạo')
            ->modelLabel('Chương trình đào tạo')
            ->recordTitleAttribute('programs')
            ->columns([
                Tables\Columns\TextColumn::make('id')->label("ID")->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->label("Thêm mới"),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public function isReadOnly(): bool
    {
        return false;
    }
}
