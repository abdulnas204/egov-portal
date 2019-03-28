<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VotingVote extends Model
{
    protected $table = 'voting_vote';

    /** @var array $fillable */
    protected $fillable = [
    	'voting_id',
    	'voting_option_id',
    	'citizen_id',
    ];

    public function votingoption()
    {
        return $this->belongsTo(VotingOption::class, 'id');
    }

    public function citizen()
    {
        return $this->belongsTo(Citizen::class);
    }

}