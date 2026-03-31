<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    public function adverts() {

        return $this->hasMany(Advert::class);

    }

    public function bids() {

        return $this->hasMany(Bid::class);

    }

    public function messages() {
        
        return $this->hasMany(Message::class);

    }

    public function conversations() {
        
        return $this->belongsToMany(Conversation::class);
        
    }



    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ]; 
    }
    protected $fillable = [
        'name',
        'email',
        'password'
    ];
}
