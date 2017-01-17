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
                        {!! Form::model($education, ['action' => ['\Escuccim\Resume\Http\Controllers\EducationController@update', $education->id], 'class' => 'form-horizontal', 'method' => 'patch']) !!}
                        @include('education._form', ['submitButtonText' => 'Edit Education'])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection