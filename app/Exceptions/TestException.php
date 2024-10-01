<?php

namespace App\Exceptions;

use App\ultis\toast\ToastType;

class TestException extends \Exception implements ShouldToastException
{
    public function __construct()
    {
        parent::__construct('Test exception');
    }
    public function getToastType(): ToastType
    {
        return ToastType::ERROR;
    }
}
