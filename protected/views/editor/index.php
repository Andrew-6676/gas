<?php
	$this->addCss('editor/editor.css');
	$this->addJs('editor/editor.js');
	$this->addJs('../protected/extensions/ckeditor/ckeditor.js');
?>
<div class='control_panel'>

	<table>
		<colgroup>
			<col class='c1'></col>
			<col class='c2'></col>
			<col class='c3'></col>
			<col class='c4'></col>
		</colgroup>
		<tr>
			<td rowspan='5'>&nbsp</td>
			<td><label for='name_ru'>Заголовок</label></td>
			<td><input value='<?php  echo $data->name_ru; ?>' type="text" name='name_ru' id='name_ru' placeholder='Заголовок страницы' title='Заголовок страицы'></td>
			<td><button title='Закончить редактирование, перейти к просмотру' id='close_button' onclick="location.href='<?php echo Yii::app()->createUrl('/page?'.$page); ?>'"></button></td>
		</tr>
		<tr>
			<td><label for='name'>Имя страницы</label></td>
			<td><input value='<?php  echo $data->name; ?>' type="text" name='name' id='name' placeholder='Машинное имя страницы - только латиница!' title='Машинное имя страницы - только латиница!' <?php if ($data->id) echo 'disabled="disabled"';?>></td>
			<td></td>
		</tr>
		<tr>
			<td><label for='keywords'>Ключевые слова</label></td>
			<td><input value='<?php  echo $data->keywords; ?>' type="text" name='keywords' id='keywords' placeholder='Ключевые слова через запятую' title='Ключевые слова через запятую'></td>
			<td></td>
		</tr>
		<tr>
			<td><label for='descr'>Описание</label></td>
			<td><textarea type="text" name='descr' id='descr' placeholder='Описание, чётко отражающее содержимое страницы' title='Описание, чётко отражающее содержимое страницы'><?php echo $data->description; ?></textarea></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td>

				<?php
					echo	CHtml::ajaxButton(
							'Сохранить',
							Yii::app()->createURL('/editor/index'),
							array(
								'async' => 'false',
						        'type' => 'POST',
						        // 'data' => 'js:{"aj_page":"'.$page.'","text":$("iframe").contents().find("body").html()}',
						        // 'data' => 'js:{"aj_page":"'.$page.'","text":$("#editor").val()}',
						        'data' => 'js:{
						        	"aj_page":"'.$page.'",
						        	"text":CKEDITOR.instances.editor.getData(),
						        	"keywords":$("#keywords").val(),
						        	"descr":$("#descr").val(),
						        	"name":$("#name").val(),
						        	"name_ru":$("#name_ru").val()
						        }',
						        //'beforeSend' => 'js:function(){console.log("before_aj");CKEupdate()}',
						        'success'=>'js:function(data){
						        		//alert("3");
						        		//console.log("data")
						        	$("#result").html(data);
						        	$("#save_btn").attr("disabled", "disabled");
						        	_modified = false;
						        	if (data==1) {

						        	} else {
						        		//alert("Ошибка сохранения! Программеру в бубен!");

						        	}
						        }',
						        'error' => 'js:function(data){
						        	alert(JSON.stringify(data));
						        }',
						    ),
					        array('class'=>'button', 'id'=>'save_btn', 'disabled'=>'disabled')
			        );
				?>
				<a target='_blank' href='<?php echo Yii::app()->createUrl("/page?".$page); ?>'>Открыть в новой вкладке</a>
			</td>
			<td></td>
		</tr>
	</table>

</div>	<!--  control_panel -->

<div id='result'></div>
<?php
	//Utils::print_r($data->id, false);
?>
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
