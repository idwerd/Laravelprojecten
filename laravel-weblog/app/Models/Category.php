<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{   
    use HasFactory;
    public function category() {
        return $this->hasMany(Category::class);
    }
    public function blogs() {
        return $this->belongsToMany(Blog::class);
    }
}
