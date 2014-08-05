<?php

class logoutAction extends CAction   /*---- SiteController ----*/
{
   public function run()
	{
		Yii::app()->user->logout();
		// if (Yii::app()->user->id < 0) {
		// 	$this->controller->redirect('/site/index');
		// } else {
		// 	$this->controller->redirect(Yii::app()->user->returnUrl);
		// }
		echo '1';
	}

}
