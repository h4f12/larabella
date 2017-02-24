@extends('layouts.admin')

@section('content')

<h1 class="text-center">Edit User</h1><br>

@include('includes.form_errors')



<div>
{!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files' => true]) !!}
	
	<div class="text-center">
		<img height="100" src="{{$user->photo ? $user->photo->file : '/images/noimage.png'}}" >
	</div>


	<div class="form-group">
		{!! Form::label('name', 'First Name:') !!}
		{!! Form::text('name', null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('email', 'Email:') !!}
		{!! Form::text('email', null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('role', 'Role:') !!}
		{!! Form::select('role_id', $roles, null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('status', 'Status:') !!}
		{!! Form::select('is_active', [1=>'active', 0=>'not active'], null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('password', 'Password:') !!}
		{!! Form::password('password', ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('image', 'Upload New Pic:') !!}
		{!! Form::file('userpic') !!}
	</div>

	<div class="form-group">
		{!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
	</div>

{{csrf_field()}}

{!! Form::close() !!}
</div>


@stop















































