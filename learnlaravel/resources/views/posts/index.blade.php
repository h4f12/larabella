@extends('layouts.app')



@section('content')
	
	<ul>
		@foreach($posts as $post)
			@foreach($post->photos as $photo)
				<img height="100" src="{{$photo->path}}" alt="">
			@endforeach
			<li><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></li>
			<br>

		@endforeach
	</ul>

	<br>
	<br>
	<a href="{{route('posts.create')}}" class="button-btn-primary">Add New Post</a>






@endsection('footer')