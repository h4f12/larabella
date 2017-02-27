@extends('layouts.admin')


@section('content')

<h1 class="text-center">Create New Post</h1>

@include('includes.form_errors')

<div>

<div>Author: {{$user->name}}</div><br>

{!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store', 'files' => true]) !!}

	<div class="form-group">
		{!! Form::label('category', 'Category:') !!}
		{!! Form::select('category_id', [''=>'Choose Category'] + $categories, null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('title', 'Title:') !!}
		{!! Form::text('title', null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('body', 'Content:') !!}
		{!! Form::textarea('body', null, ['class'=>'form-control']) !!}
	</div>


	<div class="form-group">
		{!! Form::label('image', 'Upload Picture:') !!}
		{!! Form::file('postpic') !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
	</div>

{{csrf_field()}}

{!! Form::close() !!}
</div>





@stop