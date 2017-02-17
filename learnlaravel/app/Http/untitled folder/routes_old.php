<?php

use App\Post;
use App\User;

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
    //return"Hafiz is learning...";
});

Route::get('/hello', function() {
	echo '<h1 class="text-center">Hello Hafiz.....</h1>';
});

Route::get('/about', function() {
	return '<h3 class="text-center">About what??</h3>';
});

// Route::get('/post/{id}/{date}', function($id,$date) {
// 	return 'This is post number'. $id . " " . $date;
// });

Route::get('/admin/posts/example', array('as'=>'admin.home' ,function(){
	$url = route('admin.home');
	return "this url is " . $url;

}));

Route::get('/user', function(){
	return 'all users...';
});

Route::get('/schools/{id}', function($id){
	return "this is school ".$id;
});

Route::get('/new/{id}', 'newController@index');


Route::get('/about/{id}', 'AboutController@index');

Route::get('/school/{id}', 'SchoolController@index');

Route::resource('posts', 'newController');

Route::get('/posting/{id}/{name}/{hp}', 'newController@contact');

Route::get('people', 'newController@people');




/*
|--------------------------------------------------------------------------
| DATABASE Raw SQL queries
|--------------------------------------------------------------------------
*/

Route::get('/insert', function(){

	DB::insert('insert into posts(title, content) values(?, ?)', ['Nasi Ayam', 'nasi ayam special ni...']);

});
	
// Route::get('/read', function(){

// 	$result = DB::select('select * from posts where id=?', [1]);

// 	// return $result;

// 	foreach($result as $post){

// 		return $post->content;
// 	}
// });

// Route::get('/update', function(){

// 	$updated = DB::update('update posts set title = "Updated Title" where id = ?', [1]);
// 	return $updated;

// });

// Route::get('/delete', function(){

// 	DB::delete('delete from posts where id = ?', [1]);

// });

/*
|--------------------------------------------------------------------------
| Eloquent ORM - App\Post
|--------------------------------------------------------------------------
*/
Route::get('/find', function(){

	$post = Post::find(2);
	
	return $post->content;

});

Route::get('/insert2', function(){

	$post = new Post;

	$post->title = 'Nasi Goreng KAmpung';
	$post->content = 'nasi ini pedas dan simple';

	$post->save();

});Route::get('/update', function(){

	$post = Post::find(2);

	$post->title = 'Nasi Lemak';
	$post->content = 'makanan tradisi rakyat';

	$post->save();
});

Route::get('/update2', function(){

	Post::where('id', 2)->update(['title'=>'Nasi Lemak Sotong', 'content'=>'Lauk special, sambal sotong']);
});

Route::get('/delete2', function(){

	$post = Post::find(2);

	$post->delete();
});

Route::get('/destroy45', function(){

	Post::destroy([4,5]);
});

//soft delete (as define in App\Post)
Route::get('/sdelete', function(){

	Post::find(6)->delete();
});

Route::get('/readsdeleted', function(){

	// $post = Post::onlyTrashed()->get();
	$post = Post::withTrashed()->get();
	return $post;
});

Route::get('/restore', function(){

	Post::withTrashed()->where('id', 6)->restore();
});

//force delete
Route::get('fdelete', function(){

	// Post::withTrashed()->where('id', 3)->forcedelete();
	Post::onlyTrashed()->forcedelete();
});


/*
|--------------------------------------------------------------------------
| Eloquent Relationship - App\User
|--------------------------------------------------------------------------
*/

//One To One Relationship
Route::get('user/{id}/post', function($id){
	return User::find($id)->post->content;

});

Route::get('post/{id}/user', function($id){
	return Post::find($id)->user->name;

});









