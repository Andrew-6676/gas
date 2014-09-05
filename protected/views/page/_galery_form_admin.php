<?php

$form = $this->beginWidget('CActiveForm',
					array(
						'id'=>'upload_form',
						'enableAjaxValidation'=>false,
						'htmlOptions'=>array('enctype'=>'multipart/form-data'),
					)
			);
?>
<div class='row'>1.
		<?php // echo $form->label($f_model,'path'); ?>
		<?php echo $form->fileField($f_model,'img', array('multiple'=>'true')); ?>
</div>
		<?php
			echo	CHtml::submitButton(
							'Загрузить',
							array('submit'=>Yii::app()->createURL('/page/galery')),
						//	Yii::app()->createURL('/page/galery'),
							// array(
						 //        'type' => 'POST',
						 //        'success'=>'js:function(data){
						 //        		alert("="+data.trim()+"=");
						 //                if (data.trim()=="1"){
						 //        			//alert("ok ="+data.trim()+"=\n\r");
						 //        			//alert("Ваш вопрос отправлен!\n\r Ждите ответ на указанный email.");
						 //                    //document.location.search="site/index"
						 //                	//location.reload();
						 //                }else{
						 //        			//alert("err ="+data.trim()+"=");
						 //                	//$("#captcha_button").click();
						 //                	//$("#QuestionForm_captcha").val("");
						 //                    //$("#question_form").html(data);
						 //                    //$("#q_result").html(data);
						 //                    //$("#q_result").show();
						 //                }
						 //        }',
						 //        'error' => 'js:function(data){
						 //        		alert(data);
						 //        }'
						 //    ),
					        array('class'=>'upload_button')
			        );
			  ?>

<?php $this->endWidget(); ?>