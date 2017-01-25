@extends('layouts.app')

@section('header')
	<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
@endsection

@section('content')
<div class="container">
	@include('cv::errors.list')
	
	{!! Form::model($job, ['method' => 'patch', 'class' => 'form-horizontal', 'action' => ['\Escuccim\Resume\Http\Controllers\JobsController@update', $job->id]]) !!}
		@include('cv::cv.form', ['submitButtonText' => trans('cv-lang::cv.update')])
	{!! Form::close() !!}
</div>
@endsection