@extends('layouts.app')

@section('header')
	<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2>{{ $job->company }} - {{ $job->position }}</h2>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<p><strong>Dates:</strong> {{ date('Y-m-d', strtotime($job->startdate)) }} to {{ date('Y-m-d', strtotime($job->enddate)) }}

					<p><strong>Order:</strong> {{ $job->order }}

					<p><strong>Description:</strong><br />
					{!! $job->description !!}
				</div>
			</div>

			<div class="row">
				<div class="col-md-3 col-md-offset-5">
					<div class="btn-group">
						<a href="{{ action('\Escuccim\Resume\Http\Controllers\JobsController@edit', [$job->id]) }}" class="btn btn-primary">{!! trans('cv-lang::cv.editentry') !!}</a>
						<a href="{{ action('\Escuccim\Resume\Http\Controllers\JobsController@delete', [$job->id]) }}"  id="deleteBlog" class="btn btn-default">{!! trans('cv-lang::cv.deleteentry') !!}</a>
					</div>
				</div>
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