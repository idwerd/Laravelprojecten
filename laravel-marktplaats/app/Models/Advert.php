<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Advert extends Model
{
    use HasFactory;
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->hasOne(Category::class);
    }

    public function conversations() {
        return $this->hasMany(Conversation::class);
    }

    public function bids() {
        return $this->hasMany(Bid::class);
    }

    protected $fillable = [
        'user_id',
        'category_id',
        'title', 
        'description', 
        'price',
    ];
}
