<?php

class questAction extends CAction /* GuestBookController */
{
    public function run()
	{
		if (Yii::app()->session['id_user']<0) {
			$f_model = new QuestionAdminForm();
		} else {
			$f_model = new QuestionForm();
		}

			// обработка ajax-запроса (обработка формы)
		if (Yii::app()->request->isAjaxRequest) {
			//echo '---dghad';
			// $model = new QuestionForm;

//			question_form
			//print_r($_POST);

			if (isset($_POST['del'])) {
					// удалить вопрос из БД и вывести число удалённых хаписей
				echo Quest::model()->deleteByPk($_POST['del']['id']);
				Yii::app()->end();
			}
				/*---------------------------------------*/
			if (isset($_POST['QuestionAdminForm'])) {
					// Сохранить вопрос/ответ в БД
				echo '<pre>';
					//print_r($_POST['QuestionAdminForm']);
					//$db_model = Quest::model()->findByPk($_POST['QuestionAdminForm']['id']);
					//$db_model->attributes = $_POST['QuestionAdminForm'];
					//$db_model->_attributes = $_POST['QuestionAdminForm'];
					//$db_model->answer = 'sdfsdfsdfsd';
					echo Quest::model()->updateByPk($_POST['QuestionAdminForm']['id'], $_POST['QuestionAdminForm']);
					//print_r($db_model);
					// if ($db_model->save()) {
					// 	echo '111111111111';
					// } else {
					// 	echo '000000000000';
					// }
					echo '</pre>';
				Yii::app()->end();
			}
				/*---------------------------------------*/
			if (isset($_POST['send'])) {
					// отправить почту пользователю
					var_dump($_POST);
					$message = 'test message';
					mail("Andrew@vitebsk.oblgas.by", "the subject", $message, "From: webmaster@$SERVER_NAME", "-fwebmaster@$SERVER_NAME");

				Yii::app()->end();
			}
				/*---------------------------------------*/
				/*---------------------------------------*/
				/*---------------------------------------*/
				/*---------------------------------------*/
			if(isset($_POST['QuestionForm'])) {
					// засовываем в модель данные из формы
			    $f_model->attributes = $_POST['QuestionForm'];
			    	// если правильный пароль
			    if ($f_model->validate()) {
			    		// записать вопрос в БД

			    	$db_model = new Quest();

					$db_model->question = htmlspecialchars(mb_substr($f_model->question, 0, 554));
					$db_model->email = htmlspecialchars(mb_substr($f_model->email, 0, 100));
					$db_model->fio = htmlspecialchars(mb_substr($f_model->name, 0, 100));

					if ($db_model->save()) {
				    	echo "1";
				    } else {
				    	echo "-1";
				    	//$f_model->captcha = '';
			    		//$this->controller->renderPartial('_quest_form',array('f_model'=>$f_model));
				    }
			    } else {
			    		// выдать сообщения об ошибках
			    	//echo "0";
			    	//Utils::print_r($f_model->getErrors());
			    	//Utils::print_r(CActiveForm::validate($f_model));
			    	//print_r(CActiveForm::validate($f_model));
			    	$f_model->captcha = '';
			    	$this->controller->renderPartial('_quest_form',array('f_model'=>$f_model));
			    }

				//exit;
				Yii::app()->end();
			}

			throw new CHttpException(500, 'quest');

			//exit;
			Yii::app()->end();
		}

		$criteria = new CDbCriteria;
		$criteria->order ='sort, q_date desc';

		if (Yii::app()->session['id_user']<0) {
			//$criteria->addCondition('visible=0');
			//$criteria->addCondition('answered=0');
	    } else {
			$criteria->addCondition('answered=1');
			$criteria->addCondition('visible=1');
	    }

		$q_model = Quest::model()->findAll($criteria);

			// рендерим страницу
		$this->controller->render('quest',
								   array(
								   		//'data'=>$data,
								   		'q_model'=>$q_model,
								   		'f_model'=>$f_model,
								   )
		);
	}
/*------------------------------------------------------------------------------------*/


}

