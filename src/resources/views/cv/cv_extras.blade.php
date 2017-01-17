
<div class="panel panel-default">
    <div class="panel-heading">
        <h4>{{ trans('cv-lang::cv.computerskills') }}</h4>
    </div>
    <div class="panel-body">
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading"><h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapse-program">
                            {{ trans('about.programminglanguagestitle') }}</a></h4>
                </div>
                <div class="panel-body panel-collapse collapse" id="collapse-program">
                    <p>{!! trans('about.programminglanguages') !!}
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapse-platform">
                            {{ trans('about.platforms') }}</a></h4>
                </div>
                <div class="panel-body panel-collapse collapse" id="collapse-platform">
                    <p>{!! trans('about.platformtext') !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4>{{ trans('cv-lang::cv.languages') }}</h4>
    </div>
    <div class="panel-body" id="collapse-languages">
        <p>{{ trans('about.english') }} - {{ trans('about.nativelanguage') }}
        <p>{{ trans('about.french') }} - {{ trans('about.bilingual') }}
    </div>
</div>