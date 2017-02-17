<?php
use App\User;
use App\Role;

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


///CRUD Many to Many

///Create and Assign Role 
Route::get('create/{id}', function($id){
	$user = User::find($id);
	$role = new Role(['name'=>'Admin']);
	$user->roles()->save($role);
});

///Read
Route::get('read/{id}', function($id) {
	$user = User::findOrFail($id);
	//return $user->roles;
	foreach($user->roles as $role) {
		echo "User ID: ".$role->id."<br>";
		echo "Role: ".$role->name."<br>";
	}
});

///Update
Route::get('update/{id}', function($id) {
	$user = User::findOrFail($id);

	if($user->has('roles')) {
		foreach($user->roles as $role) {
			if($role->name = 'Admin') {
				$role->name = 'subscriber';
				$role->save();
			}
		}
	}
});

///Delete
Route::get('delete/{id}', function($id) {
	$user = User::findOrFail($id);
	foreach($user->roles as $role) {
		$role->whereId(1)->delete();
	}
});

///Attach & Detach (role to user)
Route::get('attach/{id}', function($id){
	$user = User::findOrFail($id);
	$user->roles()->attach(3);
});
Route::get('detach/{id}', function($id){
	$user = User::findOrFail($id);
	$user->roles()->detach(3);
});

///Sync
Route::get('sync/{id}', function($id){

});














