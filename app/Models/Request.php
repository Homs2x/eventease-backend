<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    
    protected $table = 'request';

    public $timestamps = false;

    protected $primaryKey = 'request_id';

    public static $rules = [
        'request_details' => 'required',
        'request_approval' => 'boolean',
    ];

    protected $fillable = [
        'request_details',
        'request_approval',
        'organizer_id',
    ];
}
