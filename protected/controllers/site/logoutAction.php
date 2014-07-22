<?php

class logoutAction extends CAction   /*---- SiteController ----*/
{
   public function run()
	{
		Yii::app()->user->logout();
		echo '1';
	}

}
