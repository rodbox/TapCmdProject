$(document).ready(function(){

    $.kalt=function(){

      var keyList = {
        16  : "onMaj",
        17  : "onCtrl",
        18  : "onAlt",
        20  : "onMajlock",
        9   : "onTab",
        27  : "onEsc",
        32  : "onSpc",
        224 : "onCmd"
      }

      var keyEval = [16,17,18,20,9,27,32,224];

      $(document).keydown(function (event){
        var keyCode = event.keyCode;
        $('body').attr('data-code-'+keyCode,true);

        if($.inArray(keyCode,keyEval)>=0){
          $('body').attr('data-code-'+keyList[keyCode],true);
          $('body').addClass(keyList[keyCode]);
        }
      }).keyup(function (event){

        var keyCode = event.keyCode;
        $('body').removeAttr('data-code-'+keyCode);

        if($.inArray(keyCode,keyEval)>=0){
          $('body').attr('data-code-'+keyList[keyCode],false);
          $('body').removeClass(keyList[keyCode]);
        }
      })
    }


    $.kalte = function (keyEval){
      return $('body').hasClass(keyEval);
    }

    $.kalt();

    $.force = function (){
        return ($.kalte('onCmd') || ($.kalte('onAlt') && $.kalte('onMaj')) );
    }
    $.clear_force = function (){
      $('body').removeAttr('data-code-onCmd');
      $('body').removeClass('onCmd');

      $('body').removeAttr('data-code-onAlt');
      $('body').removeClass('onAlt');

      $('body').removeAttr('data-code-onMaj');
      $('body').removeClass('onMaj');
    }


    $.alt = function (){
        return ($.kalte('onAlt') );
    }
    $.clear_alt = function (){
      $('body').removeAttr('data-code-onAlt');
      $('body').removeClass('onAlt');
    }


    $(document).on({
        mousedown:function(e){
            $('body').attr('data-mousedown',true);
            $('body').addClass('onMouseDown');
        },
        mouseup:function(e){
            $('body').attr('data-mousedown',false);
            $('body').removeClass('onMouseDown');
        }
  });

  $.malt = function(){
    return ($('body').attr('data-mousedown'));
  }

})



