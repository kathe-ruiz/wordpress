jQuery.noConflict();
jQuery(document).ready(function($){
  $('.um-account-nav a').click(function(){
    if ($(this).hasClass('current')) {
      $(this).parent().removeClass('open');
    }else{
      $(this).parent().toggleClass('open');
      $(this).parent().siblings().removeClass('open');
    }
  });
  $('#dow').click(function(){
    location.href = location.href;
  });
});