$(document).ready(function($) {
	/**
	 * Context type
	 *
	 * A : accessibility: accessibilité true/false
	 * C : colors		: css/vars.less
	 * D : device 		: à définir ...
	 * H : helper 		: bool
	 * S : size 		: css/vars.less
	 * R : role			: par la liste des roles definit par le projet
	 * K : Keyboard		: js/init-shortcut.js
	 *
	 * La liste de contextes propre à chaques types est à définir en fonction des besoins de chaque type
	 */

	$.context = {
		get	: function (key){
			return $('html').attr('data-context-'+key);
		},
		set	: function (key, value){

			var urlSession = './app/app/exec/context.php';

			var data       = {
				key : key,
				value: value
			}
			// data['context'][key] = value;

			$.get(urlSession, data);

			return $('html').attr('data-context-'+key,value);
		},
		is	: function (key, value){
			return ($('html').attr('data-context-'+key)==value);
		}
	}

	$.setIframe = function (url){
		$.context.set('n','iframe');
		$('#iframe').attr('src',url);
	}

	$.setDefault = function (){
		$.context.set('n','default');
	}
	$(document).on("click",".btn-close-context",function (e){
		e.preventDefault();
		var t = $(this);
		$.setDefault();
	})

	$(document).on("click", ".btn-context", function (e){
		e.preventDefault();
		var t = $(this);
		t.toggleClass('active');
		$.context.set(t.attr('data-k'),t.hasClass('active'));

		if (t.data('cb'))
            $.cb['app'][t.data('cb')](t, e);

	});


});
