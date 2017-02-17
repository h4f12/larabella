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

    ///pulling/returnig the post of this user ($user_id has one $post)
    public function post(){
        return $this->hasOne('App\Post');
        ///return $this->hasOne('App\Post', 'user_id', 'id');
    }


    ///pulling/returnig the (all) posts of this user ($user_id has many posts)
    public function posts() {
        return $this->hasMany('App\Post');
        ///return $this->hasMany('App\Post', 'user_id','id');
    }


    ///returning all roles that belongs to this user($id):
    public function roles() {
        return $this->belongsToMany(Role::class)->withPivot('created_at');
        ///return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
    } 


   ///polymorphic to photo
    public function photos() {
        return $this->morphMany('App\Photo', 'imageable');
    }


    public function getNameAttribute($value) {
        return ucfirst($value);
        //return strtoupper($value);

    }

    public function setNameAttribute($value) {
        $this->attributes['name'] = strtoupper($value);

    }







































}
