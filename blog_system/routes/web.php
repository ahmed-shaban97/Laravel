<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


require __DIR__.'/auth.php';


Route::get('/', function () {
    return redirect()->route('posts.index');
})->middleware('auth');


Route::get('about/', [PostController::class, 'about'])->name('posts.about');
Route::get('contact/', [PostController::class, 'contact'])->name('posts.contact');
Route::get('post/', [PostController::class, 'post'])->name('posts.post');


Route::middleware('auth')->group(function () {

    Route::get('index/', [PostController::class, 'index'])->name('posts.index');

    Route::get('posts/create/', [PostController::class, 'create'])->name('posts.create');
    Route::post('posts/store/', [PostController::class, 'store'])->name('posts.store');

    Route::get('posts/{post}/edit/', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('posts/{post}/', [PostController::class, 'update'])->name('posts.update')->middleware('can:update,post');
    Route::get('posts/{post}/', [PostController::class, 'show'])->name('posts.show');

    Route::delete('posts/{post}/', [PostController::class, 'destroy'])->name('posts.destroy');
});
