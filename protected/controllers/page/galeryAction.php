<?php

class galeryAction extends CAction /* pageController */
{
    public function run()
	{

			// рендерим страницу
		$this->controller->render('galery',
								   array(
								   		//'data'=>$data,
								   		//'q_model'=>$q_model,
								   		//'f_model'=>$f_model,
								   )
		);
	}
/*------------------------------------------------------------------------------------*/


}

