<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

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
