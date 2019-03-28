<?php

namespace App\Models;

use App\Models\Clients\Client;
use App\Traits\EncryptableTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Citizen extends Authenticatable
{
    use Notifiable;
    use EncryptableTrait;

    protected $guard = 'citizen';

    protected $table = "citizen";

    protected $fillable = [
        'identifier',
        'name',
        'password',
        'auth_token',
        'last_name',
        'first_name',
        'date_of_birth',
        'date_joined',
        'email',
        'status',
        'active',
        'gender',
    ];

    protected $encryptable = [
        'auth_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'auth_token',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    /**
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
