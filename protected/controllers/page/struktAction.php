<?php

class struktAction extends CAction /* pageController */
{
	private $css = '';
	private $js = '';
/*------------------------------------------------------------------------------------*/
    public function run()
	{
		//Utils::print_r(key($_GET));

		$data = $this->getStrukt();

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
		$this->css = 'page/strukt.css';
		$this->js = 'page/strukt.js';

		$data = '<h1>Организационная структура производственного управления “Витебскгаз”</h1>';

			// выборка данных из БД
		$connection = Yii::app()->db;
		$sql = 'SELECT * FROM `strukt` order by sort';
		$res = $connection->createCommand($sql)->queryAll();

		//echo count($res);
		// $data = '<pre>' ;
		// $data .= print_r($res[0], true);
		// $data .= '</pre>---------------<br>' ;

		$i = 1; $j = -1;
		$data .= "<table class='div-table'>";
		foreach ($res as $man) {
			// $data .= '<img src="'.Yii::app()->request->baseUrl.'/images'.$man['img'].'" height="90px">';
			// $data .= $man['fio'].'<br>';
			$j++;
			$colspan = '';
			$class_td = '';
			$last_line = 0;

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

				// предпоследняя строка
			if (count($res)-$j-7 < 0) {
				$class=' prelast_line line';
			}
				// если последняя строка не полная
			if (count($res)-$j-3 < 0) {
				$class=' last_line';
				$last_line++;
			}

				// начинаем новую строку таблицы, если выводимый номер кратен 4
			if (($j%4) == 0) {
				$data .='<tr class="div-row'.$class.'">';
				//$class_td = ' left';
			}
				// если начало второй строки - вставляем в неё подтаблицу
			if ($j == 4 || ((count($res)-$j < 0) && $last_line==1) && ($j%4) == 0) {
				$data .=  '<td colspan="4"><table class="sub_table"><tr class="div_row'.$class.'">';
				//echo '###';
			}

			$data .= 		'<td class="div-cell'.$class_td.'" '.$colspan.'>';
			$data .= 			'<div class="man">';
			$data .= 				'<img src="'.Yii::app()->request->baseUrl.'/images'.$man['img'].'">';
			$data .= 				'<div class="post">'.$man['post'].'</div>';
			$data .= 				'<div class="fio" title="'.$man['prim'].'">'.preg_replace('/ /','<br>',$man['fio']).'</div>';
			$data .= 			'</div>';	// end div-man
			$data .= 		'</td>';	// end div-cell

				// закрываем подтаблицу во второй строке и в последней
			// if ($j == 6 ) {
			// 	$data .=  '</tr></table></td>';
			// }

			if ($j == 6 || ((count($res)-$j == -3) ) ) {
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
}

