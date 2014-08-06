<?php
$this->breadcrumbs = array(
			//'Djghjc'=>array('site/page/'),
			'Контакты',
		);
$this->addCss('page/page.css');
$this->addCss('page/contact.css');

/*print_r($q_model);*/



?>

<div class='page'>
<h1>Контакты</h1>

<div class="border">
	
<?php

foreach($q_model as $values){
echo $values->id.'<br>';
}

?>

</div>

</div>