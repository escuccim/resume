@extends('layouts.app')

@push('scripts')
	<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
@endpush

@section('content')
<div class="container">
	<form action="/cvadmin" method="post" class="form-horizontal">
		@include('cv::cv.form', ['submitButtonText' => trans('cv-lang::cv.update')])
	</form>
</div>
@endsection