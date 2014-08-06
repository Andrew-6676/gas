<?php
$this->breadcrumbs = array(
			//'Djghjc'=>array('site/page/'),
			'Вакансии',
		);
$this->addCss('page/page.css');

/*print_r($q_model);*/



?>

<div class='page'>
	<h1>Вакансии</h1>

	<div class="border">

	<?php
		foreach($v_model as $values){
			echo $values->pay.'<br>';
			echo $values->name.'<br>';
			echo $values->text.'<br>';
		}
	?>

	</div>

</div>