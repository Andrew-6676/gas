<?php

class SearchAction extends CAction /* SiteController */
{

    public function run($str='')
	{
		$search_r=Search::model()->findAll('active=1');
		$search_results=array();
		$search_results['err']=false;
		foreach ($search_r as $value) {
			$search_results[]=$value->table;
		}



		if (trim($str)=='') {
			$search_results = array(
				'err'=>'неправильная строка для поиска!',
			);

		} else {
			
			/*$search_results = array(
				'err'=>false,
				'search_text'=>$str,
				'pages'=>array(
							array(
								'pagename'=>'Газификация одноквартирного жилого дома',
								'href'=>'/page?gazific',
								'text'=>'ПУ "Витебскгаз" заключает договора на монтаж и газоснабжение домоладний жителей г.Витебска и Витебского район от индивидуальных баллонных установок следующих типов'),
							array(
								'pagename'=>'АГЗС',
								'href'=>'/page?agzs',
								'text'=>'Реализация сжиженного газа марки ПБА для автотранспорта, а также СУГ в баллонах емкостью 5, 27, 50 л.'),
							array(
								'pagename'=>'Вопрос-ответ',
								'href'=>'/page/quest',
								'text'=>'О льготах при оплате за природный и сжиженный газ.'),
							array(
								'pagename'=>'Структура',
								'href'=>'/page/struct',
								'text'=>'Заместитель главного инженера...'),
							array(
								'pagename'=>'Вакансии',
								'href'=>'/page/vakansii',
								'text'=>'Должность: Менеджер по продажам автозапчастей  Заработная плата: 3 500 000 – 8 000 000 Описание: Требования...'),
				)
			);*/
		}

		$this->controller->render('search', array('search_results'=>$search_results));
	}
}