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
		echo $data;
	?>
</div>		<!-- page -->

