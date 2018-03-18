<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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
        'password', 'remember_token',
    ];

    public function post()
    {
        return $this->hasOne('App\Post');// this is gonna go to the post table and its gonna look for the user_id collumn by default, it will go to the Post table, because thats where we send it with the \Post hasOne('App\Post'), if you want it to search for a different column you should add it like this hasOne('App\Post','specified_column')
    }

    public function posts()
    {
        return $this->hasMany('\App\Post');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role')->withPivot('created_at');;

        //To customize tables names and columns folow the format below
        //return $this->belongsToMany('App\Role','user_roles','user_id','role_id');
    }
}
