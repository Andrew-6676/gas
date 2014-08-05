<span id='result_<?php echo $id?>'></span>
<?php
$form = $this->beginWidget('CActiveForm',
					array(
						'id'=>'question_form'.$id,
					)
			);
?>
<div class='question'>
		<?php echo $form->hiddenField($f_model,'id'); ?>
		<?php $f_model->a_date = date('Y-m-d H:i:s',time()); ?>
		<?php echo $form->hiddenField($f_model,'a_date'); ?>
	<div class='row'>
		<?php echo $form->label($f_model,'question').' #'.$id; ?>
		<?php echo $form->numberField($f_model,'sort', array(
    						'placeholder'=>$f_model->attributeLabels()['sort'],
    						'class'=>'question_sort',
    						'id'=>'question_sort_'.$id,
    	)); ?>
		<?php echo ('<span class="wr">
							Автор: <b>'.$data->fio.'</b>;
							Дата: <b>'.date('d-m-Y',strtotime($data->q_date)).'</b>
					</span>'); ?>
		<br>
    	<?php echo $form->textArea($f_model,'question', array(
    						'placeholder'=>$f_model->attributeLabels()['question'],
    						'class'=>'question_textarea',
    						'id'=>'question_textarea_'.$id,
    	)); ?>
	</div>
</div>
<div class='answer'>
	<div class='row'>
		<?php echo $form->label($f_model,'answer'); ?>
		<br>
    	<?php echo $form->textArea($f_model,'answer', array(
    						'placeholder'=>$f_model->attributeLabels()['answer'],
    						'class'=>'answer_textarea',
    						'id'=>'answer_textarea_'.$id,
    	)); ?>
	</div>
	<div class='row'>
		<?php echo $form->label($f_model,'respondent'); ?>
    	<?php echo $form->textField($f_model,'respondent', array(
    						'placeholder'=>$f_model->attributeLabels()['respondent'],
    						'class'=>'respondent_text',
    						'id'=>'answer_textarea_'.$id,
    	)); ?>
	</div>
	<div class='row'>
    	<?php echo $form->checkbox($f_model,'visible', array('placeholder'=>$f_model->attributeLabels()['answer'])); ?>
		<?php echo $form->label($f_model,'visible'); ?>
		<br>
		<?php echo $form->checkbox($f_model,'answered', array('placeholder'=>$f_model->attributeLabels()['answered'])); ?>
		<?php echo $form->label($f_model,'answered'); ?>
	</div>
	<div class='row right'>
		<!-- <button class='save_quest'>Сохранить</button> -->
		<?php
				echo	CHtml::ajaxSubmitButton(
						'Сохранить',
						Yii::app()->createURL('/page/quest'),
						array(
					        'type' => 'POST',
					        // 'data' => array('save'=>array(
					        // 							'id'=>$id,
					        // 							'answer'=>'',
					        // 		  )),
					        'beforeSend' => 'js:function(){
				        			// if (!confirm("Сохранить вопрос #'.$id.'?")) {
					        		// 	return false;
					        		// }
					        }',
					        'success'=>'js:function(data){
					        		//alert("=>"+data+"<=");
					        		$("#result_'.$id.'").html(data);
					        }',
					        'error' => 'js:function(data){
					        		alert("error save"+ data);
					        }',
					    ),
				        array('class'=>'save_quest')
		        );
				/*-------------------------*/
				echo	CHtml::ajaxButton(
						'Отправить на '.$data->email,
						Yii::app()->createURL('/page/quest'),
						array(
					        'type' => 'POST',
					        'data' => array('send'=>array(
					        							'id'=>$id,
					        							'email'=>$data->email,
					        		  )),
					        'beforeSend' => 'js:function(){
					        		//alert("Не забыли сохранить перед отправкой?");
				        			if (!confirm("Не забыли сохранить перед отправкой #'.$id.'?")) {
					        			return false;
					        		}
					        }',
					        'success'=>'js:function(data){
					        		//alert("=>"+data+"<=");
					        		$("#result_'.$id.'").html(data);
					        }',
					        'error' => 'js:function(data){
					        		alert("error send");
					        		//alert(data);
					        }',
					    ),
				        array('class'=>'send_quest')
		        );

		    // echo '<pre>';
		    // print_r(get_defined_vars());
		    // echo '</pre>';
		?>
	</div>
</div>
<?php $this->endWidget(); ?>