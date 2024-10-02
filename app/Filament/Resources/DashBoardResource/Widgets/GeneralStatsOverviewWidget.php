<?php

namespace App\Filament\Resources\DashBoardResource\Widgets;

use App\Models\Post;
use App\Models\Thread;
use App\Models\User;
use EightyNine\FilamentAdvancedWidget\AdvancedStatsOverviewWidget as BaseWidget;
use EightyNine\FilamentAdvancedWidget\AdvancedStatsOverviewWidget\Stat;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Illuminate\Database\Eloquent\Builder;

class GeneralStatsOverviewWidget extends BaseWidget
{
    use InteractsWithPageFilters;
    protected function getStats(): array
    {
        $startDate = $this->filters['startDate'] ?? null;
        $endDate = $this->filters['endDate'] ?? null;
        $postQuery = $this->queryDate(Post::query(), $startDate, $endDate);
        $threadQuery = $this->queryDate(Thread::query(), $startDate, $endDate);

        return [
            Stat::make('Người dùng', User::count())->icon('heroicon-o-user')
                ->iconBackgroundColor('success')
                ->iconPosition('start')
                ->description('Số người dùng hiện tại')
                ->descriptionColor('success'),
            Stat::make('Bài Viết', $postQuery)->icon('heroicon-o-newspaper')
                ->description("Số bài viết trong khoảng thời gian này")
                ->iconColor('warning'),
            Stat::make('Cuộc Trò Chuyện', $threadQuery)->icon('heroicon-o-chat-bubble-left-ellipsis')
                ->description("Số cuộc trò chuyện trong khoảng thời gian này")
                ->descriptionColor('danger')
                ->iconColor('danger')
        ];
    }

    public function queryDate($model, $startDate, $endDate){
        return $model->when($startDate, fn (Builder $query) => $query->whereDate('created_at', '>=', $startDate))
            ->when($endDate, fn (Builder $query) => $query->whereDate('created_at', '<=', $endDate))
            ->count();
    }
}
