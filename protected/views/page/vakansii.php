<?php
$this->breadcrumbs = array(
			//'Djghjc'=>array('site/page/'),
			'Вакансии',
		);
$this->addCss('page/page.css');

/*print_r($q_model);*/



?>

<div class='page'>
	<h1>Контакты</h1>

	<div class="border">

	<?php
		foreach($v_model as $values){
			$values->name.'<br>';
		}
	?>

	</div>

</div>