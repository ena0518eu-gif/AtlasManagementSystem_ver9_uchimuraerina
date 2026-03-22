<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| 認証関連（ログイン・登録）はここで管理する
|
*/

// ログイン・認証関連のルート
Route::middleware('guest')->group(function () {

    // ログイン画面
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('loginView');

    // ログイン処理
    Route::post('login', [AuthenticatedSessionController::class, 'store'])
        ->name('loginPost');

    // 新規登録画面
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('registerView');

    // 新規登録処理（★これ必須）
    Route::post('register', [RegisteredUserController::class, 'store'])
        ->name('registerPost');
});


// ↓↓↓ ここから下は重複なので削除 or 使わない（重要）

// Route::get('login', ...) ← 重複
// Route::post('login', ...) ← 重複

// Route::get('register', ...) ← 重複

// registerViewのルート（これも上と重複）
// Route::get('register/view', ...)
