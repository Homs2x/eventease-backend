<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'event';

    public $timestamps = false;

    protected $primaryKey = 'event_id';

    protected $hidden = [
        'event_id'
    ];

    protected $fillable =[
        'venue_id',
        'resource_id',
        'event_name',
        'event_desc',

    ];
}
