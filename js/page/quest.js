$(document).ready(function() {
	//alert('df');
	$('.question').click(function(){
		if ($(this).hasClass('open')) {
			$(this).removeClass('open');
			$(this).parent().find('.answer').hide(300);
		} else {
			$(this).addClass('open');
			$(this).parent().find('.answer').show(300);
		}
	})

})		// document.ready