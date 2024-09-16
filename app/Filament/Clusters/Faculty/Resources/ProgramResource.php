<?php

namespace App\Filament\Clusters\Faculty\Resources;

use App\Filament\Clusters\Faculty;
use App\Filament\Clusters\Faculty\Resources\ProgramResource\Pages;
use App\Models\Program;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProgramResource extends Resource
{
    protected static ?string $model = Program::class;
    protected static ?string $navigationIcon = 'heroicon-o-bookmark-square';
    protected static ?string $pluralModelLabel = 'Chương trình đào tạo';

    protected static ?string $cluster = Faculty::class;
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('faculty_id')
                    ->relationship('faculty', 'name')
                    ->required()
                    ->label('Khoa'),
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

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label("ID")->searchable(),
                Tables\Columns\TextColumn::make('faculty.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('file_path')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label("Sửa"),
                Tables\Actions\DeleteAction::make()->label("Xóa"),
                Tables\Actions\ViewAction::make()->label("Chi tiết"),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('Không có chương trình đào tạo nào');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPrograms::route('/'),
            'create' => Pages\CreateProgram::route('/create'),
            'edit' => Pages\EditProgram::route('/{record}/edit'),
        ];
    }
}
