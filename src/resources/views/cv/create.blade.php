@extends('layouts.app')

@section('header')
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'#description' });</script>
@endsection

@section('content')
	
	{!! Form::model($job = new \App\Job, ['url' => 'cvadmin/store', 'class' => 'form-horizontal']) !!}
		@include('cv.form', ['submitButtonText' => 'Add Entry'])
	{!! Form::close() !!}
@endsection