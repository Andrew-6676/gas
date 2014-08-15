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
						        'data' => 'js:{"text":$("iframe").contents().find("body").html()}',
						        'success'=>'js:function(data){
						        		//alert(data);
						        	$("#result").html(data);
						        	if (data==1) {

						        	} else {
						        		//alert("Ошибка сохранения! Программеру в бубен!");

						        	}
						        }',
						        'error' => 'js:function(data){
						        	alert(JSON.stringify(data));
						        }',
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
		<textarea id='editor' class="editor" name="editor"><?php echo $data->html; ?></textarea>
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

<script type='text/javascript'>CKEDITOR.replace( 'editor' );</script>
