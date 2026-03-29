<?php

namespace App\Http\Requests\BulletinBoard;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'post_category_id' => 'required|exists:sub_categories,id', // ←追加

            // ★追加：サブカテゴリー登録用バリデーション（入力された時だけチェック）
            'sub_category_name' => 'nullable|string|max:100|unique:sub_categories,sub_category',

            'post_title' => 'required|string|max:100',
            'post_body' => 'required|string|max:2000',

            // ★追加：コメント用バリデーション
            // コメントは必須、文字列型、最大250文字
            // ↓↓↓ コメント機能は別Requestに分離したのでここでは使わない
            // 'comment' => 'required|string|max:250',
        ];
    }

    public function messages()
    {
        return [
            'post_category_id.required' => 'カテゴリーは必ず選択してください。',
            'post_category_id.exists' => '正しいサブカテゴリーを選択してください。',

            // ★追加：サブカテゴリー用メッセージ
            'sub_category_name.string' => 'サブカテゴリーは文字列である必要があります。',
            'sub_category_name.max' => 'サブカテゴリーは100文字以内で入力してください。',
            'sub_category_name.unique' => 'このサブカテゴリーは既に存在しています。',

            'post_title.required' => 'タイトルは必ず入力してください。',
            'post_title.string' => 'タイトルは文字列である必要があります。',
            'post_title.max' => 'タイトルは100文字以内で入力してください。',

            'post_body.required' => '投稿内容は必ず入力してください。',
            'post_body.string' => '内容は文字列である必要があります。',
            'post_body.max' => '最大文字数は2000文字です。',

            // コメント用メッセージ
            // 'comment.required' => 'コメントは必須です。',
            // 'comment.string' => 'コメントは文字列で入力してください。',
            // 'comment.max' => 'コメントは250文字以内で入力してください。',
        ];
    }
}
