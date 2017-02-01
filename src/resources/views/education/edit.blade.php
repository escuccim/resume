@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Edit Education</h3>
                    </div>
                    <div class="panel-body">
                        @include('cv::errors.list')
                        <form method="POST" action="/education/{{$education->id}}" accept-charset="UTF-8" class="form-horizontal">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="PATCH">
                            @include('cv::education._form', ['submitButtonText' => trans('cv-lang::cv.update')])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection