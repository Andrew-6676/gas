<?php

class galeryAction extends CAction /* pageController */
{
    public function run()
	{

		$admin = Yii::app()->user->id<0;
		$f_model = new GaleryAdminForm();

		if (Yii::app()->request->isAjaxRequest)
		{

				// если админ нажал УДАЛИТЬ
			if (isset($_POST['del'])) {

				Yii::app()->end();
			}

		   /*---Загрузка изображения ---------------------*/
			//if (isset($_POST['GaleryAdminForm']))
			{
				// echo "upload\n";
				// Utils::print_r($_POST,false);
				// Utils::print_r($_FILES, false);

				Yii::import("ext.EAjaxUpload.qqFileUploader");
                $folder='public/galery/';// folder for uploaded files
                $allowedExtensions = array("jpg","jpeg","gif","png");
                $sizeLimit = 10 * 1024 * 1024;// maximum file size in bytes
                $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
                $result = $uploader->handleUpload($folder, true /* разрешить замену файла */);

                if ($result['success']==true) {
                // 	// gпо идее здесь надо сохранить картинку в БД
                	$galery = new Galery;

					$galery->name = htmlspecialchars('test');
					$galery->fname = htmlspecialchars($result['filename']);
					$galery->url = htmlspecialchars(Yii::app()->createUrl('/public/galery'));
					$galery->descr = htmlspecialchars('uploaded');

                	if ($galery->save()) {
                		$result['saved'] = true;
                	} else {
                		$result['saved'] = false;
                	}
                }

                $result=htmlspecialchars(json_encode($result), ENT_NOQUOTES);
                echo $result;// it's array



				Yii::app()->end();
			}

				//Yii::app()->end();
		}


		$model = Galery::model()->findAll();

			// рендерим страницу
		$this->controller->render('galery',
								   array(
								   		'model' => $model,
								   		'admin'=>$admin,
								   		'f_model'=>$f_model,
								   )
		);
	}
/*------------------------------------------------------------------------------------*/


}



/*

<?php


$files1 = getImages($sys_path);

?>



<?php
	foreach ($files1 as $img) {
		//if (substr($img['img'],0,6)=='small_') {
	?>
			<img height="150" src='<?php echo $img['path']."/small_".$img['img']; ?>'>
	<?php
		//}
	}
?>
<br><br>
<?php
	Utils::print_r(scanDir($sys_path), false);
echo '<br><br>';
$files1 = getImages($sys_path);

Utils::print_r($files1, false);
?>

</div>


<?php




function getImages($startDir='<empty>') {
	//echo $startDir;
	$img_arr = array();
	chdir($startDir);
	$files = scandir($startDir);

	foreach ($files as $f) {
		if (!is_dir($f) && substr($f, 0, 1)!='.' && substr($f,0,6)!='small_') {
			$img_arr[] = array('img'=>$f, 'path'=>Yii::app()->createUrl(Yii::app()->params['galery_httppath']));
		}
	}

	return $img_arr;
}
?>*/