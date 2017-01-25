<div class="form-group">
	{!! Form::label('company', trans('cv-lang::cv.company'), ['class' => 'control-label col-md-1']) !!}
	<div class="col-md-11">
		{!! Form::text('company', null, ['class' => 'form-control', 'size' => 100]) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('position', trans('cv-lang::cv.position'), ['class' => 'control-label col-md-1']) !!}
	<div class="col-md-11">
		{!! Form::text('position', null, ['class' => 'form-control', 'size' => 100]) !!}
	</div>
</div>
	
<div class="form-group">
	{!! Form::label('order', trans('cv-lang::cv.order'), ['class' => 'control-label col-md-1']) !!}
	<div class="col-md-11">
		{!! Form::text('order', null, ['class' => 'form-control', 'size' => 5]) !!}
	</div>
</div>


<div class="form-group">
	{!! Form::label('startdate', trans('cv-lang::cv.start'), ['class' => 'control-label col-md-1']) !!}
	<div class="col-md-11">
		{!! Form::input('date', 'startdate', $job->startdate->format('Y-m-d'), ['class' => 'form-control', 'size' => 100]) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('enddate', trans('cv-lang::cv.end'), ['class' => 'control-label col-md-1']) !!}
	<div class="col-md-11">
		{!! Form::input('date', 'enddate', $job->enddate->format('Y-m-d'), ['class' => 'form-control', 'size' => 100]) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('description', trans('cv-lang::cv.description'), ['class' => 'control-label col-md-1']) !!}
	<div class="col-md-11">
		{!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description']) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('lang', trans('cv-lang::cv.language'), ['class' => 'control-label col-md-1']) !!}
	<div class="col-md-11">
		{!! Form::select('lang', config('cv.langs'), null, ['class' => 'form-control', 'id' => 'lang']) !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-2 col-md-offset-5">
		{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
	</div>
</div>

<script>CKEDITOR.replace( 'description' );</script>
