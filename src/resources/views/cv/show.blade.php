@extends('layouts.app')

@section('header')
	<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">
			@include('cv.cv-detail')
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-3 col-md-offset-4">
			<div class="btn-group">
				<a href="{{ action('JobsController@edit', [$job->id]) }}" class="btn btn-primary">Edit Row</a>
				<a href="{{ action('JobsController@delete', [$job->id]) }}"  id="deleteBlog" class="btn btn-default">Delete Row</a>
			</div>
		</div>
	</div>	
@endsection

@section('footer')
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
					//alert(result[1]);
					//location.reload();
					},
				error: function(result){
					//alert(result);
					},
				complete: function(result){
					location.reload();
					},
			});
		}
	});
</script>
@endsection