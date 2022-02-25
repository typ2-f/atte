<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public function attendances()
    {
        return $this->hasMany(attendance::class);
    }
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
    //    'password',
        'remember_token'
    ];
}
