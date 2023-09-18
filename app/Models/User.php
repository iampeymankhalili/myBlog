<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getPostCountAttribute()
    {
        return $this->posts()->count();
    }

    public function getViewCountAttribute()
    {
        return $this->posts()->sum('view');
    }

    public function posts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    public function checkTwoPassword($password, $re_password)
    {
        if ($password !== $re_password) {
            return false;
        }
        else{
            return true;
        }
    }
}
