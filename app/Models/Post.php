<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function category() {
    return $this->belongsTo(Category::class);
}

public function author() {
    return $this->belongsTo(User::class, 'author_id');
}

public function images() {
    return $this->hasMany(PostImage::class)->orderBy('sort_order');
}

}
