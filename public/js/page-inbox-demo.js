(function(){
  'use strict';


  // Panel Tricky: keep body overflow = visible on panel expand
  if ($('.panel[data-expand="true"]').length) {
    document.body.style.overflow = '';
  }
  $('.panel').on( 'expand', function(){
    document.body.style.overflow = '';
  });

  // show hide review nav
  $(document).on( 'click', function(){
    $('.review-paper').removeClass('open');
  })
  .on( 'click', '#toggle-review-nav', function(e){
    e.stopPropagation();
    $('.review-paper').toggleClass('open');
  });

})(window);