<?php
	$this->addCss('page/page.css');
	$this->addCss('page/galery.css');

 	$this->addJs("fliplightbox/fliplightbox.min.js");
	$this->addJs('page/galery.js');

    $sys_path = Yii::app()->params['galery_syspath'];
    $http_path = Yii::app()->params['galery_httppath'];

?>
<div class='page'>
	<h1>Галерея</h1>

	<?php
		if ($admin):
	?>
		<div id='admin_box'>
			<center><h2>Загрузка изображений</h2></center>
			<?php
			//	$this->renderPartial('_galery_form_admin',array('f_model'=>$f_model));


		 $this->widget('ext.EAjaxUpload.EAjaxUpload',
                 array(
                       'id'=>'EAjaxUpload',
                       'config'=>array(
                                       'action'=>$this->createUrl('/page/galery'),
                                       'template' => '<div class="qq-uploader">'.
										                '<div class="qq-upload-drop-area"><span>Drop files here to upload</span></div>'.
										                '<div class="qq-upload-button">Загрузить изображение</div>'.
										                '<ul class="qq-upload-list"></ul>'.
										             '</div>',
                                       'debug'=>true,
                                       'allowedExtensions'=>array('jpg', 'gif', 'png', 'jpeg'),
                                       'sizeLimit'=>10*1024*1024,// maximum file size in bytes
                                       //'minSizeLimit'=>10*1024*1024,// minimum file size in bytes
                                       'onComplete'=>"js:function(id, fileName, responseJSON){ alert('Файл <'+fileName+'> загружен'); }",
                                       'messages'=>array(
                                                        'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                                        'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                                        'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                                        'emptyError'=>"{file} is empty, please select files again without it.",
                                                        'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                                                       ),
                                       //'showMessage'=>"js:function(message){ alert(message); }"
                                      )
                      ));




			?>

			<div class='hint' style="display: none;">
				<small>Вновь добавленные картинки будут кликабельны после обновления страницы</small>
			</div>
		</div>

	<?php
		endif;
	?>


	<div class='border'>

		<div id='galery_box'>

		<?php
			foreach ($model as $img) {

		?>
				<?php
					// if ($admin) {
					// 	echo '<button class="del_btn">x</button>'	;
					// }
				?>
			<a href="<?php echo $img->getUrl("big"); ?>" class="flipLightBox">
				<img src="<?php echo $img->getUrl("small"); ?>" height="160"  alt="<?php echo $img->name; ?>" title="<?php echo $img->name; ?>" >
				<span>
					<b>
						<?php echo $img->name; ?>
					</b>
					<?php echo $img->descr; ?>
				</span>
			</a>
		<?php
			}
		?>

		</div>
	</div>


	<?php


	?>
	<script type="text/javascript">$('#galery_box').flipLightBox()</script>
</div>