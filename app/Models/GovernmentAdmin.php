<?php

namespace App\Models;

use App\Models\Clients\Client;
use App\Traits\EncryptableTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class GovernmentAdmin extends Authenticatable
{
    use Notifiable;
    use EncryptableTrait;

    protected $guard = 'government_admin';

    protected $table = "government_admin";

    protected $fillable = [
        'full_name',
        'name',
        'password',
        'auth_token',
        'position_name',
        'role',
        'active',
    ];

    protected $encryptable = [
        'auth_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'auth_token',
    ];

    /**
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
