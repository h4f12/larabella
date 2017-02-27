@extends('layouts.admin')


@section('content')

<h1 class="text-center">All Posts</h1>

<div class="container">
	@if(Session::has('deleted_post'))
		<p class="bg-success">{{session('deleted_post')}}</p>
	@endif

	@if(Session::has('created_post'))
		<p class="bg-success">{{session('created_post')}}</p>
	@endif

	@if(Session::has('updated_post'))
		<p class="bg-success">{{session('updated_post')}}</p>
	@endif
</div>



@stop