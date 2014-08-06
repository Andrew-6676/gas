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

	<table>	
		<?php
		foreach($q_model as $values){
			?>
			<tr><td><?php=$values->otdel;?></td>
				<td><?php=$values->dolzn;?></td>
				<td><?php=$values->fio;?></td>
				<td><?php=$values->tel;?></td>
			</tr>
		<?php }
		?>
	</table>

	</div>

</div>