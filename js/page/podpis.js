jQuery(document).ready(function(){
	// alert('podpis');
		// получаем все картинки из контента
	var images = jQuery('.content img');
	img_descr(images);

})

	// функуия добавляет под картинкой подпись, текст берётся из тега alt
function img_descr(images) {
	images.each(function(i){
			// если тег не пустой, то добавляем подпись

		if (jQuery(this).attr('alt')!=undefined && jQuery(this).attr('alt')!='') {
				// 1. Оборачиваем в <div class='img_wr'> картинку
			jQuery(this).wrap('<div class="img_wr"></div>');
				// 2. получаем обёртку
			var div_wr = jQuery('.img_wr').last();
				// 3. выравниваем обёртку также как и картинку
			div_wr.css('float', jQuery(this).css('float'));
				// 4. Задаём ширину обёртке c учётом отступов картинки
			// jQuery(div_wr).width(jQuery(this).outerWidth(true));
				// 5. Задаём высоту обёртке
			// jQuery(div_wr).height(jQuery(this).height()+30);

				//  6.вставляем div с подписью после картинки
			jQuery(this).after('<div class="podpis">'+jQuery(this).attr('alt')+'</div>');
				// получаем только что вставленный div
			var div = jQuery('.podpis').last();
				// задаём ширину
			jQuery(div).width(jQuery(this).outerWidth()-2);
				// задаём положение на странице
			jQuery(div).offset({top:jQuery(this).offset().top+jQuery(this).outerHeight()+1, left:jQuery(this).offset().left });
				// если div содержит больше одной строки - увеличиваем margin-bottom для картинки
			if (jQuery(div).height() > 20) {
				//alert(jQuery(div).height());
				jQuery(this).css({'margin-bottom': 6+jQuery(div).height()});
			} else {
				jQuery(this).css({'margin-bottom': 6+jQuery(div).height()});
			}
		}
	})

}


// width: 202px;
// position: relative;
// height: 185px;
// border: 1px solid red;
// float: left;