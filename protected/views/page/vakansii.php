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
					<!--div class="job">
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
					</div-->
					<div class="job">
						<div class="job-name"><?php echo $values->name; ?></div>
						<?php if($values->education!=''){?><div class="education"><?php echo $values->education; ?></div><?}?>
						<?php if($values->conditions!=''){?><div class="conditions"><?php echo $values->conditions; ?></div><?}?>
						<?php if($values->duties!=''){?><div class="duties"><?php echo $values->duties; ?></div><?}?>
						<?php if($values->experience!=''){?><div class="experience"><?php echo $values->experience; ?></div><?}?>
						<?php if($values->pay!=''){?><div class="pay"><?php echo $values->pay; ?></div><?}?>
						<?php if($values->employment!=''){?><div class="employment"><?php echo $values->employment; ?></div><?}?>
						<?php if($values->more!=''){?><div class="more"><?php echo $values->more; ?></div><?}?>
						<?php if($values->contactname!=''){?><div class="contactname"><?php echo $values->contactname; ?></div><?}?>
						<?php if($values->contactphone!=''){?><div class="contactphone"><?php echo $values->contactphone; ?></div><?}?>
						<?php if($values->contactname!=''){?><div class="contactname"><?php echo $values->contactname; ?></div><?}?>
						<?php if($values->contactmail!=''){?><div class="contactmail"><?php echo $values->contactmail; ?></div><?}?>
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