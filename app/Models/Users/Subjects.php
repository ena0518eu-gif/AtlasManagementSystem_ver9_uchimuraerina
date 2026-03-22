<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

use App\Models\Users\User;

class Subjects extends Model
{
    const UPDATED_AT = null;

    protected $fillable = [
        'subject'
    ];

    public function users(){
        return $this->belongsToMany(
            'App\Models\Users\User', // Userモデルの名前空間
            'subject_users',         // 中間テーブル名
            'subject_id',            // Subjectモデル側の外部キー
            'user_id'                // Userモデル側の外部キー
        );
        // リレーションの定義
    }
}
