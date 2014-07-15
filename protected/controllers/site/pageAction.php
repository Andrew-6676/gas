<?php

class pageAction extends CAction /* GuestBookController */
{
	private $css = '';
	private $js = '';
/*------------------------------------------------------------------------------------*/
    public function run()
	{
		//Utils::print_r(key($_GET));

		$data ='';
			// проверяем, запрашивается ли страница
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
			} else {	// если не нашлось - выполняем функцию
				$func = 'get'.key($_GET);
				$data = $this->$func();
				// $css = 'site/'.key($_GET).'.css';
				// $js = 'site/'.key($_GET).'.js';
			}
		}
		$this->controller->render('page',
								   array(
								   		'data'=>$data,
								   		'css'=>$this->css,
								   		'js'=>$this->js
								   )
		);
	}
/*------------------------------------------------------------------------------------*/
	private function getStrukt() {
	// <div class='div-table'>
	// 	<div class='div-row'>
	// 		<div class='div-cell'>
	// 			<div class='man top'>
	// 				<img src='<?php echo Yii::app()->request->baseUrl; >/images/strukt/korobkov.jpg'>
	// 				<div class='post'>
	// 					Директор
	// 				</div>
	// 				<div class='fio'>
	// 					Коробков<br>Андрей<br>Александрович
	// 				</div>
	// 			</div>
	// 		</div>
	// 	</div>
	// </div>

		$this->controller->breadcrumbs=array('Структура');
		$this->css = 'site/strukt.css';
		$this->js = 'site/strukt.js';

		$data = '<h1>Организационная структура производственного управления “Витебскгаз”</h1>';

			// выборка данных из БД
		$connection = Yii::app()->db;
		$sql = 'SELECT * FROM `strukt` order by sort';
		$res = $connection->createCommand($sql)->queryAll();

		//$data = '<pre>' ;
		//$data .= print_r($res[0], true);
		//$data .= '</pre>---------------<br>' ;

		$i = 1; $j = -1;
		$data .= "<table class='div-table'>";
		foreach ($res as $man) {
			// $data .= '<img src="'.Yii::app()->request->baseUrl.'/images'.$man['img'].'" height="90px">';
			// $data .= $man['fio'].'<br>';
			$j++;
			$colspan = '';
			$class_td = '';

				// если первый выводимый человек - его в отдельную строку (директор)
			if ($j == 0) {
				$class = ' first_line';
				$colspan = 'colspan="4"';
			}
				// если второй, третий, четвёртый - во вторую строку
			if ($j > 3 && $j < 8) {
				$class = ' second_line';
				//$colspan = 'colspan="4"';
			}
				// всех остальных выводим одинаково
			if ($j > 7) {
				$class = ' line';
			}
				// начинаем новую строку таблицы, если выводимый номер кратен 4
			if (($j%4) == 0) {
				$data .='<tr class="div-row'.$class.'">';
				//$class_td = ' left';
			}
				// если начало второй строки - вставляем в неё подтаблицу
			if ($j == 4) {
				$data .=  '<td colspan="4"><table class="sub_table"><tr>';
			}

			$data .= 		'<td class="div-cell'.$class_td.'" '.$colspan.'>';
			$data .= 			'<div class="man">';
			$data .= 				'<img src="'.Yii::app()->request->baseUrl.'/images'.$man['img'].'">';
			$data .= 				'<div class="post">'.$man['post'].'</div>';
			$data .= 				'<div class="fio">'.preg_replace('/ /','<br>',$man['fio']).'</div>';
			$data .= 			'</div>';	// end div-man
			$data .= 		'</td>';	// end div-cell

				// закрываем подтаблицу во второй строке
			if ($j == 6) {
				$data .=  '</tr></table></td>';
			}

				// закрываем строку после первого, четвёртого и каждого четвёртого
			if (($j%4) == 3 || $j == 0 || $j == 6) {
				$data .=	'</tr>';	// end div-row
			}

				// если выведен первый
			if ($j == 0) {
			 	$j += 3;
			}
				// если выведен 7
			if ($j == 6) {
				$j += 1;
			}

		}	// end foreach

		$data .= 	'</table>';	// end div-table

		return $data;
	}
/*------------------------------------------------------------------------------------*/
	private function getQuest() {
		$this->controller->breadcrumbs = array(
				//'Djghjc'=>array('site/page/'),
				'Вопрос-ответ',
			);
		$this->css = 'site/quest.css';
		$this->js = 'site/quest.js';

		$data = '<h1>Вопрос-ответ</h1>';

		// $data .= '<div class=\'question_form\'>';
		// $data .= 	'';
		// $data .= '';
		// $data .= '';
		// $data .= 	'<textarea name=\'q_text\'></textarea>';
		// $data .= 	'<button id=\'q_send\'></button>';
		// $data .= '</div>	<!-- question_form -->';

		$connection = Yii::app()->db;
		$sql = 'SELECT * FROM `quest` where visible order by sort, id';
		$res = $connection->createCommand($sql)->queryAll();

		$i = 0;
		$data .= '<div class=\'q_wrapper\'>';
		foreach ($res as $q) {
			$i++;
			$data .= '<div class=\'item\'>';
			$data .=	'<div class=\'question\'>';
			$data .= 		$i.'. '.$q['question'];
			$data .= 	'</div>';
			$data .=	'<div class=\'answer\'>';
			$data .= 		$q['answer'];
			$data .= 	'</div>';
			$data .= '</div>';
		}
		$data .= '</div> 	<!-- q_wrapper -->';
		return $data;
	}

	private function getPageFromDB($page='empty') {
		if ($page=='empty') {
			return '<h2>Неверный запрос</h2>';
		}

		//$data = $page;

		$connection = Yii::app()->db;
		$sql = 'SELECT * FROM `page` where name="'.$page.'"';
		$res = $connection->createCommand($sql)->queryRow();
		if ($res) {
			$this->controller->breadcrumbs = array(
				//'Djghjc'=>array('site/page/'),
				$res['name_ru'],
			);
			$data = $res['html'];
			$data .= '<style>'.$res['css'].'</style>';
			return $data;
		} else {
			return '<h2>Содержимое страницы не создано</h2>';
		}
	}
}

