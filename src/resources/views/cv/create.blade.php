@extends('layouts.app')

@section('header')
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'#description' });</script>
@endsection

@section('content')
<div class="container">
	{!! Form::model($job = new \Escuccim\Resume\Models\Job, ['url' => 'cvadmin', 'class' => 'form-horizontal']) !!}
		@include('cv::cv.form', ['submitButtonText' => 'Add Entry'])
	{!! Form::close() !!}
</div>
@endsection