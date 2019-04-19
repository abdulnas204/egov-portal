<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Law extends Model
{
    protected $table = 'law';

    /** @var array $fillable */
    protected $fillable = [
        'status',
        'name',
        'top',
        'body',
    ];
}
