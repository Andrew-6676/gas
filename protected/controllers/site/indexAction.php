<?php

class IndexAction extends CAction /* GuestBookController */
{

    public function run()
	{
		$this->controller->render('index');
	}
}