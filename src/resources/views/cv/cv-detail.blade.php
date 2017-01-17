<h2>{{ $job->company }} - {{ $job->position }}</h2>
	
<p><strong>Dates:</strong> {{ date('Y-m-d', strtotime($job->startdate)) }} to {{ date('Y-m-d', strtotime($job->enddate)) }}
	
<p><strong>Order:</strong> {{ $job->order }}
	
<p><strong>Description:</strong><br />
{!! $job->description !!}