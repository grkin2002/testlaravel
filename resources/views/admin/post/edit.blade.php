@extends('home.layout')

@section('content')

<h1>Edit Your Post</h1>
<hr>


{!! Form::open(['route'=>['admin.board.{bid}.post.update','bid'=>$post->board_id,'post'=>$post], 'method'=>'PUT']) !!}

    <div class="form-group">
        {!!Form::label('post_title', 'Title:') !!}
        {!!Form::text('post_title', $post->post_title, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!!Form::label('content','Content:')!!}
        {!!Form::textarea('content', $post->content,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!!Form::submit('Change', ['class'=>'btn btn-primary form-control'] ) !!}
    </div>

{!! Form::close() !!}


@stop