<?php

namespace App\Modules\Authentication\Infrastructure\Database\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\Contracts\OAuthenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements OAuthenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = ['id', 'phone', 'name', 'family', 'code', 'username', 'email', 'password', 'created_at', 'updated_at'];
}
