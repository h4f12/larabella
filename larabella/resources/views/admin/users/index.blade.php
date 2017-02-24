@extends('layouts.admin')


@section('content')

<h1 class="text-center">All Users</h1>


<table class="table table-striped">
  <tr>
		<th>Id</th>
		<th>Photo</th>
		<th>Role</th>
		<th>Name</th>
		<th>Status</th>
		<th>Email</th> 
		<th>Created at</th>
		<th>Updated at</th>
  </tr>

  @if($users)

  @foreach($users as $user) 
	<tr>
		<td>{{$user->id}}</td>
		<td><img height="50" src="{{$user->photo ? $user->photo->file : '/images/noimage.png'}}" class="img-rounded"></td>
		<td>{{$user->role->name}}</td>
		<td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
		<td>{{$user->is_active == 1 ? 'active' : 'not active'}}</td>
		<td>{{$user->email}}</td>
		<td>{{$user->created_at->diffForHumans()}}</td>
		<td>{{$user->updated_at->diffForHumans()}}</td>
  </tr>
  @endforeach

  @endif

</table>

@stop