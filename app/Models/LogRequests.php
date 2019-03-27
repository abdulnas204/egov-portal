<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogRequests extends Model
{
    protected $table = 'log_requests';

    /** @var array $fillable */
    protected $fillable = [
        'type',
        'user',
        'url',
    ];
}
