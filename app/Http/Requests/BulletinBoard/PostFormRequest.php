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
            'post_title' => 'required|string|max:100',
            'post_body' => 'required|string|max:2000',
        ];
    }

    public function messages(){
        return [
            'post_category_id.required' => 'カテゴリーは必ず選択してください。',
            'post_category_id.exists' => '正しいサブカテゴリーを選択してください。',

            'post_title.required' => 'タイトルは必ず入力してください。',
            'post_title.string' => 'タイトルは文字列である必要があります。',
            'post_title.max' => 'タイトルは100文字以内で入力してください。',

            'post_body.required' => '投稿内容は必ず入力してください。', // ←「内容」→「投稿内容」に変更
            'post_body.string' => '内容は文字列である必要があります。',
            'post_body.max' => '最大文字数は2000文字です。',
        ];
    }
}
