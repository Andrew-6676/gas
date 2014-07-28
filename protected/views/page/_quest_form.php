<span id='q_result'></span>
<?php
//$model = new QuestionForm();
		$form = $this->beginWidget('CActiveForm',
					array(
						'id'=>'question_form',
					)
			    );
		//echo 	$form->errorSummary($f_model);
		?>

		<div class='row'>
			<?php echo $form->label($f_model,'question'); ?>
			<?php echo $form->error($f_model,'question'); ?>
			<br>
    		<?php echo $form->textArea($f_model,'question', array('placeholder'=>$f_model->attributeLabels()['question'])); ?>

   	 	</div>
   	 <?php if (Yii::app()->user->isGuest): ?>
    	<div class='row'>
    		<?php echo $form->label($f_model,'name'); ?>
			<br>
			<?php echo $form->textField($f_model,'name', array('placeholder'=>$f_model->attributeLabels()['name'])); ?>
			<?php echo $form->error($f_model,'name'); ?>
    	</div>
    	<div class='row'>
    		<?php echo $form->label($f_model,'email'); ?>
			<br>
			<?php echo $form->textField($f_model,'email', array('placeholder'=>$f_model->attributeLabels()['email'])); ?>
			<?php echo $form->error($f_model,'email'); ?>
		</div>
		<div class='row'>
			<?php echo $form->label($f_model,'captcha'); ?>
			<br>
			<?php echo $form->textField($f_model,'captcha', array('placeholder'=>$f_model->attributeLabels()['captcha'])); ?>
			<?php echo $form->error($f_model,'captcha'); ?>
		</div>
		<div class='row'>
			<?php $this->widget('CCaptcha', array('buttonLabel' => '[новый код]', 'id'=>'captcha')); ?>
		</div>
	<?php endif; ?>

	 	<div class='row'>
		<?php
			echo	CHtml::ajaxSubmitButton(
							'Отправить',
							Yii::app()->createURL('/page/quest'),
							array(
						        'type' => 'POST',
						        'success'=>'js:function(data){
						        		//alert("="+data.trim()+"=");
						                if (data.trim()=="1"){
						        			//alert("ok ="+data.trim()+"=\n\r");
						        			alert("Ваш вопрос отправлен!\n\r Ждите ответ на указанный email.");
						                    //document.location.search="site/index"
						                	location.reload();
						                }else{
						        			//alert("err ="+data.trim()+"=");
						                	//$("#captcha_button").click();
						                	//$("#QuestionForm_captcha").val("");
						                    $("#question_form").html(data);
						                    //$("#q_result").html(data);
						                    //$("#q_result").show();
						                }
						        }'
						    ),
					        array('class'=>'button')
			        );
			  ?>
		</div>

		<?php $this->endWidget(); ?>