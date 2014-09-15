<?php
	$this->addCss('page/page.css');
	$this->addCss('admin/index.css');

 	$this->addJs('admin/index.js');

 	$users = User::model()->findAll();
?>
<div class='page'>

<h1>
Админка
</h1>
	
	<div class='admin_menu'>
		<a href="#roles">Группы</a><br>
		<a href="#users">Пользователи</a><br>
		<a href="#pass">Пароль администратора</a><br>
		<a href="#pages">Страницы</a><br>
		<a href="#menu">Меню</a><br>
	</div>
		
<br>
<br>

<center><h2 id='roles'>Группы</h2></center>
<div class='border'>

<?php
	$groups = Group::model()->findAll();
	foreach ($groups as $group) {
		echo '<b>'.$group->name.'</b> ('.$group->descr.')<br>' ;
	}
	echo '<br>+<a href="#">Добавить группу</a>';
?>

</div>		<!-- border -->

<center><h2 id='users'>Пользователи и группы</h2></center>
<div class='border'>

	<?php

	foreach ($users as $user) {
		// Utils::print_r($user, false);
		echo '<b>'.$user->login.'</b> ('.$user->fio.')';
		echo '<br>';
		// Utils::print_r($user->groups, false);

		foreach ($user->groups as $group) {
			echo '&nbsp&nbsp&nbsp&nbsp&nbsp <u>'.$group->idGroup->name.'</u> ('.$group->idGroup->descr.') [<a href="#">убрать из группы</a>]';
			echo '<br>';
		}
		echo '&nbsp&nbsp&nbsp&nbsp&nbsp+ <a href="#">включить в новую группу</a>';
		echo '<br>';
		echo '<br>';
	}
	echo '<br>+ <a href="#">Добавить нового пользователя</a>';

	?>

</div>		<!-- border -->


<center><h2 id='pass'>Сменить логин/пароль</h2></center>
<div class='border'>
	<input placeholder='Логин' value='<?php echo Yii::app()->user->name; ?>'>
	<br><br>
	<input placeholder='Текущий пароль'>
	<br>
	<input placeholder='Новый пароль'>
	<br>
	<input placeholder='Новый пароль повтор'>
	<br>
	<button>Сохранить</button>
</div>		<!-- border -->


<center><h2  id='pages'>Страницы</h2></center>
<div class='border'>

	<table class='pages'>
		<br>+<a href="#">Добавить страницу</a><br><br>
		<?php
			$criteria = new CDbCriteria;
     		$criteria->order ='edit_date desc';
			$pages = Page::model()->findAll($criteria);
			foreach ($pages as $page) {
				echo '<tr>';
					echo '<td><a href="'.Yii::app()->createUrl('page?'.$page->name).'">'.$page->name_ru.'</a></td>';
					//echo '<td> ('.$page->name.')</td>';
					echo '<td> ['.date('d-m-Y H:i',strtotime($page->edit_date)).']</td>';
					echo '<td><a href="'.Yii::app()->createUrl('editor/index/page/'.$page->name).'">Править</a></td>';
					echo '<td><button>Удалить</button></td>';
				echo '</tr>';
			}
			
		?>
	</table>
</div>		<!-- border -->

<center><h2 id='menu'>Меню</h2></center>
<div class='border'>


</div>	

</div>		<!-- page -->