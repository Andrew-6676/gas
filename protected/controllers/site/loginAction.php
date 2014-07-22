<?php

class loginAction extends CAction   /*---- SiteController ----*/
{
   public function run()
	{
		$err  = FALSE;
		$err1 = '';
		$err2 = '';

		//echo '1dfgdf';

		if (Yii::app()->request->isAjaxRequest) {
			$model = new LoginForm;
			if(isset($_POST['LoginForm'])) {
					// засовываем в модель данные из формы
			    $model->attributes = $_POST['LoginForm'];
			    	// если правильный пароль
			    if ($model->validate()) {
			    		// если всё правильно - аутентифицируем польователя
			    	Yii::app()->user->login($model->_identity);
			    		// нужные переменные в сессию
			    	Yii::app()->session['id_user'] = $model->_identity->getId();
			    	//Yii::app()->session['id_user'] = '';
			    		// выводим 1, чтобы обновилась страница
			    	echo '1';
			    } else {
			    		// если пароль/логин нге правильный - сообщение об ошибке
			    	echo $model->getError('pass');
			    }
			} else {
				echo '(_._)';
			}
		} else {
			echo '(__.__)';
		}

		exit;

  //       /*-----------------------------Переменные в сессию-----------------------------------------*/
  //               //$st = User::model()->findByAttributes(array('id'=>Yii::app()->user->id));
  //               $st = User::model()->findByPk(Yii::app()->user->id);
		// 			// записываем id магазина в сессию
  //               Yii::app()->session['id_store'] = $st->id_store;
  //               	// записываем id пользователя в сессию
  //               Yii::app()->session['id_user'] = $st->id;
		// /*-----------------------------------------------------------------------------------------*/
	}

}
