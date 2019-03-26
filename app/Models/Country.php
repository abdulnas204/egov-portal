<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country';

    /** @var array $fillable */
    protected $fillable = [
        'iso2',
        'name',
    ];
}
