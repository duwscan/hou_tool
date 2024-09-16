<?php

namespace App\Filament\Clusters\Faculty\Resources;

use App\Filament\Clusters\Faculty;
use App\Filament\Clusters\Faculty\Resources\GraduateStandardResource\Pages;
use App\Filament\Clusters\Faculty\Resources\GraduateStandardResource\RelationManagers;
use App\Models\GraduateStandard;
use Filament\Actions\DeleteAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GraduateStandardResource extends Resource
{
    protected static ?string $model = GraduateStandard::class;
    protected static ?string $pluralModelLabel = 'Chuẩn đầu ra';
    protected static ?string $navigationIcon = 'heroicon-o-book-open';

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
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
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
            ->emptyStateHeading('Không có chuẩn đầu ra nào');

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
            'index' => Pages\ListGraduateStandards::route('/'),
            'create' => Pages\CreateGraduateStandard::route('/create'),
            'edit' => Pages\EditGraduateStandard::route('/{record}/edit'),
        ];
    }
}
