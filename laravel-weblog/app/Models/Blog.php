<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Blog extends Model
{
    use HasFactory;

    public function category(): BelongsToMany {
        return $this->belongsToMany(Category::class);
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
        'user_id',
        'premium',
    ];
}
