<?php
use illuminate\support\Facades\Route;
use App\Http\Controllers\TestController;

Route::get("/", [TestController::class ,'home']);

Route::get("product/{product_name?}/{product_id?}/", function ($product_name = "Unknown", $product_id = 1) {
    return "product_name: $product_name  " . "<br>" . "product_id: $product_id";
})->where(['product_name' => '[a-z]+', 'product_id' => '[0-9]+']);
