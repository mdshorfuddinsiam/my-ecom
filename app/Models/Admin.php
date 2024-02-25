<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\AdminResetPasswordNotification;

class Admin extends Authenticatable
{
    // use HasFactory;
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = "admin";


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }


    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'image',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
