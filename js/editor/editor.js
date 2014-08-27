$(document).ready(function() {
		// перносим данные из CKEditor в textarea, из которого потом текст попадёт в БД
	$('#save_btn').click(function(){
		//alert('1');
		//console.log('save');
		CKEupdate();
	})
})


$(window).on('beforeunload', function() {
//	function CKupdate() {
    return 'Все изменения сохранены? Можно покинуть сраницу?';
});

function CKEupdate() {
	//alert('2');
	//console.log('ck_upd');
  	for ( instance in CKEDITOR.instances )
    	CKEDITOR.instances[instance].updateElement();
}

