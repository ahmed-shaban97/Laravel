<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Response;

class ApiResponse{
    public static function success($data = null, $message = 'success', $code = 200){
        return Response::json([
            'success' => true,
            'message' => $message,
            'data' => [$data],
            'errors' => null

        ], $code);
    }
    public static function error($message = 'Error', $errors = [], $code = 400){
        return Response::json([
            'success' => false,
            'message' => $message,
            'data' => null,
            'errors' => $errors

        ], $code);
    }
}
?>