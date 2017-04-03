@extends('layouts.app')

@section('content')
    <ul>
    	@foreach ($news as $new)
    		<h1>{{$new->title}}</h1>
    		<li>{{$new->content.'...'}}</li>
    		<a href="news/{{$new->id}}">Read more.</a><br>
            @if (Auth::check())
                <a href="news/edit/{{$new->id}}">Edit.</a>
            @endif
    	@endforeach
    </ul>
@endsection