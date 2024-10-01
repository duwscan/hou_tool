<?php

namespace App\Exceptions;

use App\ultis\toast\ToastType;

interface ShouldToastException
{
    public function getMessage(): string;
    public function getToastType(): ToastType;
}
