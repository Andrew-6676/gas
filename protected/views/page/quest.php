<?php
	$this->breadcrumbs = array(
			//'Djghjc'=>array('site/page/'),
			'Вопрос-ответ',
		);
	$this->addCss('page/page.css');
		// для админа свои скрипты и стили, для осталных тоже свои
	if (Yii::app()->user->id<0) {
		$this->addCss('page/quest_admin.css');
		$this->addJs('page/quest_admin.js');
	} else {
		$this->addJs('page/quest.js');
		$this->addCss('page/quest.css');
	}
?>

<div class='page'>
<h1>Вопрос-ответ</h1>

<?php
	// если НЕ АДМИН
  if (Yii::app()->user->id>0 || Yii::app()->user->isGuest): ?>
	<div id='question_form' class='border'>
		<span id='q_result'></span>
		<?php
			$this->renderPartial('_quest_form',array('f_model'=>$f_model));
		?>
	</div>	<!-- question_form -->
<?php
  endif;
  $i = 0;
 ?>
	<div class='q_wrapper'>
		<?php
		//Utils::print_r($f_model,false);
		foreach ($q_model as $q) {
			$i++;
		?>
		<?php
			// если админ
		if (Yii::app()->user->id<0): ?>
			<div class='quest_caption <?php echo $q->id; if ($q->answered) {echo " answered";}?> '>
				<?php
						echo	CHtml::ajaxButton(
								'',
								Yii::app()->createURL('/page/quest'),
								array(
							        'type' => 'POST',
							        'data' => array('del'=>array('id'=>$q->id)),
							        'beforeSend' => 'js:function(){
						        			if (!confirm("Точно хотите удалить вопрос #'.$q->id.'?")) {
							        			return false;
							        		}
							        }',
							        'success'=>'js:function(data){
							        		$(".quest_caption.'.$q->id.'>a").css("color","red");
							        		//alert("Вопрос удалён.");
							        			// удалить со страницы вопрос
							        		$(".quest_caption.'.$q->id.'").hide(600);
							        		//$(".quest_caption.'.$q->id.'").remove();
							        		$(".item.'.$q->id.'").hide();
							        		//$(".item.'.$q->id.'").remove();
							        }',
							        'error' => 'js:function(data){
							        		alert("error delete ");
							        }',
							    ),
						        array('class'=>'del_quest')
				        );
				?>

				<a href='<?php echo $q->id; ?>' class='question_href'>
					<?php echo '<b>'.$q->id.'.</b> '.mb_substr($q->question,0,150,'utf-8')."..."; ?>
				</a>
			</div>
			<div class='item <?php echo $q->id; ?>'>
			 		<?php
			 			$f_model->id = $q->id;
			 			$f_model->question = $q->question;
			 			$f_model->answer = $q->answer;
			 			$f_model->visible = $q->visible;
			 			$f_model->sort = $q->sort;
			 			$f_model->answered = $q->answered;


			 			$this->renderPartial(
			 				'_quest_form_admin',
			 				array(
			 					'id'=>$q->id,
			 					'f_model'=>$f_model,
			 					'data'=>$q,
			 					//'i'=>$i,
			 				)
			 			);
			 		?>
			</div>
		<?php
			// если не админ
		else: ?>
			<div class='item <?php echo $q->id; ?>'>
			 	<div class='question'>
			 		<?php echo $i.'. '.$q->question; ?>
			 	</div>
				<div class='answer'>
			 		<?php echo $q->answer; ?>
			 	</div>
				<div class='date'>
			 		<?php echo date('d-m-Y',strtotime($q->q_date)); ?>
			 	</div>
			</div>
		<?php endif; }?>
	</div> 	<!-- q_wrapper -->
</div>