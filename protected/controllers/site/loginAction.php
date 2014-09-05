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
			    		// выводим 1, чтобы обновилась страница
			    	echo '1';
			    		// настройки для CKEditor
			    	$_SESSION['KCFINDER'] = array();
					$_SESSION['KCFINDER']['disabled'] = false;
						// пути берутся из конфига сайта
					$_SESSION['KCFINDER']['uploadURL'] = Yii::app()->params['uploadURL'];
    				$_SESSION['KCFINDER']['uploadDir'] = Yii::app()->params['uploadDir'];


			    } else {
			    		// если пароль/логин нге правильный - сообщение об ошибке
			    	echo $model->getError('pass');
			    }
			} else {
				echo '(_._)';
			}
		} else {
			echo '(__.__)';
			//print_r(Yii::app()->user);
			// $this->controller->redirect(Yii::app()->user->returnUrl);
			// if (Yii::app()->user->id<0) {
			 	$this->controller->redirect(Yii::app()->createUrl('site/index'));
			// } else {
			// 	$this->controller->redirect(Yii::app()->user->returnUrl);
			// }
		}

		exit;

  		// /*-----------------------------------------------------------------------------------------*/
	}

}
