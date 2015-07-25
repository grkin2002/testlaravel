<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      {!! Html::link('/', '汇侨街坊', array('class'=>'navbar-brand')) !!}
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active">{!!Html::linkRoute('admin.board.{bid}.post.create','提意见', ['bid'=>2], array('class'=>'actived'))!!}</li>
        <li>{!!Html::linkRoute('NewsList', '汇新闻', ['bid'=>Cache::get('board_id_for_news')])!!}</li>
        <li>{!! Html::linkRoute('PostList', '八卦巷', ['bid'=>Cache::get('board_id_for_post')]) !!}</li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" autocomplete="off" placeholder="查找...">
          <span
          <button class="btn btn-primary" type="submit">搜索</button>
        </div>

      </form>
      <ul class="nav navbar-nav navbar-right">
            <h4>


        @if(Auth::check()&& Auth::user()->type==0 )

            <span class='badge'>管理员  {{  Auth::user()->name }}</span>
            &nbsp&nbsp
            {!! Html::link('admin/dashboard', '管理面板', array('class'=>'btn btn-primary')) !!}
            &nbsp&nbsp
            {!! Html::link('auth/logout', '离开', array('class'=>'btn btn-primary')) !!}

        @elseif(Auth::check())

            <span class='badge'>欢迎你  {{ Auth::user()->name }}</span>
            &nbsp&nbsp
            {!! Html::link('auth/logout', '离开', array('class'=>'btn btn-primary')) !!}

        @else

            {!! Html::link('auth/register', '注册', array('class'=>'btn btn-primary')) !!}
            &nbsp&nbsp
            {!! Html::link('auth/login', '登录', array('class'=>'btn btn-primary'))  !!}

        @endif
          </h4>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>