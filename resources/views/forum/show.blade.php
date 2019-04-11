@extends('layouts.app')
<!--如果在页面其他位置引入过jquery，此处引用可以删除-->
<script src="{{asset('vendor/markdown/js/jquery.min.js')}}"></script>

<link rel="stylesheet" href="{{asset('vendor/markdown/css/editormd.min.css')}}" />
<script src="{{asset('vendor/markdown/js/editormd.min.js')}}"></script>
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
                    <a class="btn btn-lg btn-primary float-right" href="/discussion/{{$discussion->id}}/edit"
                       role="button">修改帖子</a>
                </h2>
            @endif
        </div>
    </div>

    <div class="container">
        <div class="row">
            <article-component :init-value="{{'{user_id:'.Auth::user()->id.',discussion_id:'.$discussion->id.',_token:"'.csrf_token().'"}'}}" inline-template>
                <div class="col-md-12" role="main">
                    <article class="markdown-body">
                        {!! $html !!}
                    </article>
                    <hr>
                    <h5>评论：</h5>
                    @foreach($discussion->comments as $comment)
                        <div class="media pt-4">
                            <div class="media-left">
                                <a href="#">
                                    <img class="mr-2 rounded" src="{{$comment->user->avatar}}"
                                         style="width: 48px;height: 48px;">
                                </a>
                            </div>
                            <div class="media-body">
                                <h6 class="media-heading">{{$comment->user->name}}</h6>
                                {{$comment->body}}
                            </div>
                        </div>
                    @endforeach

                    <div class="media pt-4" v-for="comment in comments">
                        <div class="media-left">
                            <a href="#">
                                <img class="mr-2 rounded" src="{{Auth::user()->avatar}}"
                                     style="width: 48px;height: 48px;">
                            </a>
                        </div>
                        <div class="media-body">
                            <h6 class="media-heading">{{Auth::user()->name}}</h6>
                            @{{comment.body}}
                        </div>
                    </div>

                    <div class="pt-4">
                        @if(Auth::check())
                            {!! Form::open(['url' => '/comment', 'method' => 'post','class'=>'pt-4','@submit'=>'onSubmitForm']) !!}
                            @csrf
                            {!! Form::hidden('discussion_id',$discussion->id ) !!}
                            <div class="form-group">
                                {!! Form::textarea('body',null, ['class' => 'form-control','v-model'=>'newComment.body']) !!}

                            </div>
                            {!! Form::submit('发表评论', ['class' => 'btn btn-primary float-right']) !!}
                            {!! Form::close() !!}
                        @else
                            <a href="{{route('login')}}" class=" form-control btn btn-success">登录参与评论</a>
                        @endif
                    </div>
                </div>
            </article-component>
        </div>

    </div>



@stop
