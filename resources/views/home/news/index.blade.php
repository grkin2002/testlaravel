@extends('home.layout')

@section('content')
    @foreach($newses as $news)
        <div class="bs-callout bs-callout-danger">
            <div class="row">
               {!! Html::linkRoute('PostShow', str_limit($news->post_title, $limit=200, $end=''),
                       ['bid'=>$news->board_id, 'pid'=>$news->id], ['class'=>'post-title']) !!}
               <div class="post-content">{{ str_limit($news->content, $limit=500, $end='...next') }}</div>
            </div>

        </div>
        &nbsp
    @endforeach

    <div class="pagination pagination-plain pull-right">
        {!! $newses->render() !!}

    </div>
@stop

