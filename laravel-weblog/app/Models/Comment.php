<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{

    use HasFactory;

    public function comment() {    
        return $this->hasMany(Comment::class);
    }

    public function blog() {
        return $this->belongsTo(Blog::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'body', 
        'blog_id',
    ];
}
