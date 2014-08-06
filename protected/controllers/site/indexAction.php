<?php

class IndexAction extends CAction /* SiteController */
{

    public function run()
	{
		$this->controller->render('index');
	}
}