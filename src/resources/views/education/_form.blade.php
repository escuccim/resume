<div class="form-group">
    {!! Form::label('school', 'School:', ['class' => 'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::text('school', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('location', 'Location:', ['class' => 'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::text('location', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('degree', 'Degree:', ['class' => 'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::text('degree', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('major', 'Major:', ['class' => 'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::text('major', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('start_date', 'Start Date:', ['class' => 'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::input('date', 'start_date', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('end_date', 'End Date:', ['class' => 'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::input('date', 'end_date', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('lang', 'Language:', ['class' => 'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::select('lang', config('cv.langs'), null, ['class' => 'form-control', 'id' => 'lang']) !!}
    </div>
</div>

<div class="form-group text-center">
    <button type="submit" class="btn btn-primary">{{ $submitButtonText }}</button>
</div>