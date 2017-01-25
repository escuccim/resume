@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10">
                            <h3>{!! trans('cv-lang::cv.education') !!}</h3>
                        </div>
                        <div class="col-md-2 pull-right">
                            <a href="{{ url('/education/create') }}" class="btn btn-primary">{!! trans('cv-lang::cv.addeducation') !!}</a>
                        </div>
                    </div>

                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>{!! trans('cv-lang::cv.school') !!}</th>
                                <th>{!! trans('cv-lang::cv.location') !!}</th>
                                <th>{!! trans('cv-lang::cv.degree') !!}</th>
                                <th>{!! trans('cv-lang::cv.major') !!}</th>
                                <th>{!! trans('cv-lang::cv.date') !!}</th>
                                <th>Lang</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($educations as $education)
                                <tr>
                                    <td>{{ $education->school }}</td>
                                    <td>{{ $education->location }}</td>
                                    <td>{{ $education->degree }}</td>
                                    <td>{{ $education->major }}</td>
                                    <td>{{ $education->end_date }}</td>
                                    <td>{{ $education->lang }}</td>
                                    <td><a href="/education/{{ $education->id }}/edit" class="btn btn-sm btn-primary">{!! trans('cv-lang::cv.editentry') !!}</a></td>
                                    {!! Form::open(['url' => '/education/' . $education->id, 'method' => 'delete']) !!}
                                    <td><button type="submit" class="btn btn-sm btn-default">{!! trans('cv-lang::cv.deleteentry') !!}</button></td>
                                    {!! Form::close() !!}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection