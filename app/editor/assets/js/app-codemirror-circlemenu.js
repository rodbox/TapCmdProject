/*** Codemirror function ***/

	// editor = window.editor;

	// $.get("views/circle-menu.php",function(data){
	// 	$("body").append(data);
	// })


	/* Mouse menu */
	$(document).on("click ",'.circle-center a',function (){
		var mouseMenu = $('#circle-mouse');
		mouseMenu.removeClass('open');
	})



    $.toggleMouseMenu = function toggleMouseMenu(e){
		// var cursor    = $.editor.getCursor();
		var mouseMenu = $('#circle-mouse');
        if (!mouseMenu.hasClass('open')) {
            mouseMenu.css({
                left:e.clientX,
                top:e.clientY
            }).show().addClass('open');
        }
        else
            mouseMenu.hide().removeClass('open');
    }
	/* End Mouse menu */

$('.sui-editor').on("mousedown",function(e){
        if (e.button == 2) {
            $(document)[0].oncontextmenu = function() {
                return false;
            }
            $.toggleMouseMenu(e);
        }
    });

/*** FUNCTIONS ***/
	/* wrapp selection with content before and after */
	function wrappSelection(before,after,caret){

		var selection = $.editor.getSelection();
		var cursor = $.editor.getCursor();
		$.editor.replaceSelection(before+selection+after);
		$.editor.focus();

		/* setCursor after wrapped content */
		if(caret)
			cursor.ch = cursor.ch+caret;
		else if(selection=="")
			cursor.ch = cursor.ch+before.length;
		else
			cursor.ch = cursor.ch+before.length+after.length;
		$.editor.setCursor(cursor);
	}

	/*  */
	function rate(star,id){
		var star = "/**["+star+"]**/";
		var selection = $.editor.getSelection();
		$.editor.replaceSelection(star+selection);
	}
/*** END FUNCTIONS ***/




/*** EVENTS ***/
	$(document).on("click",".wrap",function (e){
		e.preventDefault();
		var t      = $(this);
		var before = t.data("before").replace("\\","");
		var after  = t.data("after").replace("\\","");
		var caret  = t.data("caret");
		wrappSelection(before,after,caret);
	})


	/* Execute une fonction de code mirror */
	/* Voir la liste sur : http://codemirror.net/doc/manual.html#api */
	$(document).on("click",".cm-func",function (e){
		e.preventDefault();
		var t   = $(this);
		var req = t.data("req");
		eval("$.editor."+req+"()");
	})

	/* request location */
	$(document).on("click",".btn-popup-req",function (e){
		e.preventDefault();
		var t         = $(this);
		var selection = $.editor.getSelection();

		var url       = t.attr("href");
		var req       = t.data("req");
		if(selection!="" && req){
			var req = req.replace("[selection]",selection);
			var url=url+req;
		}
		var popupID = (t.data('popup')==undefined)?'Popup':t.data('popup');

        var pop = window.open(url, popupID, 'scrollbars=1,resizable=1,height=560,width=770');

        if(pop.window.focus){pop.window.focus();}
	})

	/* alias */
	$(document).on("click",".alias",function (e){
		e.preventDefault();
		var t = $(this);
		$(t.attr("href")).trigger("click");
	})

	/* Mark text */
	$(document).on("click",".star",function (e){
		e.preventDefault();
		var t      = $(this);
		var cursor = $.editor.listSelections();

		var from   = cursor[0].head;
		var to     = cursor[0].anchor;

		// $.editor.addLineClass(from.line, "mark gutter","mark-gutter");
		$.editor.setGutterMarker(from.line, "mark-gutterID","mark-gutter");

		console.log($.editor.lineInfo(from.line));
	})


/*** END EVENTS ***/

	$(document).on("mousedown","#circle-mouse",function (e){
		e.preventDefault();
		var t = $(this);
		if (e.button == 2)
			$.toggleMouseMenu(e);

	})
