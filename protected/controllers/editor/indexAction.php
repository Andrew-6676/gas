<?php

class IndexAction extends CAction /* GuestBookController */
{

    public function run($page='')
	{

		if (Yii::app()->request->isAjaxRequest) {
			// if (isset($_POST[''])) {

			// }

			// Utils::print_r(	key($_POST));
			// $page = Page::model()->
			$result = Page::model()->updateByPk();
			if($result)	{
				echo '<span style="color: blue">Страница успешно сохранена!</span> <small><i>'.date('H:i:s',time()).'</i></small>';
			} else {
				echo '<span style="color: red">Ошибка сохранения!</span> <small><i>'.date('H:i:s',time()).'</i></small>';
			}

			Yii::app()->end();
		}
		// if ($page != '') {
			$data = Page::model()->find('name=:page', array(':page'=>$page));
		// } else {
			//$data = '<none>'
		// }

		$this->controller->render('index', array(
											'page'=>$page,
											'data'=>$data
		));
	}
}