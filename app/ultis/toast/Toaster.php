<?php

namespace App\ultis\toast;

class Toaster
{
    private string $message;
    private string $type;

    public function __construct(string $message, ToastType $type)
    {
        $this->message = $message;
        $this->type = $type->value;
    }

    public function toArray(): array
    {
        return [
            'message' => $this->message,
            'type' => $this->type,
        ];
    }

    public static function toast(string $message, ToastType $type): void
    {
        $toast = new Toaster($message, $type);
        \Session::flash('toast', $toast->toArray());
    }
}
