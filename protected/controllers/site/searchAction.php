<?php

class SearchAction extends CAction /* SiteController */
{

    public function run()
	{
		$search_results = array(
			'search_text'=>'баллон',
			'pages'=>array(
						array('href'=>'/page?gazific', 'text'=>'ПУ "Витебскгаз" заключает договора на монтаж и газоснабжение домоладний жителей г.Витебска и Витебского район от индивидуальных баллонных установок следующих типов'),
						array('href'=>'/page?agzs', 'text'=>'Реализация сжиженного газа марки ПБА для автотранспорта, а также СУГ в баллонах емкостью 5, 27, 50 л.'),
						array('href'=>'/page/quest', 'text'=>'О льготах при оплате за природный и сжиженный газ.'),
						array('href'=>'/page/struct', 'text'=>'Заместитель главного инженера...'),
						array('href'=>'/page/vakansii', 'text'=>'Должность: Менеджер по продажам автозапчастей  Заработная плата: 3 500 000 – 8 000 000 Описание: Требования...'),
			)
		);

		$this->controller->render('search', array('search_results'=>$search_results));
	}
}