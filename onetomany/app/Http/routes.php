<?php
use App\User;
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


///CRUD (one to many)

///Create new post (given: user id)
Route::get('create/{id}', function($id) {
	$user = User::findOrFail($id);
	///$user->posts->title = "Post Satu";
	$post = new Post(['title'=>'Post Satu', 'content'=>'satu-satu']);
 	$user->posts()->save($post);
});

///Read (given: user id)
Route::get('read/{id}', function($id) {
	$user = User::findOrFail($id);
	foreach($user->posts as $post) {
		echo "Title {$post->id}: ". $post->title. "<br>";
		echo "Content {$post->id}: ".$post->content. "<br>";
	}
});

///Update/Overwrite current data (given: user id)
Route::get('update/{id}', function($id) {
	$user = User::findOrFail($id);
	$user->posts()->whereTitle('Post Satu')->update(['content'=>'satu, dua, tiga']);
});

///Delete (given: user id)
Route::get('delete/{id}', function() {
	$user = User::find(1);
	$user->posts()->whereId(2)->delete();
});







///Read (Special)
// Route::get('readsp/{id}', function($id) {
// 	$user = User::findOrFail($id)->posts->first();
// 	return $user->title;
	
// });











