<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VotingOption extends Model
{
    protected $table = 'voting_option';

    /** @var array $fillable */
    protected $fillable = [
    	'voting_id',
        'name',
    ];

}