<?php

class vakansiiAction extends CAction /* pageController */
{
    public function run()
	{

		$criteria = new CDbCriteria;
		$criteria->order ='sort, v_date desc';
		$criteria->addCondition('visible=1');
		$v_model = Vakansii::model()->findAll($criteria);

			// рендерим страницу
		$this->controller->render('vakansii',
								   array(
								   		'v_model'=>$v_model,
								   )
		);
	}
/*------------------------------------------------------------------------------------*/


}

