<?php

namespace App\Filament\Pages;

use App\Filament\Resources\DashBoardResource\Widgets\GeneralStatsOverviewWidget;
use App\Filament\Resources\DashBoardResource\Widgets\LatestThreadsTableWidget;
use App\Filament\Resources\DashBoardResource\Widgets\ThreadChartWidget;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Widgets\Widget;

class DashBoard extends BaseDashboard
{
    use HasFiltersForm;
    protected static ?string $navigationIcon = 'heroicon-o-home';
    public function filtersForm(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        DatePicker::make('startDate'),
                        DatePicker::make('endDate'),
                        // ...
                    ])
                    ->columns(2),
            ]);
    }

    public function getWidgets(): array
    {
        return [
           GeneralStatsOverviewWidget::class,
              ThreadChartWidget::class,
            LatestThreadsTableWidget::class,
        ];
    }

}
