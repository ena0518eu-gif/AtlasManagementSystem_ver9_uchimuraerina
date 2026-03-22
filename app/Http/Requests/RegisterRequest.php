<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'over_name' => ['required', 'string', 'max:10'],
            'under_name' => ['required', 'string', 'max:10'],

            'over_name_kana' => ['required', 'string', 'regex:/^[ァ-ヶー]+$/u', 'max:30'],
            'under_name_kana' => ['required', 'string', 'regex:/^[ァ-ヶー]+$/u', 'max:30'],

            'mail_address' => ['required', 'email', 'max:100', 'unique:users,mail_address'],

            'sex' => ['required', 'in:1,2,3'],

            // ★ 修正ポイント：stringで受ける（HTMLはstring）
            'old_year' => ['required', 'integer', 'between:1985,' . date('Y')],
            'old_month' => ['required', 'integer', 'between:1,12'],
            'old_day' => ['required', 'integer', 'between:1,31'],

            'role' => ['required', 'in:1,2,3,4'],

            'password' => ['required', 'string', 'min:8', 'max:30', 'confirmed'],
        ];
    }

    /**
     * Get the validation error messages.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'over_name.required' => '姓は必須です',
            'over_name.max' => '姓は10文字以内で入力してください',

            'under_name.required' => '名は必須です',
            'under_name.max' => '名は10文字以内で入力してください',

            'over_name_kana.required' => 'セイは必須です',
            'over_name_kana.regex' => 'セイはカタカナで入力してください',

            'under_name_kana.required' => 'メイは必須です',
            'under_name_kana.regex' => 'メイはカタカナで入力してください',

            'mail_address.required' => 'メールアドレスは必須です',
            'mail_address.email' => '正しいメール形式で入力してください',
            'mail_address.unique' => 'このメールアドレスは既に登録されています',

            'sex.required' => '性別は必須です',
            'sex.in' => '性別は男性・女性・その他から選択してください',

            'old_year.required' => '生年月日は必須です',
            'old_month.required' => '生年月日は必須です',
            'old_day.required' => '生年月日は必須です',

            'old_year.between' => '年は正しい範囲で入力してください',
            'old_month.between' => '月は1〜12で入力してください',
            'old_day.between' => '日は1〜31で入力してください',

            'role.required' => '役職は必須です',
            'role.in' => '役職を正しく選択してください',

            'password.required' => 'パスワードは必須です',
            'password.min' => 'パスワードは8文字以上で入力してください',
            'password.max' => 'パスワードは30文字以内で入力してください',
            'password.confirmed' => '確認用パスワードが一致しません',
        ];
    }

    /**
     * カスタムバリデーション（生年月日の正確チェック）
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            $year = $this->old_year;
            $month = $this->old_month;
            $day = $this->old_day;

            // ★ ここが重要（TypeError防止）
            if (
                is_numeric($year) &&
                is_numeric($month) &&
                is_numeric($day)
            ) {
                if (!checkdate((int)$month, (int)$day, (int)$year)) {
                    $validator->errors()->add('old_day', '正しい生年月日を入力してください');
                }
            }
        });
    }
}
