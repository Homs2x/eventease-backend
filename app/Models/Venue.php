<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    protected $table = 'venue';

    protected $primaryKey = 'venue_id';

    public $timestamps = false;

    protected $hidden = [
        'venue_id'
    ];
    protected $fillable = ['availablity_status'];
}
