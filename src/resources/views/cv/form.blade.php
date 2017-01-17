<div class="form-group">
	{!! Form::label('company', 'Company:', ['class' => 'control-label col-md-1']) !!}
	<div class="col-md-11">
		{!! Form::text('company', null, ['class' => 'form-control', 'size' => 100]) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('position', 'Position:', ['class' => 'control-label col-md-1']) !!}
	<div class="col-md-11">
		{!! Form::text('position', null, ['class' => 'form-control', 'size' => 100]) !!}
	</div>
</div>
	
<div class="form-group">
	{!! Form::label('order', 'Order:', ['class' => 'control-label col-md-1']) !!}
	<div class="col-md-11">
		{!! Form::text('order', null, ['class' => 'form-control', 'size' => 5]) !!}
	</div>
</div>


<div class="form-group">
	{!! Form::label('startdate', 'Start:', ['class' => 'control-label col-md-1']) !!}
	<div class="col-md-11">
		{!! Form::input('date', 'startdate', $job->startdate->format('Y-m-d'), ['class' => 'form-control', 'size' => 100]) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('enddate', 'End:', ['class' => 'control-label col-md-1']) !!}
	<div class="col-md-11">
		{!! Form::input('date', 'enddate', $job->enddate->format('Y-m-d'), ['class' => 'form-control', 'size' => 100]) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('description', 'Description:', ['class' => 'control-label col-md-1']) !!}
	<div class="col-md-11">
		{!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description']) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('lang', 'Language:', ['class' => 'control-label col-md-1']) !!}
	<div class="col-md-11">
		{!! Form::select('lang', ['en' => 'en', 'fr' => 'fr'], null, ['class' => 'form-control', 'id' => 'lang']) !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-2 col-md-offset-5">
		{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
	</div>
</div>

