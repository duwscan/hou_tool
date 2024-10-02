<?php

namespace App\Filament\Resources\DashBoardResource\Widgets;

use App\Models\Thread;
use EightyNine\FilamentAdvancedWidget\AdvancedChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class ThreadChartWidget extends AdvancedChartWidget
{
 use InteractsWithPageFilters;
    protected static ?string $heading = 'Biểu đồ cuộc trò chuyện';

    protected function getData(): array
    {
        $data = Trend::model(Thread::class)
            ->between(
                start: \Illuminate\Support\Carbon::parse($this->filters['startDate'] ?? now()->startOfYear()),
                end: \Illuminate\Support\Carbon::parse($this->filters['endDate'] ?? now()->endOfYear()),
            )
            ->perDay()
            ->count();
        return [
            'datasets' => [
                [
                    'label' => 'Cuộc trò chuyện',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
