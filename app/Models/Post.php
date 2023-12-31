<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'status',
        'created_by'
    ];
    
    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'created_by','id');
    }
}
