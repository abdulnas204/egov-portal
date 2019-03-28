<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{
    protected $table = 'voting';

    /** @var array $fillable */
    protected $fillable = [
        'name',
        'status',
    ];

    public function options()
    {
        return $this->hasMany(VotingOption::class);
    }

    public function votes()
    {
        return $this->hasMany(VotingVote::class);
    }

    public function scopeByOpen($query)
    {
        return $query->where('status', 'open');
    }
}
