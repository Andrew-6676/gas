<?php

class indexAction extends CAction /* AdminController */
{

    public function run()
	{
		$this->controller->render('index');
	}
}