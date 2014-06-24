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
				<a href="ya.by">
					<img src="./images/slide/top/slide_11.png" alt="slide_11" title="slide_11" id="wows1_0"/>
				</a>
				go to ya.ru! dfasdf asdf asdfa fasdf asdf ads!<br>
				adfasd asdf asdf asdf sdf.
			</li>

			<li>
				<a href="yandex.tut.by">
					<img src="./images/slide/top/slide_3.png" alt="slide_33" title="slide_33" id="wows1_1"/>
				</a>
				go to xy! 23435 wrw sgtw3413452 df351 r!<br>
				adfasd asdf asdf asdf sdf.
			</li>

			<li>
				<a href="google.ru">
					<img src="./images/slide/top/slide_2.png" alt="slide_2" title="slide_2" id="wows1_2"/>
				</a>
				goggl rulit
			</li>

			<li>
				<img src="./images/slide/top/slide_3.png" alt="slide_3" title="slide_3" id="wows1_3"/>
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

<!-- ************************************************************** -->
	<!-- слайдшоу по безопасности-->
	<div class='l_content'>
		<div id='slide'>

			<ul id="slideshow">
				<li>
					<h3>TinySlideshow v1</h3>
					<span>./images/slide/ohr/ohr1.png</span>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ut urna. Mauris nulla. Donec nec mauris. Proin nulla dolor, bibendum et, dapibus in, euismod ut, felis.</p>
					<a href="#"><img src="./images/slide/ohr/thumbs/ohr1.png" alt="Orange Fish" /></a>
				</li>
				<li>
					<h3>Sea Turtle</h3>
					<span>./images/slide/ohr/ohr2.jpg</span>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ut urna. Mauris nulla. Donec nec mauris. Proin nulla dolor, bibendum et, dapibus in, euismod ut, felis.</p>
					<img src="./images/slide/ohr/thumbs/ohr2.jpg" alt="Sea Turtle" />
				</li>
				<li>
					<h3><a href='ya.ry' target='_blank'>Red Coral</a></h3>
					<span>./images/slide/ohr/ohr3.jpg</span>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ut urna. Mauris nulla. Donec nec mauris. Proin nulla dolor, bibendum et, dapibus in, euismod ut, felis.</p>
					<a href="#"><img src="./images/slide/ohr/thumbs/ohr3.jpg" alt="Red Coral" /></a>
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
				</div>

				<div id="thumbnails">
					<div id="slideleft" title="Slide Left"></div>
					<div id="slidearea">
						<div id="slider"></div>
					</div>
					<div id="slideright" title="Slide Right"></div>
				</div>
		</div>

		<!-- script type="text/javascript" src="compressed.js"></script -->
		<script type="text/javascript">
			$$('slideshow').style.display='none';
			$$('wrapper').style.display='block';
			var slideshow=new TINY.slideshow("slideshow");
			window.onload=function(){
				slideshow.auto=true;
				slideshow.speed=5;
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
		</div>
	</div>  <!-- l_content -->

<!-- ************************************************************** -->

	<div class='r_content'>
		<div class='l_menu'>
			<a href='sdfd'>
				<div class='item i1'>
					<span class='wr_animation_bg'><span class='animation_bg'></span></span>
					<div>Нормативно - правовые<br> акты</div>
				</div></a>
			<a href='sdfd'>
					<div class='item i2'>
						<span class='wr_animation_bg'><span class='animation_bg'></span></span>
						<div>Цены на<br> газ</div>
					</div>
				</a>
			<a href='sdfd'>
				<div class='item i3'>
					<span class='wr_animation_bg'><span class='animation_bg'></span></span>
					<div>Это должен знать каждый</div>
				</div>
			</a>
		</div>
		<div class='r_menu'>
			<a href='sdf'>
				<div class='item i1'>
					<span class='wr_animation_bg'><span class='animation_bg'></span></span>
					<div>Полезная информация</div>
				</div>
			</a>
			<a href='df'>
				<div class='item i2'>
					<span class='wr_animation_bg'><span class='animation_bg'></span></span>
					<div>Вакансии</div>
				</div>
			</a>
			<a href='asdf'>
				<div class='item i3'>
					<span class='wr_animation_bg'><span class='animation_bg'></span></span>
					<div>Бла-бла-бла</div>
				</div>
			</a>
		</div>
	</div>  <!-- r_content -->

<!-- ************************************************************** -->

</div>

<script type="text/javascript" src="./js/slide/wowslider.js"></script>
<script type="text/javascript" src="./js/slide/script_banner.js"></script>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>