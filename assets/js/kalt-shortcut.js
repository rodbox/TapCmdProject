$(document).ready(function(){
  $.sui.set('k',$('body').attr('data-sui-k'));

  $.getScript('assets/js/kalt/'+$.sui.get('k')+'.js');

  $(document).on("keydown keyup",function (e){
    $.shortcut[e.type](e);
    // $.shortcut['all'][e.type](e);
    var t = $(this);
  });











})



