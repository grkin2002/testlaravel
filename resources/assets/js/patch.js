
$('.js-agree').click(function (event) {
          event.preventDefault();

          if (!confirm('Are you sure you want to agree(赞成) this post?')) {
            return;
          }

          //刷新所有的badage
          $(this).siblings().children('span').text("");

          //找到第一个child
          var span = $(this).children('span:first-child');
          // var span = $(this).children().first();

          $.ajax({
            type:'GET',
            dataType:'text',
            url:$(this).attr('href'),
            success:function(results) {
                span.text(results);
            }
          });
});

$('.js-oppose').click(function (event) {
          event.preventDefault();

          if (!confirm('Are you sure you want to oppose(反对) this post?')) {
            return;
          }

          //刷新所有的badage
          $(this).siblings().children('span').text("");

          //找到第一个child
          var span = $(this).children('span:first-child');
          // var span = $(this).children().first();

          $.ajax({
            type:'GET',
            dataType:'text',
            url:$(this).attr('href'),
            success:function(results) {
                span.text(results);
            }
          });
});

$('.js-neutral').click(function (event) {
          event.preventDefault();

          if (!confirm('Are you sure you want to neutral(中立) this post?')) {
            return;
          }

          //刷新所有的badage
          $(this).siblings().children('span').text("");

          //找到第一个child
          var span = $(this).children('span:first-child');
          // var span = $(this).children().first();

          $.ajax({
            type:'GET',
            dataType:'text',
            url:$(this).attr('href'),
            success:function(results) {
                span.text(results);
            }
          });
});