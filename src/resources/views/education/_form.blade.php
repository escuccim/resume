<div class="form-group">
    <label for="school" class="control-label col-md-2">{{trans('cv-lang::cv.school')}}:</label>
    <div class="col-md-10">
        <input class="form-control" name="school" type="text" value="{{$education->school}}" id="school">
    </div>
</div>

<div class="form-group">
    <label for="location" class="control-label col-md-2">{{trans('cv-lang::cv.location')}}:</label>
    <div class="col-md-10">
        <input class="form-control" name="location" type="text" value="{{$education->location}}" id="location">
    </div>
</div>

<div class="form-group">
    <label for="degree" class="control-label col-md-2">{{trans('cv-lang::cv.degree')}}:</label>
    <div class="col-md-10">
        <input class="form-control" name="degree" type="text" value="{{$education->degree}}" id="degree">
    </div>
</div>

<div class="form-group">
    <label for="major" class="control-label col-md-2">{{trans('cv-lang::cv.major')}}:</label>
    <div class="col-md-10">
        <input class="form-control" name="major" type="text" value="{{$education->major}}" id="major">
    </div>
</div>

<div class="form-group">
    <label for="start_date" class="control-label col-md-2">{{trans('cv-lang::cv.start')}}</label>
    <div class="col-md-10">
        <input class="form-control" name="start_date" type="date" value="{{date('Y-m-d', strtotime($education->start_date))}}" id="start_date">
    </div>
</div>

<div class="form-group">
    <label for="end_date" class="control-label col-md-2">{{trans('cv-lang::cv.end')}}</label>
    <div class="col-md-10">
        <input class="form-control" name="end_date" type="date" value="{{date('Y-m-d', strtotime($education->end_date))}}" id="end_date">
    </div>
</div>

<div class="form-group">
    <label for="lang" class="control-label col-md-2">{{trans('cv-lang::cv.language')}}</label>
    <div class="col-md-10">
        <select class="form-control" id="lang" name="lang">
            @foreach(config('cv.langs') as $lang => $display)
                <option value="{{$lang}}" {{ $lang == $education->lang ? 'selected="selected"' : '' }}>{{$display}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group text-center">
    <button type="submit" class="btn btn-primary">{{ $submitButtonText }}</button>
</div>