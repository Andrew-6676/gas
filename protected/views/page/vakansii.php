<?php
$this->breadcrumbs = array(
			//'Djghjc'=>array('site/page/'),
			'Вакансии',
		);
$this->addCss('page/page.css');
$this->addCss('page/vakansii.css');

/*print_r($q_model);*/



?>

<div class='page'>
	<h1>Вакансии 2</h1>

	<div class="border">
		<?php
		if(count($v_model)>=1){
				foreach($v_model as $values){
					?>
					<div class="job">
					<div class="job-title">
						<div class="job-name">
							<span class="job-field">Должность:</span><span class="job-title-text"> <?php echo $values->name; ?></span>
						</div>
						<div class="job-pay">
							<span class="job-field"><?php if($values->pay!=''){?>Заработная плата:</span> <span class="job-title-text"><?php echo $values->pay;?></span><?}?>
						</div>
					</div>
					<div class="job-description">
						<span class="job-field">Описание:</span> <?php echo $values->text; ?>
					</div>
					</div>
				<?php }
		}else{
		?>
			<div class="no-job">
				Извините, в данное время вакансии отсутствуют!
			</div>
		<?php } ?>
	</div>

</div>