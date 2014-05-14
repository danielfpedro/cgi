$(function(){
	$('td#td-quick-action').hover(
		function() {
			$(this).find('div a').stop().fadeIn();
		}, function() {
			$(this).find('div a').stop().fadeOut();
		}
	);

	$('a#open-modal').nicemodal();
});