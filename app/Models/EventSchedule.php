<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventSchedule extends Model
{
    use HasFactory;

    protected $table = 'event_schedule';

    
    protected $primaryKey = 'schedule_id'; 

    protected $hidden = [
        'schedule_id'
    ];

    protected $fillable = [
        'event_id',
    ];
}
