<?php

class contactAction extends CAction /* pageController */
{
    public function run()
	{
		$criteria = new CDbCriteria;
		$criteria->order ='sort, id';
		$criteria->addCondition("tel!=''");

		$q_model = Contact::model()->findAll($criteria); /*"tel!=''"*/

			// рендерим страницу
		$this->controller->render('contact',
								   array(
								   		'q_model'=>$q_model
								   )
		);
	}
/*------------------------------------------------------------------------------------*/


}

