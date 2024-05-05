<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tracker extends Model
{
    protected $table = 'visit_info';

    protected $fillable = [
        'id',
        'ip',
        'os',
        'browser',
    ];
}
