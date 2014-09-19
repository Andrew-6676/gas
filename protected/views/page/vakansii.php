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
	<h1>Вакансии</h1>

	<div class="border">
		<?php
		if(count($v_model)>=1){
				foreach($v_model as $values){
					?>
					<div class="job">
						<div class="job-field">
							<div class="job-caption">Вакансия</div>
							<div class="job-info"> <?php echo $values->name; ?></div>
						</div>
						<?php if($values->education!=''){?><div class="job-field">
							<div class="job-caption">Образование</div>
							<div class="job-info"> <?php echo $values->education; ?></div>
						</div><?php }?>
						<?php if($values->conditions!=''){?><div class="job-field">
							<div class="job-caption">Условия работы</div>
							<div class="job-info"><?php echo $values->conditions; ?></div>
						</div><?php }?>
						<?php if($values->duties!=''){?><div class="job-field">
							<div class="job-caption">Обязанности</div>
							<div class="job-info"> <?php echo $values->duties; ?></div>
						</div><?php }?>
						<?php if($values->experience!=''){?><div class="job-field">
							<div class="job-caption">Опыт работы</div>
							<div class="job-info"> <?php echo $values->experience; ?></div>
						</div><?php }?>
						<?php if($values->pay!=''){?><div class="job-field">
							<div class="job-caption">Заработная плата</div>
							<div class="job-info"> <?php echo $values->pay; ?></div>
						</div><?php }?>
						<?php if($values->employment!=''){?><div class="job-field">
							<div class="job-caption">Занятость</div>
							<div class="job-info"> <?php echo $values->employment; ?></div>
						</div><?php }?>
						<?php if($values->more!=''){?><div class="job-field">
							<div class="job-caption">Дополнительная информация</div>
							<div class="job-info"> <?php echo $values->more; ?></div>
						</div><?php }?>
						<?php if($values->contactname!=''){?><div class="job-field">
							<div class="job-caption">Контактное лицо</div>
							<div class="job-info"> <?php echo $values->contactname; ?></div>
						</div><?php }?>
						<?php if($values->contactphone!=''){?><div class="job-field">
							<div class="job-caption">Телефон</div>
							<div class="job-info"> <?php echo $values->contactphone; ?></div>
						</div><?php }?>
						<?php if($values->contactmail!=''){?><div class="job-field">
							<div class="job-caption">e-mail</div>
							<div class="job-info"> <?php echo $values->contactmail; ?></div>
						</div><?php }?>
					</div>
				<?php }
		}else{
		?>
			<div class="no-job">
				На данный момент вакансии отсутствуют!
			</div>
		<?php } ?>
	</div>

</div>