<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Authenticated\BulletinBoard\PostsController;
use App\Http\Controllers\Authenticated\Calendar\Admin\CalendarsController;
use App\Http\Controllers\Authenticated\Calendar\General\CalendarController;
use App\Http\Controllers\Authenticated\Top\TopsController;
use App\Http\Controllers\Authenticated\Users\UsersController;
use App\Http\Controllers\Auth\RegisteredUserController;  // 追加

/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ログイン・認証関連のルート
require __DIR__.'/auth.php';

// 未認証時にアクセスするログインページのルートを追加
Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');  // 既存のルート
Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('loginPost'); // 名前付きルートを追加

// 「loginView」というルートを追加
Route::get('login/view', [AuthenticatedSessionController::class, 'create'])->name('loginView');  // この部分を追加

// 新規登録のルートを追加
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');  // 新規登録ページのGETルート
Route::post('register', [RegisteredUserController::class, 'store'])->name('registerPost');  // 新規登録のPOSTルートを追加

// registerViewのルートを追加（登録ページへ遷移）
Route::get('register/view', [RegisteredUserController::class, 'create'])->name('registerView');  // この部分を追加

// 認証済みユーザー向けルート
Route::group(['middleware' => 'auth'], function(){
    Route::namespace('Authenticated')->group(function(){

        // トップ画面関連
        Route::namespace('Top')->group(function(){
            Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
            Route::get('top', [TopsController::class, 'show'])->name('top.show');
        });

        // カレンダー関連
        Route::namespace('Calendar')->group(function(){

            // 一般ユーザー用
            Route::namespace('General')->group(function(){
                Route::get('calendar/{user_id}', [CalendarController::class, 'show'])->name('calendar.general.show');
                Route::post('reserve/calendar', [CalendarController::class, 'reserve'])->name('reserveParts');

                // キャンセル機能
                Route::post('delete/calendar', [CalendarController::class, 'cancel'])->name('deleteParts');

                // 予約詳細画面（追加）
                Route::get('calendar/detail/{date}/{part}', [CalendarController::class, 'reserveDetail'])->name('calendar.general.detail');
            });

            // 管理者用
            Route::namespace('Admin')->group(function(){
                Route::get('calendar/{user_id}/admin', [CalendarsController::class, 'show'])->name('calendar.admin.show');
                Route::get('calendar/{date}/{part}', [CalendarsController::class, 'reserveDetail'])->name('calendar.admin.detail');
                Route::get('setting/{user_id}/admin', [CalendarsController::class, 'reserveSettings'])->name('calendar.admin.setting');
                Route::post('setting/update/admin', [CalendarsController::class, 'updateSettings'])->name('calendar.admin.update');
            });
        });

        // 掲示板関連
        Route::namespace('BulletinBoard')->group(function(){

            // 投稿一覧
            Route::get('bulletin_board/posts/{keyword?}', [PostsController::class, 'show'])->name('post.show');

            // 投稿作成
            Route::get('bulletin_board/input', [PostsController::class, 'postInput'])->name('post.input');
            Route::post('bulletin_board/create', [PostsController::class, 'postCreate'])->name('post.create');

            // カテゴリー作成
            Route::post('create/main_category', [PostsController::class, 'mainCategoryCreate'])->name('main.category.create');
            Route::post('create/sub_category', [PostsController::class, 'subCategoryCreate'])->name('sub.category.create');

            // 投稿詳細
            Route::get('bulletin_board/post/{id}', [PostsController::class, 'postDetail'])->name('post.detail');

            // 投稿編集
            Route::post('bulletin_board/edit', [PostsController::class, 'postEdit'])->name('post.edit');

            // 投稿削除（POSTに変更）
            Route::post('bulletin_board/delete/{id}', [PostsController::class, 'postDelete'])->name('post.delete');

            // コメント作成
            Route::post('comment/create', [PostsController::class, 'commentCreate'])->name('comment.create');

            // いいね
            Route::post('like/post/{id}', [PostsController::class, 'postLike'])->name('post.like');
            Route::post('unlike/post/{id}', [PostsController::class, 'postUnLike'])->name('post.unlike');

            // 自分の投稿一覧
            Route::get('bulletin_board/my_post', [PostsController::class, 'myBulletinBoard'])->name('my.bulletin.board');

            // いいねした投稿一覧
            Route::get('bulletin_board/like', [PostsController::class, 'likeBulletinBoard'])->name('like.bulletin.board');
        });

        // ユーザー関連
        Route::namespace('Users')->group(function(){
            Route::get('show/users', [UsersController::class, 'showUsers'])->name('user.show');
            Route::get('user/profile/{id}', [UsersController::class, 'userProfile'])->name('user.profile');
            Route::post('user/profile/edit', [UsersController::class, 'userEdit'])->name('user.edit');
        });
    });
});
