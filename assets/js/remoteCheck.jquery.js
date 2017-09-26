(function($) {
	var loadingImage  = '<img src="assets/img/loading.gif" alt="loading" />';
	$.fn.remoteCheck = function(options) {
		var defaults = {
			min: 2,
			event: 'keyup'
		};
		var opt = $.extend(defaults, options);
		var obj = jQuery(this);
		jQuery(obj)[opt.event](function() {
			input = jQuery(this).val();
			opt.onTyping(input);
			if (input.length >= opt.min) {
				idcard = jQuery(obj).attr('name');
				$.ajax({
					url:opt.url,
					data: ({idcard:input}),
					dataType: "json",
					beforeSend: function() {
						$("#waitcheck").html(loadingImage);
					},
					success: function(str){
						$("#waitcheck").html("");
						switch (str.status) {
						case 'success':
							opt.onTrue(str);
						break;
						case 'error':
							opt.onLess(str);
						break;
						default:
							alert('Returning data must be JSON format');
						}
					}
				});			
			}else{
				opt.onLess(opt.min);
			}
		});
	}
})(jQuery);