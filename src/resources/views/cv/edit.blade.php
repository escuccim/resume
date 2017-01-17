@extends('layouts.app')

@section('header')
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'#description' });</script>
@endsection

@section('content')
<div class="container">
	@include('cv::errors.list')
	
	{!! Form::model($job, ['method' => 'patch', 'class' => 'form-horizontal', 'action' => ['\Escuccim\Resume\Http\Controllers\JobsController@update', $job->id]]) !!}
		@include('cv::cv.form', ['submitButtonText' => 'Update Entry'])
	{!! Form::close() !!}
</div>
@endsection