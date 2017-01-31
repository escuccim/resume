@extends('layouts.app')

@push('scripts')
	<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
@endpush

@section('content')
<div class="container">
	@include('cv::errors.list')
	<form action="/cvadmin/{{$job->id}}" method="post" accept-charset="UTF-8" class="form-horizontal">
		{{ csrf_field() }}
		<input name="_method" type="hidden" value="PATCH">
		@include('cv::cv.form', ['submitButtonText' => trans('cv-lang::cv.update')])
	</form>
</div>
@endsection