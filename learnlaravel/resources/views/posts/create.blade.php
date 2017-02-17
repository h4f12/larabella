@extends('layouts.app')



@section('content')
<div>
	<small>Create New Post</small>
	
    <!-- <form method="post" action="/posts"> -->

    {!! Form::open(['method'=>'POST', 'action'=>'PostsController@store', 'files'=>'true']) !!}

        <div>{!! Form::file('thisfile', ['class'=>'form-control']) !!}</div>

    	{!! Form::label('title', 'Title:') !!}
    	{!! Form::text('title', null, ['class'=>'form-control']) !!}
    	{!! Form::submit('+ New Post') !!}

    	<!-- <input type="text" name="title" placeholder="Enter Title">
    	<input type="submit" name="submit"> -->
    	
    	{{csrf_field()}}
    	
    {!! Form::close() !!}

</div>

<div>
    @if(count($errors) > 0)

    	@foreach($errors->all() as $error)

    		{{$error}}<br>

		@endforeach

    @endif
</div>

@endsection('footer')