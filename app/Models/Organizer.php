<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Organizer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'organizer';

    protected $primaryKey = 'organizer_id';

    protected $fillable = [
        'email',
        'password',        
    ];

    protected $hidden = [
        'password',
        'organizer_id'
    ];

    protected $casts = [
        'password' => 'hashed',
    ];
}
