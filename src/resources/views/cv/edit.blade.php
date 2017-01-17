@extends('layouts.app')

@section('header')
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'#description' });</script>
@endsection

@section('content')
	@include('errors.list')
	
	{!! Form::model($job, ['method' => 'patch', 'class' => 'form-horizontal', 'action' => ['JobsController@update', $job->id]]) !!}
		@include('cv.form', ['submitButtonText' => 'Update Entry'])
	{!! Form::close() !!}

@endsection