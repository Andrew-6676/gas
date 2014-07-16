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
	<!-- <div id='body'> -->
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
						include('main_menu.php');
					?>
					<div class='login_href'></div>
					<div id='login_form'>
						<input type='text' placeholder='имя'>
						<input type='password' placeholder='пароль'>
						<button type='button'>Войти</button>
					</div>
				</nav>  <!-- #main menu  -->
			</div>
			<div id='breadcrumbs'>
				<?php
					$this->widget('zii.widgets.CBreadcrumbs',
									array(
										'homeLink' => CHtml::link('Главная', Yii::app()->homeUrl),
										'separator' => '<b> » </b>',
										'links'=>$this->breadcrumbs,
									)
					);
					//echo Utils::GetUserlIp();
				?>

			</div>		<!-- breadcrumbs -->
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
			</div>		<!-- links -->

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

	<a id="to_bottom" href='#footer'>
		<div>
		</div>
	</a>
	<a id="to_top" href='#header'>
		<div>
		</div>
	</a>
	<!-- </div> -->    <!-- #body  -->
</body>
</html>