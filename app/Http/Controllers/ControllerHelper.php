<?php

namespace App\Http\Controllers;

class ControllerHelper
{
    public static function generateResponse($status, $message)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
        ]);
    }
}
