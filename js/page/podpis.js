$(document).ready(function(){
	//alert('podpis');

	var images = $('.content img');
	img_descr(images);

})


function img_descr(images) {
	images.each(function(i){
		if ($(this).attr('alt')!=undefined && $(this).attr('alt')!='') {
			//alert($(this).height());
			$(this).after('<div class="podpis">'+$(this).attr('alt')+'</div>');
			var div = $('.podpis').last();
			//alert($(div).text());
			$(div).width($(this).width()-2);
			$(div).offset({top:$(this).offset().top+$(this).height()-3, left:$(this).offset().left });
			if ($(div).height() > 20) {
				//alert($(div).height());
				$(this).css({'margin-bottom': 6+$(div).height()});
			}
		}
	})

}