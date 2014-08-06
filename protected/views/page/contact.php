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

	<table class="contact-table">	
	<colgroup>
		<col style="width:21%"></col>
		<col style="width:40%;"></col>
		<col style="width:29%"></col>
		<col style="width:10%"></col>
	</colgroup>
		<?php
		foreach($q_model as $values){
			?>
			<tr><td <? if($values->sort==0){echo "class=\"boss\"";}?>><?php echo $values->otdel;?></td>
				<td <? if($values->sort==0){echo "class=\"boss\"";}?>><?php echo $values->dolzn;?></td>
				<td class="secondName <? if($values->sort==0){echo "boss";}?>"><?php echo$values->fio;?></td>
				<td <? if($values->sort==0){echo "class=\"boss\"";}?>><?php echo $values->tel;?></td>
			</tr>
		<?php }
		?>
	</table>

	</div>

</div>