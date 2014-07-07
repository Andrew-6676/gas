<?php

class pageAction extends CAction /* GuestBookController */
{

    public function run()
	{
		//Utils::print_r($_GET);
		$this->controller->render('page');
	}
}