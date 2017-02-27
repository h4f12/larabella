@extends('layouts.admin')


@section('content')

<h1 class="text-center">All Posts</h1>

<div class="container">
	@if(Session::has('deleted_post'))
		<h4 class="bg-success">{{session('deleted_post')}}</h4>
	@endif

	@if(Session::has('created_post'))
		<h4 class="bg-success">{{session('created_post')}}</h4>
	@endif

	@if(Session::has('updated_post'))
		<h4 class="bg-success">{{session('updated_post')}}</h4>
	@endif
</div>

<table class="table table-striped">
  <tr>
		<th>Id</th>
		<th>Photo</th>
		<th>Category</th>
		<th>Title</th>
		<th>Author</th>
		<th>Content</th> 
		<th>Created at</th>
		<th>Updated at</th>
  </tr>

  @if($posts)

	  @foreach($posts as $post) 
		<tr>
			<td>{{$post->id}}</td>
			<td><img height="50" src="{{$post->photo ? $post->photo->file : '/images/noimage.png'}}" class="img-rounded"></td>
			<td>{{$post->category ? $post->category->name : 'N/A'}}</td>			
			<td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
			<td><a href="{{route('admin.users.edit', $post->user->id)}}">{{$post->user->name}}</a></td>
			<td>{{$post->body}}</td>
			<td>{{$post->created_at->diffForHumans()}}</td>
			<td>{{$post->updated_at->diffForHumans()}}</td>
	  </tr>
	  @endforeach

  @endif




@stop