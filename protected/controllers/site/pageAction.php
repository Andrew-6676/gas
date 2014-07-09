<?php

class pageAction extends CAction /* GuestBookController */
{

/*------------------------------------------------------------------------------------*/
    public function run()
	{
		//Utils::print_r(key($_GET));

		$data ='';
		$css = '';
		$js = '';

		if (sizeof($_GET)==0) {
			$data = 'Страница-заглушка. Когда-нибудь здесь появится контент. Наберитесь терпения :)';
		} else {
			switch (key($_GET)) {
				case 'strukt':
					$data = $this->getStrukt();
					$css = 'site/strukt.css';
					$js = '';

					break;
				case 'quest':
					$data = $this->getQuest();
					$css = 'site/quest.css';
					$js = 'site/quest.js';
					break;
				default:
					$data = 'Страница-заглушка. Когда-нибудь здесь появится контент. Наберитесь терпения :)';
					break;
			}
		}
		$this->controller->render('page',
								   array(
								   		'data'=>$data,
								   		'css'=>$css,
								   		'js'=>$js
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
				$class = '';
			}
				// начинаем новую строку таблицы, если выводимый номер кратен 4
			if (($j%4) == 0) {
				$data .='<tr class="div-row'.$class.'">';
			}
				// если начало второй строки - вставляем в неё подтаблицу
			if ($j == 4) {
				$data .=  '<td colspan="4"><table class="sub_table"><tr>';
			}

			$data .= 		'<td class="div-cell" '.$colspan.'>';
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
}