@extends('home.layout')

@section('content')
    @foreach($posts as $post)
        <div class="bs-callout bs-callout-danger">
            <div class="row">
                {!! Html::linkRoute('PostShow', str_limit($post->post_title, $limit=100, $end='...'),
                       ['bid'=>$post->board_id, 'pid'=>$post->id], ['class'=>'post-title']) !!}
                <span class="glyphicon glyphicon-time"></span>&nbsp{{ $post->created_at->diffForHumans() }}

            </div>
            <div class="row list-item">
              <span class="glyphicon glyphicon-thumbs-up"></span> agree {{$post->agree_amount}} &nbsp&nbsp
              <span class="glyphicon glyphicon-thumbs-down"></span> oppose {{$post->oppose_amount}} &nbsp&nbsp
              <span class="glyphicon glyphicon-leaf"></span> neutral {{$post->neutral_amount}} &nbsp&nbsp
              <span class="glyphicon glyphicon-stats"></span> view {{$post->view_amount}} &nbsp&nbsp
              <span class="glyphicon glyphicon-user"></span> posted by {{ $post->user->name}} &nbsp&nbsp
              @if(Auth::check() && $post->user_id == Auth::user()->id)
                  <span class="glyphicon glyphicon-edit"></span>
                  {!! Html::linkRoute('admin.board.{bid}.post.edit', '..change..', ['bid'=>$post->board_id, 'pid'=>$post->id], ['class'=>'bg-info']) !!}
              @endif
          </div>
        </div>
        &nbsp
    @endforeach
    <br><br>
    <div class="pagination pagination-plain pull-right">
      {!! $posts->render() !!}
    </div>
@stop

