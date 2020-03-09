<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function type() {
        return $this->hasOne('App\UserTypes', 'id', 'type_id');
    }

    public function isUser() {
        return $this->type()->where('type', 'user')->exists();
      }
    public function isAutor() {
      return $this->type()->where('type', 'autor')->exists();
    }

    public function isAdmin() {
      return $this->type()->where('type', 'admin')->exists();
    }


}
