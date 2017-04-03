@extends('layouts.app')

@section('content')
	<h1>{{ $news->title }}</h1>
	<div class="input-field">
		<textarea id="ck_editor" name="message"><p>{{ $news->content }}</p></textarea>
		<!-- <label for="icon_prefix2">Message: </label> -->
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="{{ url('/') }}/../vendor/ckeditor/ckeditor.js"></script>
	<script>
		$(function() {
			CKEDITOR.replace('ck_editor', {
		    	language: 'en'
			});
		});
	</script>
@endsection