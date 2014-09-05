var _modified = false;
$(document).ready(function() {
		// перносим данные из CKEditor в textarea, из которого потом текст попадёт в БД
	// $('#save_btn').click(function(){

	// })

	for (var i in CKEDITOR.instances) {
        CKEDITOR.instances[i].on('change', function(){
        	_modified = true;
        	$("#save_btn").removeAttr("disabled");
        });
    }

    $('#descr, #keywords').keyup(function(){
        _modified = true;
        $("#save_btn").removeAttr("disabled");
    })
})


$(window).on('beforeunload', function() {
//	function CKupdate() {
	if (_modified) {
    	return 'Не сохранены изменения!';
    }
});

function CKEupdate() {
	//alert('2');
	//console.log('ck_upd');
  	for ( instance in CKEDITOR.instances )
    	CKEDITOR.instances[instance].updateElement();
}

