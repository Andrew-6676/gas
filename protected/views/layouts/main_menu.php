<?php
		// подменю для пункта подменю ГЛАВНАЯ>ПРОИЗВОДИСТВЕННЫЕ БАЗЫ
	$sub_sub_1_1 = array(
				array('label'=>'Руководство', 'url'=>array('/page')),
				array('label'=>'Приёмная', 'url'=>array('/page')),
				array('label'=>'ПТО', 'url'=>array('/page')),
				array('label'=>'ГНС', 'url'=>array('/page')),
				array('label'=>'Бухгалтерия', 'url'=>array('/page')),
				array('label'=>'Экономисты', 'url'=>array('/page')),
	);
		// Главная - Структура
	$sub_sub_1_2 = array(
				array('label'=>'ул. Терешковой', 'url'=>array('/page?bazi_teresh')),
				array('label'=>'ул. Бровки', 'url'=>array('/page?bazi_brovki')),
				array('label'=>'ул. С.Панковой', 'url'=>array('/page?bazi_pank')),
				array('label'=>'п. Новка', 'url'=>array('/page?bazi_novka')),
				array('label'=>'п. Мазолово', 'url'=>array('/page?bazi_mazolovo')),
	);


		// выпадающее меню для пункта ГЛАВНАЯ
	$sub_1 = array(
				array('label'=>'Структура', 'url'=>array('/page/strukt'),
					  // 'itemOptions'=>array('class'=>'has_child'),
					  // 'submenuOptions'=>array('id'=>'sub_sub_1_1', 'class'=>'sub_sub_menu'),
					  // 'items'=>$sub_sub_1_1,
				),
				array('label'=>'Производственные базы', 'url'=>array('/page?bazi'),
					  'itemOptions'=>array('class'=>'has_child'),
					  'submenuOptions'=>array('id'=>'sub_sub_1_2', 'class'=>'sub_sub_menu'),
					  'items'=>$sub_sub_1_2,
				),
				array('label'=>'<span class="strong">Контакты</span>', 'url'=>array('/page/contact')),
				array('label'=>'История', 'url'=>array('/page?history')),
				array('label'=>'Галерея', 'url'=>array('/page/galery')),
	);

/*---------------------------------------------------------------------------------------------*/
/*---------------------------------------------------------------------------------------------*/

		// Услуги - Газификация одноквартирного жилого дома
	$sub_sub_2_1 = array(
				array('label'=>'Природным газом', 'url'=>array('/page?gazific_metan')),
				array('label'=>'От индивидуальной балонной установки', 'url'=>array('/page?gazific_ballon')),
				// array('label'=>'Документы', 'url'=>array('site/index')),
				// array('label'=>'ТУ', 'url'=>array('site/index')),
				// array('label'=>'Проект', 'url'=>array('site/index')),
				// array('label'=>'СМР', 'url'=>array('site/index')),
				// array('label'=>'Договор', 'url'=>array('site/index')),
	);
		// выпадающее меню для пункта УСЛУГИ
	$sub_2 = array(
				array('label'=>'Тарифы на природный и сжиженный газ.', 'url'=>array('/page?gasprice')),
				array('label'=>'Газификация одноквартирного жилого дома', 'url'=>array('/page?gazific'),
					  'itemOptions'=>array('class'=>'has_child'),
					  'submenuOptions'=>array('id'=>'sub_sub_2_1', 'class'=>'sub_sub_menu'),
					  'items'=>$sub_sub_2_1,
				),
				array('label'=>'Газификация промышленных и с/х потребителей', 'url'=>array('/page?sh')),
				array('label'=>'Строительство газопроводов', 'url'=>array('/page?gazoprovod')),
				array('label'=>'Монтаж (перемонтаж, ремонт) газового оборудования', 'url'=>array('/page?montaz')),
				array('label'=>'Техническое обслуживание газового оборудования', 'url'=>array('/page?to_gas')),
				array('label'=>'Установка приборов учёта расхода газа', 'url'=>array('/page?pribor_uchet')),
				array('label'=>'Установка газового оборудования на а/м', 'url'=>array('/page?am_gas')),
				array('label'=>'Диагностика а/м', 'url'=>array('/page?am_diagnostika')),
			);

/*-----------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------*/

		// выпадающее меню для пункта МАГАЗИН МЕТАН
	$sub_3 = array(array('label'=>'Купить', 'url'=>array('/page')),
	 			 array('label'=>'Посмотреть', 'url'=>array('/page')),
				 array('label'=>'Прайс', 'url'=>array('/page')),
			 );
		// выпадающее меню для пункта КАФЕ МЕТАН
	$sub_4 = array(array('label'=>'Покушать', 'url'=>array('/page')),
				array('label'=>'Выпить', 'url'=>array('/page')),
				array('label'=>'Спеть', 'url'=>array('/page')),
				array('label'=>'Потанцевать', 'url'=>array('/page')),
			);

/*-----------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------*/
		// главное меню + вывод меню
	$this->widget('zii.widgets.CMenu',array(
				'htmlOptions'=>array('id'=>'m_menu'),
				'encodeLabel'=>false,
                'items'=>array(
                    	array('label'=>'Главная', 'url'=>array('/site/index'),
							  	'itemOptions'=>array('id'=>'m_1'),
                    		  	'submenuOptions'=>array('id'=>'sub_1', 'class'=>'sub_menu'),
								'items'=>$sub_1,
                    	),
                    	array('label'=>'Услуги', 'url'=>array('/page?uslugi'),
							  'itemOptions'=>array('id'=>'m_2'),
                    		  'submenuOptions'=>array('id'=>'sub_2', 'class'=>'sub_menu'),
							  'items'=>$sub_2,
                    	),
                    	array('label'=>'Магазин "Метан"', 'url'=>array('/page?metanstore'),
							  'itemOptions'=>array('id'=>'m_3'),
							  'submenuOptions'=>array('id'=>'sub_3', 'class'=>'sub_menu'),
							//  'items'=>$sub_3,
						),
						array('label'=>'Кафе "Метан"', 'url'=>'http://metan.gas.by/',
							  'linkOptions'=>array('target'=>'_blank'),
							  //'submenuOptions'=>array('id'=>'sub_4', 'class'=>'sub_menu'),
							  'itemOptions'=>array('id'=>'m_4'),
						 	  //'items'=>$sub_4,
						),
       					array('label'=>'АГЗС','url'=>array('/page?agzs')),
       					array('label'=>'Вопрос-ответ',   'url'=>array('/page/quest')),
    )));
