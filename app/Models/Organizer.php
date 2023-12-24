<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizer extends Model 
{
    use HasFactory;

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
