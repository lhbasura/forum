@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! Form::model($discussion,['method' => 'patch','url' => '/discussion/'.$discussion->id]) !!}
                @csrf
                @include('forum.form')
                {!! Form::submit('Submit', ['class' => 'float-right btn-primary btn']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
