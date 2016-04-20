$(document).ready(function(){
  $.sui.set('k','editor');

  $.getScript('assets/js/kalt/'+$.sui.get('k')+'.js');

  $(document).on("keydown keyup",function (e){
    $.shortcut[e.type](e);
    // $.shortcut['all'][e.type](e);
    var t = $(this);
    console.log(t);
  });











})



