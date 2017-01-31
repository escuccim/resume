<div class="form-group">
	<label for="company" class="control-label col-md-1">{!! trans('cv-lang::cv.company') !!}</label>
	<div class="col-md-11">
		<input class="form-control" size="100" name="company" type="text" id="company" value="{{$job->company}}">
	</div>
</div>

<div class="form-group">
	<label for="position" class="control-label col-md-1">{!! trans('cv-lang::cv.position') !!}</label>
	<div class="col-md-11">
		<input class="form-control" size="100" name="position" type="text" id="position" value="{{$job->position}}">
	</div>
</div>
	
<div class="form-group">
	<label for="order" class="control-label col-md-1">{!! trans('cv-lang::cv.order') !!}</label>
	<div class="col-md-11">
		<input class="form-control" name="order" type="text" id="order" value="{{$job->order}}">
	</div>
</div>


<div class="form-group">
	<label for="startdate" class="control-label col-md-1">{!! trans('cv-lang::cv.start') !!}</label>
	<div class="col-md-11">
		<input class="form-control" size="100" name="startdate" type="date" value="{{$job->startdate->format('Y-m-d')}}" id="startdate">
	</div>
</div>

<div class="form-group">
	<label for="enddate" class="control-label col-md-1">{!! trans('cv-lang::cv.end') !!}</label>
	<div class="col-md-11">
		<input class="form-control" size="100" name="enddate" type="date" value="{{$job->enddate->format('Y-m-d')}}" id="enddate">
	</div>
</div>

<div class="form-group">
	<label for="description" class="control-label col-md-1">{!! trans('cv-lang::cv.description') !!}</label>
	<div class="col-md-11">
		<textarea class="form-control" id="description" name="description" cols="50" rows="10">{{$job->description}}</textarea>
	</div>
</div>

<div class="form-group">
	<label for="lang" class="control-label col-md-1">{!! trans('cv-lang::cv.language') !!}</label>
	<div class="col-md-11">
		<select class="form-control" id="lang" name="lang">
			@foreach(config('cv.langs') as $key => $value)
				<option value="{{$key}}" {{ $key == $job->lang ? 'selected="SELECTED"' : '' }}>{{$value}}</option>
			@endforeach
		</select>
	</div>
</div>

<div class="form-group">
	<div class="col-md-2 col-md-offset-5">
		<button type="submit" class="btn btn-primary">{{$submitButtonText}}</button>
	</div>
</div>

<script>CKEDITOR.replace( 'description' );</script>
