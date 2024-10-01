<?php

namespace App\Filament\Actions;

use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Model;

class CustomDeleteAction extends DeleteAction
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->action(function (Model $record): void {
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
        });
    }
}
