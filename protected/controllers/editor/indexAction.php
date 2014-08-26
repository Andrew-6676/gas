<?php

class IndexAction extends CAction /* EditorController */
{

    public function run($page='')
	{

		if (Yii::app()->request->isAjaxRequest) {
			// if (isset($_POST[''])) {
			// $result = true;
			// }

			// Utils::print_r(	key($_POST));
				// загружаем в модель нужную страницу - $_POST['aj_page']
			$page_model = Page::model()->find('name="'.$_POST['aj_page'].'"');
			//Utils::print_r($page_model, false);
				// вносим новый текст
			$page_model->html = $_POST['text'];
				// обновляем запись в БД
			$result = $page_model->update();
				// если без ошибок, то синииее сообщение
			if($result)	{
				echo '<span style="color: blue">Страница успешно сохранена!</span> <small><i>'.date('H:i:s',time()).'</i></small>';
			} else {	// иначе - красное
				echo '<span style="color: red">Ошибка сохранения!</span> <small><i>'.date('H:i:s',time()).'</i></small>';
			}

			Yii::app()->end();
		}


/*---------------------------------------*/

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