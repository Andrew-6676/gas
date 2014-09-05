<!DOCTYPE HTML>
<html lang="ru">
<head>
	<meta name="description" content="<?php echo $this->description; ?>" />
	<meta name="keywords" content="<?php echo $this->keywords; ?>"/>
	<meta charset="utf-8">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<!--[if lt IE9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if lt IE 9]>
 		<script>
  		var e = ("article,aside,figcaption,figure,footer,header,hgroup,nav,section,time").split(',');
  		for (var i = 0; i < e.length; i++) {
    		document.createElement(e[i]);
  		}
 		</script>
<![endif]-->
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
	 		<div class="left_ear"></div>
			<div class="right_ear"></div>

			<div class='left_logo'>
			</div>

			<div class='logo_wrapper'>
				<div class='top_logo'>

					<div class='slogan'>БЕЗАВАРИЙНОЕ И БЕСПЕРЕБОЙНОЕ ОБЕСПЕЧЕНИЕ ГАЗОМ ПОТРЕБИТЕЛЕЙ<?php echo ''; ?></div>
					<!-- <div class='search'> -->
					<form name='search' method='GET' action='<?php echo Yii::app()->createUrl("/site/search") ;?>' >
						<input name='str' id='search_input' type='text' placeholder='Поиск'>
						<input type="submit" style='display:none'>
					</form>
					<!-- </div> -->
				</div>
			</div>    <!-- end logo_wrapper -->

			<div class='menu_wrapper'>
				<nav id="main_menu">
					<?php
						//подключаем главное меню
					include('main_menu.php');

					if (!Yii::app()->user->isGuest):
					?>
						<div class='login_href login'></div>
					<?php
					else:
					?>
						<div class='login_href'></div>
					<?php
					endif;
					?>
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



<?php
						// если пользователь авторизован
					if (!Yii::app()->user->isGuest):
					?>
						<!-- <div class='login_href login'></div> -->
						<div id='login_form' class='logout'>
						<?php
							echo 'Вы вошли как ';
							echo '<span class="name">'.Yii::app()->user->name.'</span><br> [id=';
							echo Yii::app()->user->id.',';
							echo 'gr='.implode(',',Yii::app()->user->roles).']';

							if (Yii::app()->user->id < 0) {
								echo '<br>'.CHtml::link('Админка сайта', array('admin/index'));
								echo '<br>'.CHtml::link('PhpMyAdmin', array('../phpmyadmin'), array('target'=>'_blank'));
							}

							echo CHtml::ajaxSubmitButton('Выход', Yii::app()->createURL('site/logout'),
											array(
										        'type' => 'POST',
										        'success'=>'js:function(data){
										        		//alert("="+data.trim()+"=");
										                if (data.trim()=="1"){
										                        document.location.search="site/index"
										                		//location.reload();
										                }else{
										                      $("#result").html(data);
										                      $("#result").show();
										                }
										        }'
										    ),
									        array('class'=>'button')
							        );
						?>
						</div>

					<?php
						// если НЕ авторизован
					else:
					?>
						<!-- <div class='login_href'></div> -->
						<div id='login_form'>
							<span id='result'></span>
							<form action='<?php echo Yii::app()->createURL('site/login') ?>' method='POST'>
								<?php
									$model = new LoginForm();
									$form = $this->beginWidget('CActiveForm');
										//echo '<div class="row">';
								       // echo $form->label($model,'login');
								    	echo $form->textField($model,'login', array('placeholder'=>'Логин'));
										echo $form->passwordField($model,'pass', array('placeholder'=>'Пароль')) ;
							    ?>
									<!-- span><a href='<?php echo Yii::app()->createURL('site/register') ?>' >[Регистрация]</a></span -->
								<?php
									echo CHtml::ajaxSubmitButton('Вход', Yii::app()->createURL('site/login'),
											array(
										        'type' => 'POST',
										        'success'=>'js:function(data){
										        		//alert("="+data.trim()+"=");
										                if (data.trim()=="1"){
										                        //document.location.search="site/index"
										                		location.reload();
										                }else{
										                      $("#result").html(data);
										                      $("#result").show();
										                }
										        }'
										    ),
									        array('class'=>'button')
							        );
							    $this->endWidget();
						        ?>
						</div>	<!-- login_form -->
					<?php endif; ?>




		<div class='content'>
			<?php
				// Utils::print_r(Yii::app()->user->roles,false);
				echo $content;
			?>
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