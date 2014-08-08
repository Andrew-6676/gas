<?php
	$this->addCss('editor/editor.css');
	$this->addJs('../protected/extensions/ckeditor/ckeditor.js');
?>

<div class='control_panel'>
	control_panel
	<button>Предпросмотр</button>
	<button>Сохранить</button>
	<?php
		echo	CHtml::ajaxButton(
							'Отправить',
							Yii::app()->createURL('/editor/index'),
							array(
						        'type' => 'POST',
						        // 'data' => array('text'=>'sfasdfasdfasdfasdf'),
						        'data' => 'js:{"text":$("#editor").text()}',
						        'success'=>'js:function(data){
						        		//alert(data);
						        	$("#result").html(data);
						        	if (data==1) {

						        	} else {
						        		//alert("Ошибка сохранения! Программеру в бубен!");

						        	}
						        }'
						    ),
					        array('class'=>'button')
			        );
	?>
	<button>Удалить</button>
	<button>Открыть в новой вкладке</button>
	<a target='_blank' href='<?php echo Yii::app()->createUrl("/page?".$page); ?>'>Открыть в новой вкладке</a>
</div>

<div id='result'></div>

<div class='editor_wr'>
	<?php if ($data) { ?>
		<textarea id='editor' class="ckeditor" name="editor1"><?php echo $data->html; ?></textarea>
	<?php } else {
		echo 'Ошибка';

	}	;
	?>

<?php
	// echo $page;
	// Utils::print_r($data, false);
?>
</div>

<div class='prewiew_wr'>


</div>
