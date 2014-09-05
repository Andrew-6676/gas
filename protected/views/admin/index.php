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

<center><h2>Группы</h2></center>
<div class='border'>

<?php
	$groups = Group::model()->findAll();
	foreach ($groups as $group) {
		echo '<b>'.$group->name.'</b> ('.$group->descr.')<br>' ;
	}
	echo '<br>+<a href="#">Добавить группу</a>';
?>

</div>		<!-- border -->

<center><h2>Пользователи и группы</h2></center>
<div class='border'>

	<?php

	foreach ($users as $user) {
		// Utils::print_r($user, false);
		echo '<b>'.$user->login.'</b> ('.$user->fio.')';
		echo '<br>';
		// Utils::print_r($user->groups, false);

		foreach ($user->groups as $group) {
			echo '&nbsp&nbsp&nbsp&nbsp&nbsp <u>'.$group->idGroup->name.'</u> ('.$group->idGroup->descr.')';
			echo '<br>';
		}
		echo '&nbsp&nbsp&nbsp&nbsp&nbsp+ <a href="#">включить в новую группу</a>';
		echo '<br>';
		echo '<br>';
	}
	echo '<br>+ <a href="#">Добавить нового пользователя</a>';

	?>

</div>		<!-- border -->


<center><h2>Сменить логин/пароль</h2></center>
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


</div>		<!-- page -->