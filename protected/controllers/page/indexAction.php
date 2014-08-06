<?php

class indexAction extends CAction /* pageController */
{
	private $css = '';
	private $js = '';
/*------------------------------------------------------------------------------------*/
    public function run()
	{
		//Utils::print_r(key($_GET));

		$data ='';
			// проверяем, запрашивается ли конкретная страница
		if (sizeof($_GET)==0) {
			$data = 'Страница-заглушка. Когда-нибудь здесь появится контент. Наберитесь терпения :)';
		} else {
				// ищем в базе запрашиваемую страницу
			$connection = Yii::app()->db;
			$sql_c = 'SELECT count(id) FROM `page` where name="'.key($_GET).'"';
			$c = $connection->createCommand($sql_c)->queryScalar();
				// если нашлось - загружаем из БД
			if ($c > 0) {
				$css = 'site/page.css';
				$js = 'site/page.js';
				$data = $this->getPageFromDB(key($_GET));
			} else {	// если не нашлось - пытаемся выполнить функцию
				$data = '(_._)';
			}
		}
			// рендерим страницу
		$this->controller->render('page',
								   array(
								   		'data'=>$data,
								   		'css'=>$this->css,
								   		'js'=>$this->js
								   )
		);
	}
/*------------------------------------------------------------------------------------*/

	private function getPageFromDB($page='empty') {
		if ($page=='empty') {
			return '<h2>Неверный запрос</h2>';
		}

		//$data = $page;

		$connection = Yii::app()->db;
		$sql = 'SELECT * FROM `page` where name="'.$page.'"';
			// получаем страницу (тьекст, стили, скрипты...) из БД
		$res = $connection->createCommand($sql)->queryRow();
			// если существует нужная страница
		if ($res) {
			$this->controller->description = $res['description'];
			$this->controller->keywords = $res['keywords'];

				// формирование breadcrumbs
			$bc = array();
				// наименование текущей страницы
			$bc[] = $res['name_ru'];
				// ищем все родительские страницы
			$p = $res;
				// пока не дойдём до записи, у которой нет родительской
			while ($p['parent'] > 0) {
					// выбираем родительскую запись
				$sql = 'SELECT * FROM `page` where id='.$p['parent'];
				$p = $connection->createCommand($sql)->queryRow();
					// добавляем в начало breadcrumbs
				$bc = array_merge(array($p['name_ru']=>$p['url']), $bc);
				//Utils::print_r($p);
			}

			$this->controller->breadcrumbs = $bc;

			$data = '<style>'.$res['css'].'</style>';
			$data .= $res['html'];
			return $data;
		} else {
			return '<h2>Содержимое страницы не создано</h2>';
		}
	}
}

