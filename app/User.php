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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','level'
    ];

    protected $visible = ['name','email', 'admin'];// a partir do momento que ativa o visible o hidden passa a ser despresado

    protected $appends = ['admin'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function adressDelivery()
    {
        return $this->hasOne(Address::class,'user', 'id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class,'author', 'id');
    }

    public function commentsOnMyPost()
    {
        return $this->hasManyThrough(Comment::class,Post::class,'author', 'post');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'item');
    }

    public function scopeStudents($query)
    {
        return $query->where('level', '<=', 5);
    }

    public function scopeAdmins($query)
    {
        return $query->where('level', '>', 5);
    }

    public function getAdminAttribute()
    {
        return ($this->attributes['level'] > 5 ? true :false);
    }
}
