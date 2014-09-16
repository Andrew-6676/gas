$(document).ready(function(){
	//alert('podpis');
		// получаем все картинки из контента
	var images = $('.content img');
	img_descr(images);

})

	// функуия добавляет под картинкой подпись, текст берётся из тега alt
function img_descr(images) {
	images.each(function(i){
			// если тег не пустой, то добавляем подпись
		if ($(this).attr('alt')!=undefined && $(this).attr('alt')!='') {
			//alert($(this).height());
				// вставляем div с подписью после картинки
			$(this).after('<div class="podpis">'+$(this).attr('alt')+'</div>');
				// получаем только что вставленный div
			var div = $('.podpis').last();
			//alert($(div).text());
				// задаём ширину
			$(div).width($(this).width()-2);
				// задаём положение на странице
			$(div).offset({top:$(this).offset().top+$(this).height()+1, left:$(this).offset().left });
				// если div содержит больше одной строки - увеличиваем margin-bottom для картинки
			if ($(div).height() > 20) {
				//alert($(div).height());
				$(this).css({'margin-bottom': 6+$(div).height()});
			}
		}
	})

}