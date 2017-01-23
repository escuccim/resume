@extends('layouts.app')

@section('header')
	<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
@endsection

@section('content')
<div class="container">
	{!! Form::model($job = new \Escuccim\Resume\Models\Job, ['url' => 'cvadmin', 'class' => 'form-horizontal']) !!}
		@include('cv::cv.form', ['submitButtonText' => 'Add Entry'])
	{!! Form::close() !!}
</div>
@endsection