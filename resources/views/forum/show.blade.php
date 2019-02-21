@extends('layouts.app')
@section('content')
    <div class="jumbotron">
        <div class="container">
            <div class="media">
                <div class="media-left">
                    <a href="#">
                        <img class="mr-2 rounded" src="{{$discussion->user->avatar}}" style="width: 64px;height: 64px;">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">{{$discussion->title}}</h4>
                    {{$discussion->user->name}}
                </div>
            </div>
            @if(Auth::check()&&Auth::user()->id==$discussion->user_id)
            <h2>
                <a class="btn btn-lg btn-primary float-right" href="/discussion/{{$discussion->id}}/edit" role="button">修改帖子</a>
            </h2>
            @endif
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12" role="main">
                <div class="blog-post">
                    {!! $html !!}

                </div>
                <hr>
                <h5>评论：</h5>
                @foreach($discussion->comments as $comment)
                <div class="media pt-4">
                    <div class="media-left">
                        <a href="#">
                            <img class="mr-2 rounded" src="{{$comment->user->avatar}}" style="width: 48px;height: 48px;">
                        </a>
                    </div>
                    <div class="media-body">
                        <h6 class="media-heading">{{$comment->user->name}}</h6>
                        {{$comment->body}}
                    </div>
                </div>
                @endforeach
                <div class="pt-4">
                @if(Auth::check())
                {!! Form::open(['url' => '/comment', 'method' => 'post','class'=>'pt-4']) !!}
                @csrf
                {!! Form::hidden('discussion_id',$discussion->id ) !!}
                <div class="form-group">
                    {!! Form::textarea('body',null, ['class' => 'form-control']) !!}

                </div>
                {!! Form::submit('发表评论', ['class' => 'btn btn-primary float-right']) !!}
                {!! Form::close() !!}
                    @else
                    <a href="{{route('login')}}" class=" form-control btn btn-success">登录参与评论</a>
                 @endif
                </div>
            </div>
        </div>
    </div>

@stop
