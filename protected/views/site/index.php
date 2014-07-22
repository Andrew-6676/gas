<?php
	$this->pageTitle='Главная ПУ "Витебскгаз"';
	$this->addCSS('site/index.css');
	$this->addCSS('slide/style_banner.css');
	$this->addCSS('slide/style_tinyslide.css');
	$this->addJS('slide/TinySlide.js');
?>
<!-- слайдшоу вверху страницы -->
<div id="wowslider-container1">

	<div class="ws_images">
		<ul>

			<li>
				<a href="<?php echo Yii::app()->createUrl('site/page'); ?>">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slide/top/slide_11.png" alt="slide_11" title="Здесь могла быть ваша реклама" id="wows1_0"/>
				</a>
			</li>

			<li>
				<a href="<?php echo Yii::app()->createUrl('site/page'); ?>">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slide/top/slide_3.png" alt="slide_33" title="Заголовок фотографии" id="wows1_1"/>
				</a>
				Краткое описание. Небольшой текст. Любая текстовая информация. <br>
				Может отсутствовать полностью.

			</li>

			<li>
				<a href="<?php echo Yii::app()->createUrl('site/page'); ?>">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slide/top/slide_2.png" alt="slide_2" title="Заголовок" id="wows1_2"/>
				</a>
				Картинка является ссылкой - по клику по ней можно перейти на заданный адрес (например, другая страница сайта)<br>
				Здесь можно написать всё что угодно.<br>
				Можно вставлять ссылки, нпример на <a href='http://ya.ru'>Яндекс</a>
			</li>

			<li>
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slide/top/slide_3.png" alt="slide_3" title="" id="wows1_3"/>
			</li>

		</ul>
	</div>

	<div class="ws_bullets">
		<div>
		</div>
		<script type="text/javascript">
			var aa = $('.ws_images img');
			aa.each(function(i, el) {
				// $('.ws_bullets div').append('<a href="#" title="'+el.attr('title')+'">.</a>');
				$('.ws_bullets div').append('<a href="#">.</a>');
			})
		</script>
	</div>

	<div class="ws_shadow"></div>
</div>

<!-- **конец слайдшоу вверху страницы*************************************************************** -->


<div class='c_wrapper'>
	<div class='c_left'>
		<div class='c_left_ear'></div>
		БЕЗОПАСНОСТЬ
	</div>

	<div class='c_right'>
		<div class='c_right_ear'></div>
		АБОНЕНТАМ
	</div>
</div>

<div class='l_r_wrapper'>
<!-- ************************************************************** -->
	<!-- слайдшоу по безопасности-->
	<div class='l_content'>
		<div id='slide'>

			<ul id="slideshow">
				<li>
					<h3>Заголовок фотографии 1</h3>
					<span><?php echo Yii::app()->request->baseUrl; ?>/images/slide/ohr/ohr1.png</span>
					<p>Здесь можно разместить любой текст<br>А можно и не размещать.</p>
					<a href="<?php echo Yii::app()->createUrl('site/page'); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slide/ohr/thumbs/ohr1.png" alt="Orange Fish" /></a>
				</li>
				<li>
					<h3>Заголовок фотографии 2</h3>
					<span><?php echo Yii::app()->request->baseUrl; ?>/images/slide/ohr/ohr2.jpg</span>
					<p></p>
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slide/ohr/thumbs/ohr2.jpg" alt="Sea Turtle" />
				</li>
				<li>
					<h3><a href='<?php echo Yii::app()->createUrl('site/page'); ?>' target='_blank'>Заголовок может быть ссылкой</a></h3>
					<span><?php echo Yii::app()->request->baseUrl; ?>/images/slide/ohr/ohr3.jpg</span>
					<p>сама картинка является ссылкой</p>
					<a href="<?php echo Yii::app()->createUrl('site/page'); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slide/ohr/thumbs/ohr3.jpg" alt="Red Coral" /></a>
				</li>
				<li>
					<h3><a href='<?php echo Yii::app()->createUrl('site/page'); ?>' target='_blank'>Газ - это вам не шутки!</a></h3>
					<span><?php echo Yii::app()->request->baseUrl; ?>/images/slide/ohr/ohr5.jpg</span>
					<p>Не стоит открывать газ, и аытаться зажеь его спустя длительное время </p>
					<a href="<?php echo Yii::app()->createUrl('site/page'); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slide/ohr/thumbs/ohr5.jpg" alt="Babah" /></a>
				</li>
				<li>
					<h3>Заголовок</h3>
					<span><?php echo Yii::app()->request->baseUrl; ?>/images/slide/ohr/ohr4.jpg</span>
					<p>текст</p>
					<a href="<?php echo Yii::app()->createUrl('site/page'); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slide/ohr/thumbs/ohr4.jpg" alt="Bla-bla-bla" /></a>
				</li>
				<li>
					<h3>Плакат</h3>
					<span><?php echo Yii::app()->request->baseUrl; ?>/images/slide/ohr/ohr6.jpg</span>
					<p></p>
					<a href="<?php echo Yii::app()->createUrl('site/page'); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slide/ohr/thumbs/ohr6.jpg" alt="Bla-bla-bla" /></a>
				</li>
			</ul>

			<div id="wrapper">
					<div id="fullsize">
						<div id="imgprev" class="imgnav" title="Previous Image"></div>
						<div id="imglink"></div>
						<div id="imgnext" class="imgnav" title="Next Image"></div>
						<div id="image"></div>
						<div id="information">
							<h3></h3>
							<p></p>
						</div>
					</div>		<!-- fullsize -->

					<div id="thumbnails">
						<div id="slideleft" title="Slide Left"></div>
						<div id="slidearea">
							<div id="slider"></div>
						</div>
						<div id="slideright" title="Slide Right"></div>
					</div>		<!-- thumbnails -->
			</div>		<!-- wrapper -->

		<!-- script type="text/javascript" src="compressed.js"></script -->
			<script type="text/javascript">
				$$('slideshow').style.display='none';
				$$('wrapper').style.display='block';
				var slideshow=new TINY.slideshow("slideshow");
				window.onload=function(){
					slideshow.auto=true;
					slideshow.speed=10;
					slideshow.link="linkhover";
					slideshow.info="information";
					slideshow.thumbs="slider";
					slideshow.left="slideleft";
					slideshow.right="slideright";
					slideshow.scrollSpeed=4;
					slideshow.spacing=5;
					slideshow.active="#f00";
					slideshow.init("slideshow","image","imgprev","imgnext", "imglink");
				}
			</script>
		</div>		<!-- slide -->
	</div>  <!-- l_content -->

<!-- ************************************************************** -->

	<div class='r_content'>
		<div class='l_menu'>
			<a href='<?php echo Yii::app()->createUrl('site/page'); ?>'>
				<div class='item i1'>
					<span class='wr_animation_bg'><span class='animation_bg'></span></span>
					<div>Нормативно-<br>правовые<br> акты</div>
				</div>
			</a>
			<a href='<?php echo Yii::app()->createUrl('site/page/gasprice'); ?>'>
					<div class='item i2'>
						<span class='wr_animation_bg'><span class='animation_bg'></span></span>
						<div>Цены на<br> газ</div>
					</div>
				</a>
			<a href='<?php echo Yii::app()->createUrl('site/page/mustknow'); ?>'>
				<div class='item i3'>
					<span class='wr_animation_bg'><span class='animation_bg'></span></span>
					<div>Это должен<br>знать<br>каждый</div>
				</div>
			</a>
		</div>
		<div class='r_menu'>
			<a href='<?php echo Yii::app()->createUrl('site/page'); ?>'>
				<div class='item i1'>
					<span class='wr_animation_bg'><span class='animation_bg'></span></span>
					<div>Полезная информация</div>
				</div>
			</a>
			<a href='<?php echo Yii::app()->createUrl('site/page'); ?>'>
				<div class='item i2'>
					<span class='wr_animation_bg'><span class='animation_bg'></span></span>
					<div>Вакансии</div>
				</div>
			</a>
			<a target='_blank' href='http://e.gas.by/'>
				<div class='item i3'>
					<span class='wr_animation_bg'><span class='animation_bg'></span></span>
					<div>Заказ баллона</div>
				</div>
			</a>
		</div>		<!-- r_menu -->
	</div>  <!-- r_content -->

<!-- ************************************************************** -->
</div>		<!-- l_r_wrapper -->

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/slide/wowslider.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/slide/script_banner.js"></script>

