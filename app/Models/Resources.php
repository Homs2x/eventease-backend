<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{
    use HasFactory;

    protected $table = 'resources';

    public $timestamps = false;

    protected $primaryKey = 'resource_id';

    protected $hidden = [
        'resource_id'
    ];
    protected $fillable = ['availability'];
}
