<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categories\SubCategory;

class PostSubCategory extends Model
{
    const UPDATED_AT = null;
    const CREATED_AT = null;

    protected $fillable = [
        'post_id',
        'sub_category_id',
    ];

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function subCategory(){
        return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
    }
}
