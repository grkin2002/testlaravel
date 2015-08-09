@extends('home.layout')

@section('content')
<div class="wrap">
    <div class="row post-topheader">
        <p>{!! Html::linkRoute('PostList', 'Post', ['bid'=>Cache::get('board_id_for_post')]) !!}
        >Post Detail
        </p>
        <a href="{{ Request::url() }}" class="post-title">  <h4>{{ $post->post_title }}</h4></a>

        <p>
            <span class="glyphicon glyphicon-user"></span> posted by {{ $post->user->name}} &nbsp&nbsp
            <span class="glyphicon glyphicon-time"></span>&nbsp{{ $post->created_at->diffForHumans() }}
        </p>
    </div>
    <br>
    <div class="row post-content">
        <p>{{ $post->content}}</p>
    </div>
    <br>
    <hr>

    <div class="row">
        @if(Auth::check())
        <a href="/vote/agree/{{ $post->id}}/{{ Auth::user()->id}}" class="btn btn-primary js-agree">agree <span class="badge">{!! $post->agree_amount !!}</span></a>&nbsp&nbsp
        <a href="/vote/oppose/{{ $post->id}}/{{ Auth::user()->id}}" class="btn btn-primary js-oppose">oppose <span class="badge">{!! $post->oppose_amount !!}</span></a>&nbsp&nbsp
        <a href="/vote/neutral/{{ $post->id}}/{{ Auth::user()->id}}" class="btn btn-primary js-neutral">neutral <span class="badge">{!! $post->neutral_amount !!}</span></a>
        @endif
        @if(Auth::check() && $post->user_id == Auth::user()->id)

            <span class="pull-right">
                {!! Form::open(['route'=>['admin.board.{bid}.post.destroy','bid'=>$post->board_id, 'pid'=>$post->id], 'method'=>'DELETE']) !!}
                        {!! Html::linkRoute('admin.board.{bid}.post.edit', '..Edit...',
                                ['bid'=>$post->board_id, 'pid'=>$post->id], ['class'=>'btn btn-info ']) !!} &nbsp&nbsp
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                {!! Form::close() !!}
            </span>
        @endif
    </div>



</div>
@endsection
