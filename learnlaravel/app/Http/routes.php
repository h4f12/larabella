<?php

use App\Post; 
use App\User; 
use App\Role; 
use App\Photo; 
use App\Tag; 
use Carbon\Carbon; 


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


// Route::get('/post/{id}/{date}', function($id,$date) {
// 	return 'This is post number'. $id . " " . $date;
// 

// Route::get('/admin/posts/example', array('as'=>'admin.home' ,function(){
// 	$url = route('admin.home');
// 	return "this url is " . $url;

// }));
// ;

// Route::get('/schools/{id}', function($id){
// 	return "this is school ".$id;
// });

//Route::get('posts/{id}', 'PostsController@index');


//Route::resource('posts', 'PostsController');


// Route::get('/contact/{id}/{name}/{hp}', 'PostsController@contact');

// Route::get('/contactus', 'PostsController@contact_us');





/*
|--------------------------------------------------------------------------
| DATABASE Raw SQL queries
|--------------------------------------------------------------------------
*/

// Route::get('/insert', function(){
// 	DB::insert('insert into post(title, content) values(?, ?)', ['Nasi lemak', 'nasi lemak sambal sotong...']);
// });
	
// Route::get('/read', function(){

// 	$result = DB::select('select * from post');

// 	 //return var_dump($result);

// 	foreach($result as $post){

// 		return $post->title;
// 	}
// });

// Route::get('/update', function(){

// 	$updated = DB::update('update post set title = "Nasi Unta" where id = ?', [1]);
// 	return $updated;

// });

// Route::get('/delete', function(){

// 	DB::delete('delete from post where id = ?', [4]);

// });

/*
|--------------------------------------------------------------------------
| Eloquent ORM (Object Relational Mapping) - App\Post
|--------------------------------------------------------------------------
// */

// Route::get('/read', function(){
// 	$posts = Post::all();

// 	foreach($posts as $post) {
// 		return $post->content;
// 	}
// });

// Route::get('/find', function(){

// 	$post = Post::find(2);
	
// 	return $post->content;

// });

// /// find by giving certain conditions:
// Route::get('/findwhere', function(){
// 	$posts = Post::orderBy('id', 'desc')->take(2)->get();
// 	return $posts;
// });

// ///find many users:
// Route::get('findmore', function(){
// 	$posts = Post::where('user_count', '<', 50)->firstOrFail();
// });



// ///Inser new data:
// Route::get('/insert0', function(){

// 	$post = new Post;

// 	$post->title = 'Nasi Goreng Kampung';
// 	$post->content = 'nasi ini pedas dan simple';

// 	$post->save();

// });

// ///Overwrite(Update) using insert method
// Route::get('/insert1', function(){

// 	$post = Post::find(2);

// 	$post->title = 'Ketupat Rendang';
// 	$post->content = 'makanan tradisi rakyat';

// 	$post->save();
// });



// Route::get('create', function(){
// 	Post::create(['title'=>'Briyani Batu Pahat', 'content'=>'batu dengan pahatttt!! grenggg']);
// });

// Route::get('/update', function(){

// 	Post::where('id', 1)->where('is_admin', 0)->update(['title'=>'Nasi Briyani Unta', 'content'=>'Lauk special, unta padang pasiaq']);
// });


// ///Delet and Destroy Data
// Route::get('/delete', function(){

// 	$post = Post::find(5);

// 	$post->delete();
// });


// Route::get('/destroy', function(){

// 	Post::destroy([4,3]);
	
// 	///can also with condition:
// 	//Post::where('is_admin', 0)->delete();
// });

// ///Soft delete (as define in App\Post)
// Route::get('/sdelete', function(){

// 	Post::find(6)->delete();
// });


// ///To Retrieve the (soft) deleted data
// Route::get('/onlytrash', function(){

// 	$post = Post::onlyTrashed()->get();
// 	return $post;
// });

// Route::get('/withtrash', function(){

// 	$post = Post::withTrashed()->get();
// 	return $post;
// });


// ///Restore (soft) deleted data
// Route::get('/restore', function(){

// 	Post::withTrashed()->where('id', 2)->restore();
// });

// ///Force delete (permenant delete from the DB table)
// Route::get('fdelete', function(){

// 	Post::onlyTrashed()->forcedelete();
// });

// Route::get('fdeleteid', function(){

// 	Post::withTrashed()->where('id', 2)->forcedelete();

// });


// /*
// |--------------------------------------------------------------------------
// | Eloquent Relationship - App\User
// |--------------------------------------------------------------------------


// // //One To One Relationship (user has one post)
// Route::get('user/{id}/post', function($id){

// 	return User::find($id)->post->title;
// });

// ///Inverse one on one (this post belong to user)
// Route::get('post/{id}/user', function($id){

// 	return Post::find($id)->user->name;
// });



// ///One to many relationship;
// Route::get('posts/{id}', function($id){

// 	$user = User::find($id);

// 	foreach($user->posts as $post){
// 		echo $post->title. "<br>";
// 	}
// });


// ///Many to many: many roles belong to this user($id)
// Route::get('user/{id}/roles', function($id){
// 	$user = User::find($id);

// 	foreach($user->roles as $role){
// 		echo $role->name. "<br>";
// 	}
// });

// ///Many to many: many users belong to this role($id)
// Route::get('role/{id}/users', function($id){
// 	$role = Role::find($id);

// 	foreach($role->users as $user){
// 		echo $user->name. "<br>";
// 	}
// });

// ///Accessing the pivot table
// Route::get('user/{id}/as_role', function($id){
// 	$user = User::find($id);

// 	foreach($user->roles as $role){
// 		echo $role->pivot->created_at. "<br>";
// 	}
// });


// ///Polymotphic One To Many:
// Route::get('user/{id}/photos', function($id) {
// 	$user = User::find($id);

// 	foreach($user->photos as $photo) {
// 		echo $photo->path."<br>";
// 	}
// });

// Route::get('post/{id}/photos', function($id) {
// 	$post = Post::find($id);

// 	foreach($post->photos as $photo) {
// 		echo $photo->path."<br>";
// 	}
// });

// ///Inverse Polymorphic
// Route::get('photo/user', function() {
// 	$photos = Photo::find(1);
// 	return $photos->imageable->name;
// 	// foreach($photos->imageable as $post) {
// 	// 	echo $post->title."<br>";
// 	// }
// });


// ///Polymorphic Many To Many
// Route::get('post/{id}/tags', function($id) {
// 	$post = Post::find($id);
// 	foreach($post->tags as $tag) {
// 		echo $tag->name. "<br>";
// 	}
// });

// ///Inverse Polymorphic Many To Many 
// Route::get('tag/{id}/post', function($id) {
// 	$tag = Tag::find($id);
// 	foreach($tag->posts as $post) {
// 		echo $post->title ."<br>";
// 	}
// }); 



// /*
// |--------------------------------------------------------------------------
// | CRUD Application (sample)
// |--------------------------------------------------------------------------
// */

 Route::group(['middleware'=>'web'], function(){

 	Route::resource('posts', 'PostsController');

 	///Dates
 	Route::get('dates', function(){

 		$date = new DateTime('now');
 		echo $date->format('m-d-y') ."<br>";

 		echo Carbon::now()->addDays(10)->diffForHumans();

 	});


 	Route::get('getname', function(){

 		$user = User::find(1);
 		echo $user->name;
 	});

 	Route::get('setname', function(){

 		$user = User::find(1);
 		$user->name = "Jimmy";
 		$user->save();
 	});




 });

  



























































