<?php

class IndexAction extends CAction /* GuestBookController */
{

    public function run($page)
	{

		$data = Page::model()->find('name=:page', array(':page'=>$page));

		$this->controller->render('index', array(
											'page'=>$page,
											'data'=>$data
		));
	}
}