<?php

use App\Http\Controllers\aboutController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\newsController;
use App\Http\Controllers\ReviewController;
use App\Http\Middleware\VerifyCsrfToken;
use App\Models\Review;
use Illuminate\Support\Facades\Route;

Route::get('admin/news/create', [newsController::class, 'create'])->name('news.create');
Route::get('admin/news/{slug}', [newsController::class, 'show']);
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('news', newsController::class)->middleware('MakeNotificationAsRead');
    Route::resource('about', aboutController::class);
    Route::resource('review', ReviewController::class);
    Route::get('chat/{id}', [ChatController::class, 'chatForm'])->name('show.chat');
    Route::post('chat/{id}', [ChatController::class, 'sendMessage'])->withoutMiddleware([VerifyCsrfToken::class])->name('chat.sent');

    // Route::get('home', [aboutController::class, '']);

    // Route::get('trashed', [newsController::class, 'trashed'])->name('news.trashed');
});
