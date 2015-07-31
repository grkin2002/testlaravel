@extends('home.layout')

@section('content')

<h1>Post Your Opinion</h1>
<hr>

{!! Form::open(['route'=>['admin.board.{bid}.post.store','bid'=>2]]) !!}
    <div class="form-group">
        {!!Form::label('post_title', 'Title:') !!}
        {!!Form::text('post_title', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!!Form::label('content','Content:')!!}
        {!!Form::textarea('content','Please type less than 250 words',['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!!Form::submit('Post', ['class'=>'btn btn-primary form-control'] ) !!}
    </div>

{!! Form::close() !!}

@stop