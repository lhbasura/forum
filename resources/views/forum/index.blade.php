@extends('layouts/app')
@section('content')
    <div>

    </div>
    <div class="jumbotron">
        <div class="container">
            <h2>
                欢迎来到gini论坛
                <a class="btn btn-lg btn-primary float-right" href="{{url('/discussion/create')}}"
                   role="button">发布新的帖子</a>
            </h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12" role="main">
                @foreach($discussions as $discussion)
                    <?php $user = $discussion->user?>
                    <div class="media text-muted pt-4">
                        <img data-src="holder.js/64x64?theme=thumb&amp;bg=e83e8c&amp;fg=e83e8c&amp;size=1" alt="32x32"
                             class="mr-2 rounded"
                             src="{{$user->avatar}}"
                             data-holder-rendered="true" style="width: 64px; height: 64px;">
                        <div class="media-body pb-4 mb-0 big lh-125 border-bottom border-gray">
                            <div class="col-md-10 d-inline-block">
                                <a href="/discussion/{{$discussion->id}}"><strong>{{$discussion->title}}</strong></a>
                                <strong class="d-block  text-gray-dark">{{$user->name}}</strong>
                            </div>
                            <div class="d-inline-block col-md-1 text-center">
                                <a class="text-dark">{{count($discussion->comments)}}</a>
                                <div class="">回复</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@stop
