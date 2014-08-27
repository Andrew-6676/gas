<?php
	$this->addCss('editor/editor.css');
	$this->addJs('editor/editor.js');
	$this->addJs('../protected/extensions/ckeditor/ckeditor.js');
?>
<div class='control_panel'>
	<span>Панель управления</span>
	<!-- button>Предпросмотр</button -->
	<?php
		echo	CHtml::ajaxButton(
							'Сохранить',
							Yii::app()->createURL('/editor/index'),
							array(
								'async' => 'false',
						        'type' => 'POST',
						        //'data' => 'js:{"aj_page":"'.$page.'","text":$("iframe").contents().find("body").html()}',
						        'data' => 'js:{"aj_page":"'.$page.'","text":$("#editor").val()}',
						        //'beforeSend' => 'js:function(){console.log("before_aj");CKEupdate()}',
						        'success'=>'js:function(data){
						        		//alert("3");
						        		//console.log("ajax_resp")
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
					        array('class'=>'button', 'id'=>'save_btn')
			        );
	?>
	<!-- button id='upd_btn'>Удалить</button -->
	<!-- button>Открыть в новой вкладке</button -->
	<a target='_blank' href='<?php echo Yii::app()->createUrl("/page?".$page); ?>'>Открыть в новой вкладке</a>
	<button id='close_button' onclick="location.href='<?php echo Yii::app()->createUrl('/page?'.$page); ?>'"></button>
</div>	<!--  control_panel -->

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
</div>  <!-- editor_wr -->

<script type='text/javascript'>CKEDITOR.replace( 'editor' );</script>
