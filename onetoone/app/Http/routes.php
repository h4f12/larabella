<?php 
use App\User;
use App\Address;

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
    //return "Hello";
});


///Read data
Route::get('read/{id}', function($id){
	$user = User::findOrFail($id);
	echo $user->address->name;
});


///insert data into DB
Route::get('/insertaddress/{id}', function($id) {

	$user = User::findOrFail($id);

	$address = new Address(['name'=>'New Jersey']);

	$user->address()->save($address);
});

Route::get('update/{id}', function($id) {
	$address = Address::where('user_id', $id)->first();
	//other option:
	///$address = Address::whereUserId(1);
	///$address = Address::where('user_id', '=', 1);

	$address->name = "cyberjaya";

	$address->save();
});

///Delete data
Route::get('delete/{id}', function($id) {
	$user = User::findOrFail($id);
	$user->address()->delete();
	return "user is deleted";

});

