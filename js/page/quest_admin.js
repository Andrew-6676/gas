$(document).ready(function(){

	$('.question_href').click(function() {
		//alert($(this).attr('href'));
		//return false;
		var item = $('.item.'+$(this).attr('href'));
		var caption = $(this).parent();
		// alert(item.css('display'));
		if (item.css('display')=='none') {
			item.show();
			caption.addClass('no_hide');
		} else {
			item.hide();
			caption.removeClass('no_hide');
		}
		return false;
	})
/*--------------------------------------------------------------------------------------*/

	// $('.save_quest').click(function(){
	// 	$.ajax({
	// 		url:'/page/quest',
	//         type: 'POST',
	// 	    data: array('save'=>array('id'=>$id)),
	// 	        'beforeSend' => 'js:function(){
	//         			if (!confirm("Сохранить вопрос #'.$id.'")) {
	// 	        			return false;
	// 	        		}
	// 	        }',
	// 	        'success'=>'js:function(data){
	// 	        		//alert("=>"+data+"<=");
	// 	        }',
	// 	        'error' => 'js:function(data){
	// 	        		alert("error save");
	// 	        }',
	// 	    ),
	//         array('class'=>'save_quest')
	//         );
	// 	})
	// })


})