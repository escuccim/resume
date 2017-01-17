@extends('layouts.app')

@section('header')
	<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			@include('cv::cv.cv-detail')
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-3 col-md-offset-4">
			<div class="btn-group">
				<a href="{{ action('\Escuccim\Resume\Http\Controllers\JobsController@edit', [$job->id]) }}" class="btn btn-primary">Edit Row</a>
				<a href="{{ action('\Escuccim\Resume\Http\Controllers\JobsController@delete', [$job->id]) }}"  id="deleteBlog" class="btn btn-default">Delete Row</a>
			</div>
		</div>
	</div>	

	<script>
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$("#deleteBlog").click(function(e){
			e.preventDefault();
			var x = confirm("Are you sure you want to delete this?");
			if(x){
				$.ajax({
					url: '/cvadmin/{{ $job->id }}',
					type: 'delete',
					success: function(result){
						location.reload();
						},
					error: function(result){
						},
					complete: function(result){
						location.reload();
						},
				});
			}
		});
	</script>
</div>
@endsection