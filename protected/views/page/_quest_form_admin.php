<span id='result_'<?php echo $id?>></span>
<?php
$form = $this->beginWidget('CActiveForm',
					array(
						'id'=>'question_form'.$id,
					)
			);
?>
<div class='question'>
	<div class='row'>
		<?php echo $form->label($f_model,'question').' #'.$id; ?>
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
    	<?php echo $form->checkbox($f_model,'visible', array('placeholder'=>$f_model->attributeLabels()['answer'])); ?>
		<?php echo $form->label($f_model,'visible'); ?>
	</div>
	<div class='row right'>
		<?php
				echo	CHtml::ajaxButton(
						'',
						Yii::app()->createURL('/page/quest'),
						array(
					        'type' => 'POST',
					        'data' => array('save'=>array('id'=>$q->id)),
					        'beforeSend' => 'js:function(){
				        			if (!confirm("Сохранить вопрос #'.$q->id.'")) {
					        			return false;
					        		}
					        }',
					        'success'=>'js:function(data){
					        		//alert("=>"+data+"<=");
					        }',
					        'error' => 'js:function(data){
					        		alert("error save");
					        }',
					    ),
				        array('class'=>'save_quest')
		        );
		?>
	</div>
</div>
<?php $this->endWidget(); ?>