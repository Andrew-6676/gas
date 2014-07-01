<!DOCTYPE HTML>
<html lang="ru">
<head>
<!--[if lt IE9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
	<meta charset="utf-8">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<script src='/gas/js/jquery.js'></script>
	<script src='/gas/js/main_menu.js'></script>
	<script src='/gas/js/main.js'></script>
	<?php
		echo $this->getJS();
	?>
	<!-- <link href='http://fonts.googleapis.com/css?family=Didact+Gothic&subset=cyrillic-ext,cyrillic,latin' rel='stylesheet' type='text/css'> -->
	<!-- <link href='http://fonts.googleapis.com/css?family=Poiret+One&subset=cyrillic,latin' rel='stylesheet' type='text/css'> -->
	<link href="/gas/css/menu.css" rel="stylesheet">
	<link href="/gas/css/main.css" rel="stylesheet">
	<?php
		echo $this->getCSS();
	?>
</head>
<body>
	<div id='body'>
		<header id="header">
	 		<div class="left_ear">		</div>
			<div class="right_ear">		</div>

			<div class='left_logo'>
			</div>

			<div class='logo_wrapper'>
				<div class='top_logo'>

					<div class='slogan'>БЕЗАВАРИЙНОЕ И БЕСПЕРЕБОЙНОЕ ОБЕСПЕЧЕНИЕ ГАЗОМ ПОТРЕБИТЕЛЕЙ</div>
					<!-- <div class='search'> -->
						<input id='search_input' type='text' placeholder='Поиск'>
					<!-- </div> -->
				</div>
			</div>    <!-- end logo_wrapper -->



			<div class='menu_wrapper'>
				<nav id="main_menu">
					<?php
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
								array('label'=>'Структура', 'url'=>array('site/index'),
									  'itemOptions'=>array('class'=>'has_child'),
									  'submenuOptions'=>array('id'=>'sub_sub_1_1', 'class'=>'sub_sub_menu'),
									  'items'=>$sub_sub_1_1,
								),
								array('label'=>'Производственные базы', 'url'=>array('site/index'),
									  'itemOptions'=>array('class'=>'has_child'),
									  'submenuOptions'=>array('id'=>'sub_sub_1_2', 'class'=>'sub_sub_menu'),
									  'items'=>$sub_sub_1_2,
								),
								array('label'=>'Контакты', 'url'=>array('site/index')),
								array('label'=>'История', 'url'=>array('site/index')),
								array('label'=>'Галерея', 'url'=>array('site/index')),
					);

					/*-----------------------------------------------------------------*/
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
						// выпадающее меню для пункта МАГАЗИН МЕТАН
					//$sub_3 = array(
						// выпадающее меню для пункта КАФЕ МЕТАН
					//$sub_4 = array(

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
	                                	array('label'=>'Магазин "Метан"', 'url'=>array('/test/test'),
											  'itemOptions'=>array('id'=>'m_3'),
											  'submenuOptions'=>array('id'=>'sub_3', 'class'=>'sub_menu'),
											  'items'=>array(array('label'=>'Купить', 'url'=>array('site/index')),
												 			 array('label'=>'Посмотреть', 'url'=>array('site/index')),
															 array('label'=>'Прайс', 'url'=>array('site/index')),
												)
										),
										array('label'=>'Кафе "Метан"', 'url'=>array('/test/test'),
											  'submenuOptions'=>array('id'=>'sub_4', 'class'=>'sub_menu'),
											  'itemOptions'=>array('id'=>'m_4'),
										 	  'items'=>array(array('label'=>'Покушать', 'url'=>array('site/index')),
														array('label'=>'Выпить', 'url'=>array('site/index')),
														array('label'=>'Спеть', 'url'=>array('site/index')),
														array('label'=>'Потанцевать', 'url'=>array('site/index')),
												)
										),
	                   					array('label'=>'АГЗС','url'=>array('/test/db')),
	                   					array('label'=>'Вопрос-ответ',   'url'=>array('/printer/index')),
	                ))); ?>
					<div class='login_href'></div>
				</nav>  <!-- #main menu  -->

			</div>
			<div id='breadcrumbs'>
				<a href='#'>Главная</a> <span></span>
				<a href='#'>Услуги</a> <span></span>
				<a href='#'>Подключение</a> <span></span>
			</div>
		</header>




		<div class='content'>
			<?php echo $content; ?>
		</div>	<!-- content -->

		<footer id="footer">
		 	<div class="f_left_ear">		</div>
			<div class="f_right_ear">		</div>

			<div class="links">
				<div class="f_wrap_img">
					<a href="http://www.topgas.by/">
						<img src="/gas/images/topgas2.png"/>
					</a>
				</div>
				<div class="f_wrap_img">
					<a href="http://www.pravo.by/">
						<img src="/gas/images/pravoby.png"/>
					</a>
				</div>
				<div class="f_wrap_img">
					<a href="http://www.minenergo.gov.by/">
						<img src="/gas/images/minenergoby.png"/>
					</a>
				</div>
				<div class="f_wrap_img">
					<a href="http://president.gov.by/ru/">
						<img src="/gas/images/portal.png"/>
					</a>
				</div>
				<div class="f_wrap_img">
					<a href="http://ncpi.gov.by/">
						<img src="/gas/images/ncpi.png"/>
					</a>
				</div>
			</div>

			<!-- <div class="f_right">
			    <small><p>Copyright (c) 2015</p></small>
			    <address>
	      			Разработчик: <a href='mailto:
	      				<?php echo Yii::app()->params['adminEmail']; ?>'>
	      					<?php echo Yii::app()->params['adminFIO']."  (".Yii::app()->params['adminEmail'] ?>)
	      					</a>
	      					<br>
				</address>
				<?php echo Yii::powered(); ?>
			</div> -->
		</footer>
		<div class="ff">
			<small>Copyright © 2014</small>
			<small>	Разработчик: <a href='mailto: <?php echo Yii::app()->params['adminEmail']; ?>'><?php echo Yii::app()->params['adminFIO']."  (".Yii::app()->params['adminEmail'] ?>)</a></small>
			<small> <?php echo Yii::powered(); ?> </small>
		</div>

		<a href="#header">
			<div id="to_top"></div>
		</a>
	</div>
</body>
</html>

