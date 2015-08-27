  <?php
  header("Last-Modified: ".gmdate( "D, d M Y H:i:s" )."GMT" );
  header("Cache-Control: no-cache, must-revalidate" );
  ?>

<!doctype html>
<html lang="zh-cn" >
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>汇侨业主投票站</title>
      <!-- css style file merge together -->
      {!! Html::style( elixir("css/all.css") )!!}
      <!-- {!! Html::style('build/css/flat-ui.css') !!} -->


      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
  </head>
  <body>
      <!-- header navbar -->
      @include('home.partial.nav')
      <!-- some patch message -->
      @yield('header')

      <div class="container">
          @yield('content')

      </div>

      <!-- footer  -->
      @include('home.partial.footer')

      <!-- javascript merge together -->
      {!! Html::script( elixir("js/all.js") ) !!}
      <!-- write your own javascript in the footer -->
      @yield('footer')
  </body>
</html>