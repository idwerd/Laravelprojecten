<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{   
    use HasFactory;
    public function category() {
        return $this->hasMany(Category::class);
    }
    public function blogs(): BelongsToMany {
        return $this->belongsToMany(Blog::class);
    }
}
