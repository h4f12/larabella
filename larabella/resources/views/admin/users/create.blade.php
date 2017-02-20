@extends('layouts.admin')

@section('content')

<h1 class="text-center">Register New User</h1>

@include('includes.form_errors')

<div>
{!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'files' => true]) !!}
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
		{!! Form::select('role_id', $roles, 3,['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('status', 'Status:') !!}
		{!! Form::select('is_active', [1=>'active', 0=>'not active'], 0, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('password', 'Password:') !!}
		{!! Form::password('password', ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('image', 'Users Pic:') !!}
		{!! Form::file('image') !!}
	</div>

	<div class="form-group">
		{!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
	</div>

{{csrf_field()}}

{!! Form::close() !!}
</div>


@stop
