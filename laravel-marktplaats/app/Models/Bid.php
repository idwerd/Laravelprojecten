<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bid extends Model
{

    use HasFactory;
    
    public function advert() {

        return $this->belongsTo(Advert::class);

    }

    public function user() {

        return $this->belongsTo(User::class);

    }

    protected $fillable = [
        'user_id',
        'advert_id',
        'price', 
    ];
}
