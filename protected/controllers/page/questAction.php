<?php

class questAction extends CAction /* pageController */
{
    public function run()
	{
			// создаём форму для админа или простого пользователя
		if (Yii::app()->user->id<0) {
			$f_model = new QuestionAdminForm();
		} else {
			$f_model = new QuestionForm();
		}

			// обработка ajax-запроса (обработка форм)
		if (Yii::app()->request->isAjaxRequest) {
			//echo '---dghad';
			// $model = new QuestionForm;

//			question_form
			//print_r($_POST);

				// если админ нажал УДАЛИТЬ
			if (isset($_POST['del'])) {
					// удалить вопрос из БД и вывести число удалённых хаписей
				// echo Quest::model()->deleteByPk($_POST['del']['id']);
				echo Quest::model()->updateByPk($_POST['del']['id'], array('deleted'=>1));
				Yii::app()->end();
			}

		/*------------------Если админ сохраняет ответ на вопрос ---------------------*/
			if (isset($_POST['QuestionAdminForm'])) {
					// Сохранить вопрос/ответ в БД
				// echo '<pre>';
					// print_r($_POST['QuestionAdminForm']);
					//$db_model = Quest::model()->findByPk($_POST['QuestionAdminForm']['id']);
					//$db_model->attributes = $_POST['QuestionAdminForm'];
					//$db_model->_attributes = $_POST['QuestionAdminForm'];
					//$db_model->answer = 'sdfsdfsdfsd';
					//$_POST['QuestionAdminForm']['a_date'] = $this->a_date = time();

					if (Quest::model()->updateByPk($_POST['QuestionAdminForm']['id'], $_POST['QuestionAdminForm'])>0) {
						echo '<span style="color: blue">Вопрос/ответ успешно сохранён!</span> <small><i>['.date('H:i:s',time()).']</i></small>';
					} else {
						echo '<span style="color: red">ошибка при сохранении!</span> <small><i>['.date('H:i:s',time()).']</i></small>';
					}
					//print_r($db_model);
					// if ($db_model->save()) {
					// 	echo '111111111111';
					// } else {
					// 	echo '000000000000';
					// }
					// echo '</pre>';
				Yii::app()->end();
			}
		/*--------- отправить почту пользователю ------------------------------*/
			if (isset($_POST['send'])) {

					//var_dump($_POST);
					$data = Quest::model()->findByPk($_POST['send']['id']);

					$email = $_POST['send']['email'];
					$subject = 'Витебскгаз. Ответ на вопрос';

					$headers = "Content-type: text/html; charset=utf-8\r\n";
					$headers .= "From: Витебскгаз <no-reply@vgas.by>\r\n";

					$message = $data->question."\n\r\n\r<div>".$data->answer.'</div>';
					$message = '<html>
								<head>
								 <title>Ответ на вопрос</title>
								</head>
								<body>
									<div class="mess">
										'.date('d-m-Y в H:i',strtotime($data->q_date)).' вы задавали следующий вопрос:
									</div>
									<div class="quest" style="{
											padding:10px;
											font-style: italic;
											boder: 1px dotted #ccc;
											background: #eee;
											margin: 7px 0px 7px 30px;
										}">
										'.$data->question.'
									</div>
									<div class="quest">
										'.date('d-m-Y в H:i',strtotime($data->a_date)).' был дан следующий ответ:
									</div>
									<div class="answer" style="{
											boder: 1px dotted #ccc;
											padding:10px;
											background: #eee;
											margin-left: 30px;
											margin: 7px 0px 7px 30px;
										}">
										'.$data->answer.'
									</div>
									<div >
										Отвечал <b><i><u>'.$data->respondent.'</u></i></b>
									</div>
								</body>
								</html>
								';
					$result = mail($email, $subject, $message, $headers);
					if($result)	{
						echo '<span style="color: blue">Ответ успешно отправлен!</span> <small><i>'.date('H:i:s',time()).'</i></small>';
					} else {
						echo '<span style="color: red">Ошибка отправления</span> <small><i>'.date('H:i:s',time()).'</i></small>';
					}

				Yii::app()->end();
			}		//  if (isset($_POST['send'])) {

				/*---------------------------------------*/
				/*---------------------------------------*/
				/*---------------------------------------*/

		/*-------------- Пользователь отправляет вопрос -------------------------*/
			if(isset($_POST['QuestionForm'])) {
					// засовываем в модель данные из формы
			    $f_model->attributes = $_POST['QuestionForm'];
			    	// если данные введены правильно
			    if ($f_model->validate()) {
			    		// записать вопрос в БД
			    	$db_model = new Quest();

					$db_model->question = htmlspecialchars(mb_substr($f_model->question, 0, 554));
					$db_model->email = htmlspecialchars(mb_substr($f_model->email, 0, 100));
					$db_model->fio = htmlspecialchars(mb_substr($f_model->name, 0, 100));

					if ($db_model->save()) {
				    	// echo "1";
				    	echo 'Ваш вопрос отправлен. Ожидайте ответа на указанный Вами email: '. htmlspecialchars($db_model->email);
				    	echo '<br>'.'<a href="'.$this->controller->createUrl('/page/quest').'">Задать ещё вопрос</a>';
				    } else {
				    	echo "-1";
				    	//$f_model->captcha = '';
			    		//$this->controller->renderPartial('_quest_form',array('f_model'=>$f_model));
				    }
			    } else {
			    		// выдать сообщения об ошибках, если пользователь неправильно заполнил форму
			    	//echo "0";
			    	//Utils::print_r($f_model->getErrors());
			    	//Utils::print_r(CActiveForm::validate($f_model));
			    	//print_r(CActiveForm::validate($f_model));
			    	$f_model->captcha = '';
			    	$this->controller->renderPartial('_quest_form',array('f_model'=>$f_model));
			    }

				//exit;
				Yii::app()->end();
			}			// end Пользователь отправляет вопрос

			throw new CHttpException(500, 'quest');

			//exit;
			Yii::app()->end();
		}		// end if Ajax

		$criteria = new CDbCriteria;
		$criteria->order ='sort, q_date desc';

		if (Yii::app()->user->id<0) {
			//$criteria->addCondition('visible=0');
			$criteria->addCondition('deleted=0');
			//$criteria->addCondition('answered=0');
	    } else {
			//$criteria->addCondition('answered=1');
			$criteria->addCondition('deleted=0');
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

