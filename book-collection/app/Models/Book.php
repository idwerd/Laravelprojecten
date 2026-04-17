<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    public function author() {
        return $this->belongsTo(Author::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    protected $fillable = [
        'title', 
        'summary', 
        'author_id'
    ];
}
