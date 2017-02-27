<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Photo;

use App\Http\Requests;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UserEditRequest;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$roles = ['' => '--- select option ---'] + Role::Lists("name", "id")->toArray();
        $roles = Role::all()->pluck('name', 'id');
        return view('admin.users.create', compact('roles'));    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $input = $request->all();

        if($file = $request->file('userpic')) {
            $name = time(). $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;
        }
        //return $input['role_id'];
        $input['password'] = bcrypt($request->password);
        $user = User::create($input);

        if($user) {
            Session::flash('created_user', 'The new user has been successfully created.');
            //echo "new user ($user->name) successfully created";
        }
        return redirect('admin/users');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all()->pluck('name', 'id');

        return view('admin.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        $user = User::findOrFail($id);

        if(trim($request->password) == '') {
            $input = $request->except('password');
        } 
        else {
        $input = $request->all();
        $input['password'] = bcrypt($request->password);
        }

        if($file = $request->file('userpic')) {
            $name = time(). $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;
        }

        $user->update($input);
        Session::flash('updated_user', 'The user has been successfully updated.');
        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        unlink(public_path(). $user->photo->file);

        $user->delete();

         Session::flash('deleted_user', 'The user has been successfully deleted.');
        
         return redirect('admin/users');
    }
}














































