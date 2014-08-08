<?php

class SearchAction extends CAction /* SiteController */
{

    public function run($str='')
	{	
		$connection = Yii::app()->db;
		$search_r=Search::model()->findAll('active=1');
		$search_results=array();
		$search_results['err']=false;
		$search_results['search_text']=trim($str);
		$search_results['pages']=array();

		foreach ($search_r as $page) {
			//$search_results[]=$page->table;
			$fields_search=explode(';', $page->fields);

			$str_field='';
			foreach ($fields_search as $fields){
				if(trim($str_field)==''){
					$str_field="`".$fields."` LIKE '%".trim($str)."%' ";
				}else{
					$str_field.=" or `".$fields."` LIKE '%".trim($str)."%' ";
				}
			}

			$sql="SELECT * FROM `".$page->table."` WHERE ($str_field)";
				//"SELECT *  FROM `page` WHERE `name` LIKE 'metanstore' AND (`html` LIKE '%".trim($str)."%' or 'keywords' like '%".trim($str)."%' or 'description' like '%".trim($trim)."%')"
			$res = $connection->createCommand($sql)->query();

			if($res){
				foreach ($res as $res_search) {
					$search_results['pages'][]=array('pagename'=>$res_search['name_ru'],'href'=>'/page'.$res_search['url'],'text'=>'');
				}

					
			}



		}


		if (trim($str)=='') {
			$search_results = array(
				'err'=>'неправильная строка для поиска!',
			);

		} 
		if(count($search_results['pages'])==0){
			$search_results = array(
				'err'=>'поиск результата не дал!',
			);
		}
		/*
		else {
			
			$search_results = array(
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
			);
		}*/

		$this->controller->render('search', array('search_results'=>$search_results));
	}
}