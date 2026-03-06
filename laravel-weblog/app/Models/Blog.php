<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function blogs() {
        return $this->hasMany(Blog::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'title', 
        'body', 
        'image',
        'category_id',
        'user_id',
        'premium',
    ];
}
