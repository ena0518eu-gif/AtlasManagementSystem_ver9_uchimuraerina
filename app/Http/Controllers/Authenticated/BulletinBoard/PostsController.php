<?php

namespace App\Http\Controllers\Authenticated\BulletinBoard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories\MainCategory;
use App\Models\Categories\SubCategory;
use App\Models\Posts\Post;
use App\Models\Posts\PostComment;
use App\Models\Posts\PostSubCategory;
use App\Models\Posts\Like;
use App\Models\Users\User;
use App\Http\Requests\BulletinBoard\PostFormRequest;
use Auth;

class PostsController extends Controller
{
    public function show(Request $request){
        $posts = Post::with('user', 'postComments')->get();

        // （サブカテゴリ取得）
        $categories = MainCategory::with('subCategories')->get();

        $like = new Like;
        $post_comment = new Post;
        if(!empty($request->keyword)){

            // ★追加：サブカテゴリー完全一致チェック
            $subCategory = SubCategory::where('sub_category', $request->keyword)->first();

            if($subCategory){
                // 追加：完全一致した場合はサブカテゴリーで絞る
                $posts = Post::with('user', 'postComments')
                ->whereHas('subCategories', function($query) use ($subCategory){
                    $query->where('sub_category_id', $subCategory->id);
                })->get();
            }else{
                // 既存：キーワード検索
                $posts = Post::with('user', 'postComments')
                ->where('post_title', 'like', '%'.$request->keyword.'%')
                ->orWhere('post', 'like', '%'.$request->keyword.'%')->get();
            }

        }else if($request->category_word){
            $sub_category = $request->category_word;

            // 修正：サブカテゴリークリック時の絞り込み
            $posts = Post::with('user', 'postComments')
            ->whereHas('subCategories', function($query) use ($sub_category){
                $query->where('sub_category_id', $sub_category);
            })->get();

        }else if($request->like_posts){
            $likes = Auth::user()->likePostId()->get('like_post_id');
            $posts = Post::with('user', 'postComments')
            ->whereIn('id', $likes)->get();
        }else if($request->my_posts){
            $posts = Post::with('user', 'postComments')
            ->where('user_id', Auth::id())->get();
        }
        return view('authenticated.bulletinboard.posts', compact('posts', 'categories', 'like', 'post_comment'));
    }

    public function postDetail($post_id){
        // subCategories.subCategory までwithで取得
        $post = Post::with('user', 'postComments', 'subCategories.subCategory')->findOrFail($post_id);
        return view('authenticated.bulletinboard.post_detail', compact('post'));
    }

    public function postInput(){
        $main_categories = MainCategory::with('subCategories')->get();
        return view('authenticated.bulletinboard.post_create', compact('main_categories'));
    }

    public function postCreate(PostFormRequest $request){
        $post = Post::create([
            'user_id' => Auth::id(),
            'post_title' => $request->post_title,
            'post' => $request->post_body
        ]);

        // ★追加：サブカテゴリー新規登録処理
        if($request->sub_category_name){
            $newSubCategory = SubCategory::create([
                'main_category_id' => $request->main_category_id,
                'sub_category' => $request->sub_category_name,
            ]);

            // 新規作成したサブカテゴリーを投稿に紐づけ
            PostSubCategory::create([
                'post_id' => $post->id,
                'sub_category_id' => $newSubCategory->id,
            ]);
        }

        // 選択されたサブカテゴリーを中間テーブルに登録
        if($request->post_category_id){
            $category_ids = is_array($request->post_category_id)
                ? $request->post_category_id
                : [$request->post_category_id];

            foreach($category_ids as $sub_category_id){
                PostSubCategory::create([
                    'post_id' => $post->id,
                    'sub_category_id' => $sub_category_id,
                ]);
            }
        }

        return redirect()->route('post.show');
    }

    public function postEdit(Request $request){
        // タイトルと投稿内容のバリデーション
        $request->validate([
            'post_title' => 'required|string|max:100',
            'post_body' => 'required|string|max:2000',
        ], [
            'post_title.required' => 'タイトルは必ず入力してください。',
            'post_title.string' => 'タイトルは文字列である必要があります。',
            'post_title.max' => 'タイトルは100文字以内で入力してください。',
            'post_body.required' => '投稿内容は必ず入力してください。',
            'post_body.string' => '投稿内容は文字列である必要があります。',
            'post_body.max' => '最大文字数は2000文字です。',
        ]);

        Post::where('id', $request->post_id)->update([
            'post_title' => $request->post_title,
            'post' => $request->post_body,
        ]);
        return redirect()->route('post.detail', ['id' => $request->post_id]);
    }

    public function postDelete($id){
        Post::findOrFail($id)->delete();
        return redirect()->route('post.show');
    }

    public function mainCategoryCreate(Request $request){
        // メインカテゴリーのバリデーション
        $request->validate([
            'main_category_name' => 'required',
        ], [
            'main_category_name.required' => 'メインカテゴリーは必ず入力してください。',
        ]);

        MainCategory::create(['main_category' => $request->main_category_name]);
        return redirect()->route('post.input');
    }

    public function subCategoryCreate(Request $request){
        // サブカテゴリーのバリデーション
        $request->validate([
            'sub_category_name' => 'required',
        ], [
            'sub_category_name.required' => 'サブカテゴリーは必ず入力してください。',
        ]);

        SubCategory::create([
            'main_category_id' => $request->main_category_id,
            'sub_category' => $request->sub_category_name,
        ]);
        return redirect()->route('post.input');
    }

    public function commentCreate(Request $request){
        // コメントのバリデーション
        $request->validate([
            'comment' => 'required',
        ], [
            'comment.required' => 'コメントは必ず入力してください。',
        ]);

        PostComment::create([
            'post_id' => $request->post_id,
            'user_id' => Auth::id(),
            'comment' => $request->comment
        ]);
        return redirect()->route('post.detail', ['id' => $request->post_id]);
    }

    public function myBulletinBoard(){
        $posts = Auth::user()->posts()->get();
        $like = new Like;
        return view('authenticated.bulletinboard.post_myself', compact('posts', 'like'));
    }

    public function likeBulletinBoard(){
        $like_post_id = Like::with('users')->where('like_user_id', Auth::id())->get('like_post_id')->toArray();
        $posts = Post::with('user')->whereIn('id', $like_post_id)->get();
        $like = new Like;
        return view('authenticated.bulletinboard.post_like', compact('posts', 'like'));
    }

    public function postLike(Request $request){
        $user_id = Auth::id();
        $post_id = $request->post_id;

        $like = new Like;

        $like->like_user_id = $user_id;
        $like->like_post_id = $post_id;
        $like->save();

        return response()->json();
    }

    public function postUnLike(Request $request){
        $user_id = Auth::id();
        $post_id = $request->post_id;

        $like = new Like;

        $like->where('like_user_id', $user_id)
             ->where('like_post_id', $post_id)
             ->delete();

        return response()->json();
    }
}
