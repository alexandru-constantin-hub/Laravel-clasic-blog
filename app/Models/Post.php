<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'text', 'category_id', 'user_id', 'image'];

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function categories() {
        return $this->belongsTo(Category::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function scopeFilter($query, array $filters){
        if($filters['post'] ?? false){
            $query->where('title', 'like', '%'. request('post').'%')->orWhere('text', 'like', '%'.request('post').'%');
        }
        
    }

}
