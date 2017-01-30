@extends('layouts.app')

@push('scripts')
	<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
@endpush

@section('content')
<div class="container">
	{!! Form::model($job = new \Escuccim\Resume\Models\Job, ['url' => 'cvadmin', 'class' => 'form-horizontal']) !!}
		@include('cv::cv.form', ['submitButtonText' => trans('cv-lang::cv.update')])
	{!! Form::close() !!}
</div>
@endsection