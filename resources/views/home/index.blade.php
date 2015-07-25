@extends('home.layout')

@section('content')
<br>

<div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
          <a class="thumbnail" href="board/8/post">
            <img  alt="100%x200" src="image/huiqiao3.jpg" style="height: 200px; width: 100%; display: block;">
            <div class="caption">
              <h3>Gossip 七嘴八舌</h3>
              <p>have a say to our property manager. no parking space, dog shit everywhere? 对社区管理有意见，踩到狗屎？请进。  </p>
            </div>
          </a>
        </div>
              <div class="col-sm-6 col-md-4">
          <a class="thumbnail" href="board/7/news">
           <img  alt="100%x200" src="image/huiqiao2.jpg" style="height: 200px; width: 100%; display: block;">
            <div class="caption">
              <h3>News 社区新闻</h3>
              <p>What is going on in the community,big discount in neigorhood grocery, 社区动态，优惠信息。 </p>
            </div>
          </a>
        </div>

</div>

@stop

