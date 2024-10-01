<?php

namespace App\Http\Controllers;

use App\Dto\BaseDTO;
use App\RealWorld\Transformers\Transformer;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Ramsey\Collection\Collection;

abstract class Controller extends  \Illuminate\Routing\Controller
{

    use AuthorizesRequests;

    public function sendResponse($result, $message,string $key = 'data', $code = 200)
    {
        $response = [
            $key    => $result,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }

}
