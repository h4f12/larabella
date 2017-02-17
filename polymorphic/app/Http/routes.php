<?php
use App\Staff;
use App\Product;
use App\Photo;

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


///CRUD Polymorphic

///Create/Insert
Route::get('create/{id}', function($id){
	$staff = Staff::findOrFail($id);

	$staff->photos()->create(['path'=>'jam-G-Shock.png']);
});

///Read
Route::get('read/{id}', function($id){
	$staff = Staff::findOrFail($id);

	foreach($staff->photos as $photo) {
		echo "$staff->name: ".$photo->path;
	}
});

///Read2
Route::get('read2/{id}', function($id){
	$staff = Staff::findOrFail($id);
	$photo = $staff->photos()->wherePath('jam-G-Shock.png')->first();
	echo $photo->id. "<br>";
	echo $photo->path;

});


///Update
Route::get('update/{id}', function($id){
	$staff = Staff::findOrFail($id);
	$photo = $staff->photos()->whereId(2)->first();
	
	$photo->path = '123.png';
	$photo->save();

});

///Delete
Route::get('delete/{id}', function($id){
	$staff = Staff::findOrFail($id);
	$staff->photos()->delete();
});


///Assign
Route::get('assign', function(){
	$staff = Staff::findOrFail(3);
	$photo = Photo::find(5);

	$staff->photos()->save($photo);
});
///Unassign
Route::get('unassign', function(){
	$staff = Staff::findOrFail(3);
	//$photo = Photo::find(5);

	$staff->photos()->wherePath('leatherjacket.png')->update(['imageable_id'=>'','imageable_type'=>'']);
});

















