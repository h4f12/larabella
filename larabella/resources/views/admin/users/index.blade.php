@extends('layouts.admin')


@section('content')

<h1 class="text-center">All Users</h1>

<div class="container">
	@if(Session::has('deleted_user'))
		<p class="bg-success">{{session('deleted_user')}}</p>
	@endif

	@if(Session::has('created_user'))
		<p class="bg-success">{{session('created_user')}}</p>
	@endif

	@if(Session::has('updated_user'))
		<p class="bg-success">{{session('updated_user')}}</p>
	@endif
</div>


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