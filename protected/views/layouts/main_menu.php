<?
		// подменю для пункта подменю ГЛАВНАЯ>ПРОИЗВОДИСТВЕННЫЕ БАЗЫ
	$sub_sub_1_1 = array(
				array('label'=>'Руководство', 'url'=>array('site/index')),
				array('label'=>'Приёмная', 'url'=>array('site/index')),
				array('label'=>'ПТО', 'url'=>array('site/index')),
				array('label'=>'ГНС', 'url'=>array('site/index')),
				array('label'=>'Бухгалтерия', 'url'=>array('site/index')),
				array('label'=>'Экономисты', 'url'=>array('site/index')),
	);
		// Главная - Структура
	$sub_sub_1_2 = array(
				array('label'=>'Терешковой', 'url'=>array('site/index')),
				array('label'=>'Новка', 'url'=>array('site/index')),
				array('label'=>'Панковой', 'url'=>array('site/index')),
				array('label'=>'Бровки', 'url'=>array('site/index')),
				array('label'=>'Мазолово', 'url'=>array('site/index')),
	);


		// выпадающее меню для пункта ГЛАВНАЯ
	$sub_1 = array(
				array('label'=>'Структура', 'url'=>array('site/page/strukt'),
					  // 'itemOptions'=>array('class'=>'has_child'),
					  // 'submenuOptions'=>array('id'=>'sub_sub_1_1', 'class'=>'sub_sub_menu'),
					  // 'items'=>$sub_sub_1_1,
				),
				array('label'=>'Производственные базы', 'url'=>array('site/index'),
					  'itemOptions'=>array('class'=>'has_child'),
					  'submenuOptions'=>array('id'=>'sub_sub_1_2', 'class'=>'sub_sub_menu'),
					  'items'=>$sub_sub_1_2,
				),
				array('label'=>'Контакты', 'url'=>array('site/index')),
				array('label'=>'История', 'url'=>array('site/page/history')),
				array('label'=>'Галерея', 'url'=>array('site/index')),
	);

/*---------------------------------------------------------------------------------------------*/
/*---------------------------------------------------------------------------------------------*/

		// Услуги - Газификация одноквартирного жилого дома
	$sub_sub_2_1 = array(
				array('label'=>'Документы', 'url'=>array('site/index')),
				array('label'=>'ТУ', 'url'=>array('site/index')),
				array('label'=>'Проект', 'url'=>array('site/index')),
				array('label'=>'СМР', 'url'=>array('site/index')),
				array('label'=>'Договор', 'url'=>array('site/index')),
	);
		// выпадающее меню для пункта УСЛУГИ
	$sub_2 = array(
				array('label'=>'Газификация одноквартирного жилого дома', 'url'=>array('site/index'),
					  'itemOptions'=>array('class'=>'has_child'),
					  'submenuOptions'=>array('id'=>'sub_sub_2_1', 'class'=>'sub_sub_menu'),
					  'items'=>$sub_sub_2_1,
				),
				array('label'=>'Газификация промышленных и с/х потребителей', 'url'=>array('site/index')),
				array('label'=>'Строительство газопроводов', 'url'=>array('site/index')),
				array('label'=>'Монтаж (перемонтаж, ремонт) газового оборудования', 'url'=>array('site/index')),
				array('label'=>'Техниеское обслуживание газового оборудования', 'url'=>array('site/index')),
				array('label'=>'Установка приборов учёта расхода газа', 'url'=>array('site/index')),
				array('label'=>'Установка газового оборудования на а/м', 'url'=>array('site/index')),
				array('label'=>'Диагностика а/м', 'url'=>array('site/index')),
			);

/*-----------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------*/

		// выпадающее меню для пункта МАГАЗИН МЕТАН
	$sub_3 = array(array('label'=>'Купить', 'url'=>array('site/index')),
	 			 array('label'=>'Посмотреть', 'url'=>array('site/index')),
				 array('label'=>'Прайс', 'url'=>array('site/index')),
			 );
		// выпадающее меню для пункта КАФЕ МЕТАН
	$sub_4 = array(array('label'=>'Покушать', 'url'=>array('site/index')),
				array('label'=>'Выпить', 'url'=>array('site/index')),
				array('label'=>'Спеть', 'url'=>array('site/index')),
				array('label'=>'Потанцевать', 'url'=>array('site/index')),
			);

/*-----------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------*/
		// главное меню + вывод меню
	$this->widget('zii.widgets.CMenu',array(
				'htmlOptions'=>array('id'=>'m_menu'),
                'items'=>array(
                    	array('label'=>'Главная', 'url'=>array('/site/index'),
							  	'itemOptions'=>array('id'=>'m_1'),
                    		  	'submenuOptions'=>array('id'=>'sub_1', 'class'=>'sub_menu'),
								'items'=>$sub_1,
                    	),
                    	array('label'=>'Услуги', 'url'=>array('/site/info'),
							  'itemOptions'=>array('id'=>'m_2'),
                    		  'submenuOptions'=>array('id'=>'sub_2', 'class'=>'sub_menu'),
							  'items'=>$sub_2,
                    	),
                    	array('label'=>'Магазин "Метан"', 'url'=>array('site/page/metan'),
							  'itemOptions'=>array('id'=>'m_3'),
							  'submenuOptions'=>array('id'=>'sub_3', 'class'=>'sub_menu'),
							  'items'=>$sub_3,
						),
						array('label'=>'Кафе "Метан"', 'url'=>'http://metan.gas.by/',
							  'linkOptions'=>array('target'=>'_blank'),
							  //'submenuOptions'=>array('id'=>'sub_4', 'class'=>'sub_menu'),
							  'itemOptions'=>array('id'=>'m_4'),
						 	  //'items'=>$sub_4,
						),
       					array('label'=>'АГЗС','url'=>array('/site/page/agzs')),
       					array('label'=>'Вопрос-ответ',   'url'=>array('site/page/quest')),
    )));
