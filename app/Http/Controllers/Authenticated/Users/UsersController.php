<?php

namespace App\Http\Controllers\Authenticated\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Gate;
use App\Models\Users\User;
use App\Models\Users\Subjects;
use App\Searchs\DisplayUsers;
use App\Searchs\SearchResultFactories;

class UsersController extends Controller
{
    /**
     * ユーザー検索画面
     */
    public function showUsers(Request $request){
        $keyword = $request->keyword;
        $category = $request->category;
        $updown = $request->updown;
        $gender = $request->sex;
        $role = $request->role;
        $subjects = $request->subject_id ?? []; // 複数科目対応で配列として受け取る

        // SearchResultFactoriesで検索処理
        $userFactory = new SearchResultFactories();
        $users = $userFactory->initializeUsers($keyword, $category, $updown, $gender, $role, $subjects);

        // ▼ 追加：選択科目を取得
        $users = $users->load('subjects');

        // 科目リストを取得して検索ドロップダウンに表示
        $subjects = Subjects::all();

        return view('authenticated.users.search', compact('users', 'subjects'));
    }

    /**

     * ユーザープロフィール画面
     */
    public function userProfile($id){
        // ユーザー情報と選択科目を取得
        $user = User::with('subjects')->findOrFail($id);

        // 科目リストを取得して編集用に表示
        $subject_lists = Subjects::all();

        return view('authenticated.users.profile', compact('user', 'subject_lists'));
    }

    /**
     * ユーザー情報編集（選択科目登録）
     */
    public function userEdit(Request $request){
        $user = User::findOrFail($request->user_id);

        // 選択科目を更新（syncで既存データを上書き）
        $user->subjects()->sync($request->subjects);

        return redirect()->route('user.profile', ['id' => $request->user_id]);
    }
}
