$(document).ready(function(){
  $.sui.set('k','editor');

  $.getScript('assets/js/kalt/'+$.sui.get('k')+'.js',{}, function(){
    alert('jkl');
  });

  $(document).on("keydown keyup",function (e){
    $.shortcut[e.type](e);
    // $.shortcut['all'][e.type](e);

  });











})



