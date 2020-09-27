<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Testing\Constraints\SoftDeletedInDatabase;

class Post extends Model
{
    use SoftDeletes;

    public function category(){
        return $this->belongsTo(Category::class,'cat_id');
    }
}
