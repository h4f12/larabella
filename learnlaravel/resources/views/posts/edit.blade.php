@extends('layouts.app')


@section('content')

<small>Edit Post</small>

    {!! Form::model($post, ['method'=>'PATCH', 'action'=>['PostsController@update', $post->id]]) !!}

     	<!-- <input type="hidden" name="_method" value="PUT"> -->

    	{!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
        {!! Form::submit('Edit', ['class'=>'button-btn-primary']) !!}

       <!--  <input type="text" name="title" placeholder="Enter Title" value="{{$post->title}}">
    	<input type="submit" value="Update"> -->

    	{{csrf_field()}}
    	
    {!! Form::close() !!}

    <br>

    <div>

     {!! Form::open(['method'=>'DELETE', 'action'=>['PostsController@destroy', $post->id]]) !!}

        {!! Form::submit('Delete It', ['class'=>'button-btn-danger']) !!}

        {{csrf_field()}}
        
    {!! Form::close() !!}


    	<!-- <form method="post" action="/posts/{{$post->id}}">

    	<input type="hidden" name="_method" value="DELETE">
    	<input type="submit" value="Delete"> -->

    <!-- 	</form> -->

    </div>
    <br>


@endsection('footer')