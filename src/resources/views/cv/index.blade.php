@extends('layouts.app')

@push('scripts')
	<style>
		#sortable { list-style-type: none; margin: 0; padding: 0; width: 100%; }
		.ui-state-highlight { height: 1.5em; line-height: 1.2em; }
	</style>

	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<script>
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$( function() {
		$( "#sortable" ).sortable({
			placeholder: "ui-state-highlight",
			update: function(event, ui){
				var data = $(this).sortable('serialize');

				$.ajax({
					data: data,
					type: 'POST',
					url: '/cvadmin/order',
				});
			}
		});
		$( "#sortable" ).disableSelection();
	} );
	</script>
@endpush

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading gray">
					<div class="row">
						<div class="col-md-7">
							<h3>{!! trans('cv-lang::cv.professionalexperience') !!}</h3>
						</div>
						<div class="col-md-3">
							<form action="/cvadmin" method="get" class="form-horizontal" id="langselect">
								{{ csrf_field() }}
								<div class="form-group">
									<label for="lang" class="control-label col-md-2">Lang:</label>
									<div class="col-md-4">
										<select name="lang" class="form-control" onChange="langselect.submit();">
											<option value="all" @if($lang == 'all') selected @endif>all
											<option value="en" @if($lang == 'en') selected @endif>en
											<option value="fr" @if($lang == 'fr') selected @endif>fr
										</select>
									</div>
								</div>
							</form>
						</div>
						<div class="col-md-2">
							<a href="{{ action('\Escuccim\Resume\Http\Controllers\JobsController@create') }}" class="btn btn-primary btn-sm">{!! trans('cv-lang::cv.addentry') !!}</a>
						</div>
					</div>
				</div>

				<div class="panel-body">
					<ul id="sortable" class="list-group">
						@foreach($jobs as $job)
							<li class="list-group-item ui-state-default" id="item-{{ $job->id }}">
							<div class="row">
								<div class="col-md-11">
									<a href="{{ action('\Escuccim\Resume\Http\Controllers\JobsController@show', [$job->id]) }}">{{ $job->company }} - {{ $job->position }}</a>
								</div>
								<div class="col-md-1">
									{{ $job->lang }}
								</div>
							</div>
							</li>

						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection