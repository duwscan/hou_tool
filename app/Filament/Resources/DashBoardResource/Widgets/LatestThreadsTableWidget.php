<?php

namespace App\Filament\Resources\DashBoardResource\Widgets;

use App\Models\Thread;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestThreadsTableWidget extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Thread::query()
                    ->where('created_at', '>=', now()->subDays(5))
                    ->latest()
                    ->limit(10)
            )
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Người dùng')
                    ->sortable(),
                Tables\Columns\TextColumn::make('thread_name')
                    ->label('Tên Cuộc Trò Chuyện')
                    ->sortable(),
                Tables\Columns\TextColumn::make('messages_count')
                    ->label('Số lượng tin nhắn')
                    ->counts('messages')
                    ->sortable(),
            ])->paginated(false)->heading('Danh sách cuộc trò chuyện mới nhất');
    }
}
