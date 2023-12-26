<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $table = 'admin';

    protected $primaryKey = 'admin_id';

    protected $hidden = [
        'password',
        'admin_id'
    ];

    protected $fillable = [
        'username',
        'password',
    ];
}
