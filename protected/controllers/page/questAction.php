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

			if (isset($_POST['del'])) {
				// echo '11111 del';
				// Utils::print_r(key($_POST), false);
				// var_dump($_POST);

					// удалить вопрос из БД и вывести число удалённых хаписей
				echo Quest::model()->deleteByPk($_POST['del']['id']);
				// $q->delete();
				// echo $q->q_date;
				// exit;
				Yii::app()->end();
			}

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
			$criteria->addCondition('visible=0');
			$criteria->addCondition('answered=0');
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

