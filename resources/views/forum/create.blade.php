@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['url' => '/discussion', 'method' => 'post']) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
                        {!! Form::text('title', '', ['class' => 'form-control']) !!}
                    </div>
                <div class="form-group">
                    {!! Form::label('body', 'Body:', ['class' => 'control-label']) !!}
                    <div  id="test-editormd">
                        <textarea name="body" style="display:none;"></textarea>
                    </div>

                </div>


                @include('markdown::encode',['editors'=>['test-editormd']])

                {!! Form::submit('Submit', ['class' => 'float-right btn-info btn']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
