<?php

namespace App\Http\Controllers;

abstract class Controller extends  \Illuminate\Routing\Controller
{

    public function sendResponse($result, $message,string $key = 'data', $code = 200)
    {
        $response = [
            $key    => $result,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }

}
