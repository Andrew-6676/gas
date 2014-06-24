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
					<?php $this->widget('zii.widgets.CMenu',array(
								'htmlOptions'=>array('id'=>'m_menu'),
	        	                'items'=>array(
	                                	array('label'=>'Главная', 'url'=>array('/site/index')),
	                                	array('label'=>'Услуги', 'url'=>array('/site/info')),
	                                	array('label'=>'Магазин "Метан"', 'url'=>array('/test/test'),
											  'submenuOptions'=>array('id'=>'sub_3', 'class'=>'sub_menu'),
											  'itemOptions'=>array('id'=>'m_3'),
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

