<?php

namespace App\Filament\Resources;
use App\Filament\Resources\GraduateStandardResource\Pages\CreateGraduateStandard;
use App\Filament\Resources\GraduateStandardResource\Pages\EditGraduateStandard;
use App\Filament\Resources\GraduateStandardResource\Pages\ListGraduateStandards;
use App\Models\GraduateStandard;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Support\Htmlable;

class GraduateStandardResource extends Resource
{

    protected static ?string $model = GraduateStandard::class;
    protected static ?string $pluralModelLabel = 'Chuẩn đầu ra';
    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
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
            'index' => ListGraduateStandards::route('/'),
            'create' => CreateGraduateStandard::route('/create'),
            'edit' => EditGraduateStandard::route('/{record}/edit'),
        ];
    }


}
