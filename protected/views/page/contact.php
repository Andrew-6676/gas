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
	<colgroup>
		<col style="width:250px"></col>
		<col style="width:400px;"></col>
		<col style="width:320px"></col>
		<col style="width:100px"></col>
	</colgroup>
		<?php
		foreach($q_model as $values){
			?>
			<tr><td><?php echo $values->otdel;?></td>
				<td><?php echo $values->dolzn;?></td>
				<td><?php echo$values->fio;?></td>
				<td><?php echo $values->tel;?></td>
			</tr>
		<?php }
		?>
	</table>

	</div>

</div>