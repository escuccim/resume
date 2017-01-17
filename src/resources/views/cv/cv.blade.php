@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>{{ trans('cv.professionalexperience') }}</h4>
			</div>
			<div class="panel-body">
				<div class="panel-group" id="experience">
					@foreach($jobs as $job)
						<div class="panel panel-default">
							<div class="panel-heading">
								<h5 class="panel-title">
								<a data-toggle="collapse" data-parent="#experience" href="#collapse{{ $job->id }}">
									{{ $job->company }} - {{ $job->position }}</a>
								</h4>
							</div>
							
							<div id="collapse{{ $job->id }}" class="panel-collapse collapse">
								<div class="panel-body">
									<p><strong>{{ date('m/Y', strtotime($job->startdate)) }} - {{ date('m/Y', strtotime($job->enddate)) }}</strong>
									
									{!! $job->description !!}
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>		

		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>{{ trans('cv.education') }}</h4>
			</div>
			<div class="panel-body">
				<div class="panel-group" id="education">
					@foreach($educations as $education)
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#education"
										href="#education{{$education->id}}">{{$education->school}} - {{ $education->degree }}</a>
								</h4>
							</div>
							<div id="education{{$education->id}}" class="panel-collapse collapse">
								<div class="panel-body">
									<p>{{ $education->location }}
									<p>{!! $education->major !!}, {{ date('m/Y', strtotime($education->end_date)) }}

								</div>
							</div>
						</div>
					@endforeach
				</div>	
			</div>
		</div>
		@if(View::exists('cv.cv_extras'))
			@include('cv.cv_extras')
		@endif
	</div>
</div>
@endsection
