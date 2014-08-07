<?php
	$this->addCss('page/page.css');
	$this->addCss('page/galery.css');

 	$this->addJs("fliplightbox/fliplightbox.min.js");
	$this->addJs('page/galery.js');

    $sys_path = Yii::app()->params['galery_syspath'];
    $http_path = Yii::app()->params['galery_httppath'];

?>

<h1>
Галерея
</h1>

<div class='border'>
	<div id='galery_box'>

	<?php
		foreach ($img_list as $img) {

	?>
		<a href="<?php echo $img['path'].''.$img['img']; ?>" class="flipLightBox">
			<img src="<?php echo $img['path'].'small_'.$img['img']; ?>" width="225" height="225" alt="Image 3" />
			<span><b>Название фотки</b> Краткое описание происходящего на фотке</span>
		</a>
	<?php
		}
	?>

	</div>
</div>



<script type="text/javascript">$('#galery_box').flipLightBox()</script>