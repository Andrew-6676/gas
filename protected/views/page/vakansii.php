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
		if(count($v_model)>=1){
				foreach($v_model as $values){
					?>
					<div class="job">
					<div class="job-title">
						<div class="job-name"><?php echo $values->name; ?></div>
						<div class="job-pay"><?php if($values->pay!=''){echo $values->pay;}?></div>
					</div>
					<div class="job-description"><?php echo $values->text; ?></div>
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