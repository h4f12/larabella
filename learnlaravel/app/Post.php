<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{

	use SoftDeletes;


	protected $dates = ['deleted_at'];


    //Rename the default $table = posts (auto defined by laravel)
    protected $table = 'post';

    /// $primaryKey = 'id' (laravel default) 

    protected $fillable = [
    	'title',
    	'content'

    ];


    ///Pulling the user of this post (this post belongs to $user_id)
    public function user() {
    	return $this->belongsTo('App\User');
    	///return $this->belongsTo('App\User','user_id', 'id');
    }

    ///polymorphic (1 to many) to photo
    public function photos() {
        return $this->morphMany('App\Photo', 'imageable');
    }

    ///polymorphc (many to many) to Tag
    public function tags() {
        return $this->morphToMany('App\Tag', 'taggable');
    }


    ///Query Scope for show all post
    public function scopeLatest($query) {
        return $query->orderBy('id', 'desc')->get();

    }










































}
