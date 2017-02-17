<?php
use App\Tag;
use App\Video;
use App\Post;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


///CRUD

///Creat
Route::get('create', function(){
	$post = Post::create(['name'=>'Jom Makannn']);
	$tag1 = Tag::find(2);
	$post->tags()->save($tag1);

	$video = Video::find(1);
	$tag2 = Tag::find(1);
	$video->tags()->attach($tag2);
});

///Read
Route::get('read', function(){
	$post = Post::find(5);
	foreach($post->tags as $tag){
		echo $tag->tag."<br>";
	}
});

///Update
Route::get('update', function(){
	$post = Post::find(5);
	foreach($post->tags as $tag){
		$tag->whereTag('#edu')->update(['tag'=>'#education']);
	}

});

///Sync - Change Video with ID 1 to have only tag with tag id 3
Route::get('sync', function(){
	$video = Video::find(1);
	$video->tags()->sync([3]);
});













