<?php
	$this->addCSS('page/page.css');
	if ($css!='') {
		$this->addCSS($css);
	}
	if ($js!='') {
		$this->addJS($js);
	}

	//echo 'referer = '.$_SERVER['HTTP_REFERER'];
	//echo '<br>';
?>

<div class='page'>
<?php
if (Yii::app()->user->id < 0):
?>

	<?php if (key($_GET)!=''): ?>
		<div class='edit_button'>
				<a href='<?php echo Yii::app()->createURL('editor/index/page').'/'.key($_GET); ?>' id='edit'>Изменить</a>
		</div>
	<?php endif; ?>

<?php endif; ?>

	<?php
		echo $data;
	?>
</div>		<!-- page -->

