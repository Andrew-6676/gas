Ниже будет выведена инфа из БД c использованием модели GBook: <br><br>
<?php
if (isset($_POST['gbook_mess'])) {
            //echo Yii::app()->request->getPost('gbook_mess').'<br><br>';
			$new_mess = new gbook();
			$new_mess->mess = $_POST['gbook_mess']	;
			$new_mess->save();
            //$this->redirect(array('test/index'));
            $this->redirect(array('index'));
 	}

	/* //добавление записи в таблицу - РАБОТАЕТ!!!
		$model->mess = "Сообщение добавленное из кода\nс помощью модели";
		$model->save();
	*/
		// поиск одной записи
	$result = Gbook::model()->find('id=:id', array(':id'=>5));
	echo $result->id." -> ".$result->mess."<br>";

	$result = Gbook::model()->findByPk(2);
	echo $result->id." -> ".$result->mess."<br>";
		// поменять запись


	$result = Gbook::model()->findBySql('select * from {{gbook}} where id = :id', array(':id'=>3));
	echo $result->id." -> ".$result->mess."<br>";

	$result = Gbook::model()->findByAttributes(array('id' => 4));
	echo $result->id." -> ".$result->mess."<br><br><br>";

// поиск нескольких записей findAll(), findAllByPk(), findAllBySql(), findAllByAttributes() осуществляется точно так же, только вместо одной записи в переменную $result передается массив

	$result = Gbook::model()->findAll('id > :id', array(':id'=>0));
	foreach ($result as $row){
 		echo $row->id."  -->  ".$row->mess."<br>";
	}

	/*
	// обновляем поле города у записи с user_id равной 4
	Users::model()->updateByPk(4, array('user_city' => 'Moscow city'));

	// вместо числа 4 (идентификатора) можно задавать массивы, например вот так:
	$massiveUserId = array(1, 2, 5, 6);
	Users::model()->updateByPk($massiveUserId, array('user_city' => 'London'));

	// обновим поле имени пользователя на 'UPDATE' со значением 'nameUser1'
	Users::model()->updateALL(array('user_name' => 'UPDATE'), 'user_name = :user_name', array(':user_name'=>'nameUser1'));

	// увеличим user_id пользователя на 10 с начальным значением user_id равным 1
	Users::model()->updateCounters(array('user_id'=>10), 'user_id = 1');
	*/

	/*
	// пример удаления по первичному ключу
	Users::model()->deleteByPk(2);

	// удаляем все записи со значением user_id больше 3
	Users::model()->deleteAll('user_id > :user_id', array(':user_id' => 3));
	*/

?>
<br><br>
<form name="gbook" method="post" action="#">
	<fieldset>
		<legend>Добавить комент</legend>
		<textarea placeholder="Текст сообщения" name="gbook_mess"></textarea>
		<br>
		<input type="submit">
	</fieldset>
</form>