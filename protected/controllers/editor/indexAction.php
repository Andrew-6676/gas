<?php

class IndexAction extends CAction /* EditorController */
{

    public function run($page='', $new='')
	{

		if (Yii::app()->request->isAjaxRequest) {
			// if (isset($_POST[''])) {
			// $result = true;
			// }

			//Utils::print_r($_POST, false);
				// загружаем в модель нужную страницу - $_POST['aj_page']
			$criteria = new CDbCriteria;
     		$criteria->condition = 'name="'.$_POST['name'].'"';
     		//$criteria->addCondition('deleted=0');
			$page_model = Page::model()->find($criteria);
			//Utils::print_r($page_model, false);
			if (!$page_model) {
				// вносим новый текст
				$page_model = new Page();
				$page_model->name = $_POST['name'];
				$page_model->name_ru = $_POST['name_ru'];
				$page_model->url = '?'.$_POST['name'];
				$page_model->html = $_POST['text'];
				$page_model->keywords = $_POST['keywords'];
				$page_model->description = $_POST['descr'];
				$page_model->edit_date 	= date('Y-m-d H-i-s');
				$result = $page_model->save();
				//echo 'new  '. $_POST['name'];
				//Yii::app()->end();
			} else {
				$page_model->html 		= $_POST['text'];
				$page_model->name_ru 	= $_POST['name_ru'];
				$page_model->keywords 	= $_POST['keywords'];
				$page_model->description= $_POST['descr'];
				$page_model->edit_date 	= date('Y-m-d H-i-s');
					// обновляем запись в БД
				$result = $page_model->update();
			}
				// если без ошибок, то синииее сообщение
			if($result)	{
				echo '<span style="color: blue">Страница успешно сохранена!</span> <small><i>'.date('H:i:s',time()).'</i></small>';
			} else {	// иначе - красное
				echo '<span style="color: red">Ошибка сохранения!</span> <small><i>'.date('H:i:s',time()).'</i></small>';
			}

			Yii::app()->end();
		}


/*---------------------------------------*/

		if ($page != '') {
			$data = Page::model()->find('name=:page', array(':page'=>$page));
		}
		elseif ($new != '') {
			$data = new Page();
		}

		$this->controller->render('index', array(
											'page'=>$page,
											'data'=>$data
		));
	}
}