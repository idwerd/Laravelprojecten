<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Nette\Schema\Message;
use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Conversation extends Model
{

    use HasFactory;
    
    public function messages() {

        return $this->hasMany(Message::class);

    }

    public function advert() {

        return $this->belongsTo(Advert::class);

    }
    
    public function users() {

        return $this->belongsToMany(User::class);

    }

    protected $fillable = [
        'advert_id',
    ];
}
