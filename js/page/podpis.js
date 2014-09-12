$(document).ready(function(){
	//alert('podpis');

	var images = $('.content img');

	images.each(function(i){
		if ($(this).attr('alt')!=undefined) {
			//alert($(this).height());
			$(this).after('<div class="podpis">'+$(this).attr('alt')+'</div>');
			var div = $('.podpis').last();
			//alert($(div).text());
			$(div).width($(this).width()-2);
			$(div).offset({top:$(this).offset().top+$(this).height()-3, left:$(this).offset().left });
		}
	})
})