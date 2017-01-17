@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Add Education</h3>
                </div>
                <div class="panel-body">
                    @include('cv::errors.list')
                    {!! Form::model($education, ['url' => '/education', 'class' => 'form-horizontal']) !!}
                    @include('education._form', ['submitButtonText' => 'Add Education'])
                    {!! Form::close() !!}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection