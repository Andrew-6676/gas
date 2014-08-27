<?php
	$this->addCss('page/page.css');
	$this->addCss('admin/index.css');

 	$this->addJs('admin/index.js');

 	$users = User::model()->findAll();
?>

<h1>
Админка
</h1>

<div class='border'>
	<center><h2>Пользователи и группы</h2></center>

	<?php

	foreach ($users as $user) {
		// Utils::print_r($user, false);
		echo '<b>'.$user->login.'</b> ('.$user->fio.')';
		echo '<br>';
		// Utils::print_r($user->groups, false);

		foreach ($user->groups as $group) {
			echo '&nbsp&nbsp&nbsp&nbsp&nbsp '.$group->idGroup->name.' ('.$group->idGroup->descr.')';
			echo '<br>';
		}
		echo '<br>';
		echo '&nbsp&nbsp&nbsp&nbsp&nbsp+ <a href="#">включить в новую группу</a>';
		echo '<br>';
		echo '<br>';
	}
	echo '<br>+ <a href="#">Добавить нового пользователя</a>';

	?>

</div>

<div class='border'>
<center><h2>Группы</h2></center>

<?php
	$groups = Group::model()->findAll();
	foreach ($groups as $group) {
		echo '<b>'.$group->name.'</b> ('.$group->descr.')<br>' ;
	}
	echo '<br>+<a href="#">Добавить группу</a>';
?>

</div>

<div class='border'>
</div>