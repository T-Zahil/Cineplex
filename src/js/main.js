$(".lazy").lazyload({
    effect : "fadeIn"
});

function displayScore(){
  $('.radial-score').each(function(i){
      var el = $(this);
      el.append('<span></span>');
      var scoreString = el.text().split('/');
  	  $(this).data('numerator',scoreString[0]);
      $(this).data('denominator',scoreString[1]);
      var dur = $(this).data('duration');
      el.text('');
      el.append('<span>'+0+'</span>')
      var score = ( 1 - ((scoreString[0] * 1) / (scoreString[1] * 1)) ) * 720;
      $(this).append('<svg version="1.1" class="valuescore'+i+'" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 250 250" enable-background="new 0 0 250 250" xml:space="preserve"><style>.inner'+i+' {stroke-dashoffset: 716;-webkit-animation:dash'+i+' '+dur+'s linear forwards paused;}@-webkit-keyframes dash'+i+' {from { stroke-dashoffset: 716;}to {stroke-dashoffset: '+score+';}}</style><circle class="outer outer'+i+'" cx="125" cy="125" r="115"/><circle class="inner inner'+i+'" cx="125" cy="125" r="115"/></svg>');
  });
  function runRadials(){
      $('.radial-score').each(function(i){
        var numerator = $(this).data('numerator');
        var denominator = $(this).data('denominator');
        var dur = $(this).data('duration');
        var spanner = $(this).children('span').first();
        dur = ( dur * 1000 ) / denominator;
        function incrementText(){
          var cText = spanner.text()*1;
          if( cText >= ( numerator - 1) ){
            clearInterval(scoreTime);
          }
          c = cText + 1;
          spanner.text(c);
        };
        var scoreTime = setInterval(function(){incrementText()},dur);
        $(this).children('svg').children('circle.inner'+i+'').css({
          '-webkit-animation-play-state':'running',
          '-moz-animation-play-state':'running',
          'animation-play-state':'running'
        });
      });
  };
  $(window).scroll(function() {
      var height = $(window).scrollTop();
      if(height  > 10 && $('.content-wrap').hasClass('hasOpenRadials') ) {
          $('.content-wrap').removeClass('hasOpenRadials')
          runRadials();
      }
  });
  runRadials();
}

$('.movies').on('click','.moviePoster',function(){
  console.log("coucou");
    $('.moviePoster .movie_selection').remove();
    $('.focus-movie').removeClass('hide');
    $(this).prepend("<div class=\"movie_selection\"><div class=\"triangle\"></div></div>");
})

$("img.lazy").lazyload({
    effect : "fadeIn"
});

$('.nav-rooms h4').on('click',function(){
  $('.focus').removeClass('focus');
  $(this).addClass('focus');

  if($(this).hasClass('create')){
    $('.list-rooms').css({'display': 'none'});
    $('.create-rooms').css({'display': 'block'});
  }
  else{
    $('.list-rooms').css({'display': 'block'});
    $('.create-rooms').css({'display': 'none'});
  }
})

