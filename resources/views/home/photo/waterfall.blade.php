@extends('home.layout')

@section('content')
<div class="grid">

    @foreach($photos as $photo)
    <div class="grid-item">{!!Html::image($photo->photo_url,$photo->title, array('width'=>'250px')) !!}</div>
    @endforeach


    <div class="pagination">
      {!! $photos->render() !!}
    </div>
</div>
@stop

@section('footer')
<script src="js/jquery.masonry.min.js"></script>
<script src="js/jquery.infinitescroll.min.js"></script>
<script>

  $(function(){

    var $container = $('.grid');

    $container.imagesLoaded(function(){
      $container.masonry({
        itemSelector: '.grid-item',
        columnWidth: 250,
        gutterWidth: 20,
        isAnimated:true,
        animationOptions:{
            duration:200
        }
      });
    });

    $container.infinitescroll({
      navSelector  : '.pagination',    // selector for the paged navigation
      nextSelector : '.pagination ul li a',  // selector for the NEXT link (to page 2)
      itemSelector : '.grid-item',     // selector for all items you'll retrieve
      loading: {
          finishedMsg: 'No more pages to load.',
          img: 'http://i.imgur.com/6RMhx.gif'
        }
      },
      // trigger Masonry as a callback
      function( newElements ) {
        // hide new items while they are loading
        var $newElems = $( newElements ).css({ opacity: 0 });
        // ensure that images load before adding to masonry layout
        $newElems.imagesLoaded(function(){
          // show elems now they're ready
          $newElems.animate({ opacity: 1 });
          $container.masonry( 'appended', $newElems, true );
        });
      }
    );

  });

</script>
@stop