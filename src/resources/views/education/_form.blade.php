<div class="form-group">
    {!! Form::label('school', trans('cv-lang::cv.school') . ':', ['class' => 'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::text('school', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('location', trans('cv-lang::cv.location') . ':', ['class' => 'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::text('location', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('degree', trans('cv-lang::cv.degree') . ':', ['class' => 'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::text('degree', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('major', trans('cv-lang::cv.major') . ':', ['class' => 'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::text('major', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('start_date', trans('cv-lang::cv.start'), ['class' => 'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::input('date', 'start_date', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('end_date', trans('cv-lang::cv.end'), ['class' => 'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::input('date', 'end_date', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('lang', trans('cv-lang::cv.language'), ['class' => 'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::select('lang', config('cv.langs'), null, ['class' => 'form-control', 'id' => 'lang']) !!}
    </div>
</div>

<div class="form-group text-center">
    <button type="submit" class="btn btn-primary">{{ $submitButtonText }}</button>
</div>