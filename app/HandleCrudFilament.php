<?php

namespace App;

use Filament\Notifications\Notification;

trait HandleCrudFilament
{
    protected function handleDeleteAction($record): void
    {
        try {
            $record->delete();
            Notification::make()
                ->title('Xóa Thành Công')
                ->success()
                ->send();
        } catch (\Exception $e) {
            Notification::make()
                ->title('Đã xảy ra lỗi khi xóa')
                ->danger()
                ->send();
        }
    }
}
