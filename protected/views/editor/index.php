<?php
	$this->addCss('editor/editor.css');
	$this->addJs('../protected/extensions/ckeditor/ckeditor.js');
?>

<div class='control_panel'>
	control_panel
	<button>Предпросмотр</button>
	<button>Сохранить</button>
	<button>Удалить</button>
	<button>Открыть в новой вкладке</button>
	<a target='_blank' href='<?php echo Yii::app()->createUrl("/page?".$page); ?>'>Открыть в новой вкладке</a>
</div>

<div class='editor_wr'>
	<textarea class="ckeditor" name="editor1"><?php echo $data->html; ?></textarea>

<?php
	// echo $page;
	// Utils::print_r($data, false);
?>
</div>

<div class='prewiew_wr'>


</div>
