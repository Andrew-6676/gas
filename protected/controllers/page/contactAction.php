<?php

class contactAction extends CAction /* pageController */
{
    public function run()
	{

		$q_model = Contact::model()->findAll("tel!=''");

			// рендерим страницу
		$this->controller->render('contact',
								   array(
								   		'q_model'=>$q_model
								   )
		);
	}
/*------------------------------------------------------------------------------------*/


}

