<?php

class galeryAction extends CAction /* pageController */
{
    public function run()
	{

		$img_list = array(
			array('path'=>'http://192.168.152.250/gas/public/galery/', 'img'=>'LOGO.jpg'),
			array('path'=>'http://192.168.152.250/gas/public/galery/', 'img'=>'IMG_1162.jpg'),
			array('path'=>'http://192.168.152.250/gas/public/galery/', 'img'=>'IMG_1153.jpg'),
			array('path'=>'http://192.168.152.250/gas/public/galery/', 'img'=>'IMG_1031.jpg'),
		);

			// рендерим страницу
		$this->controller->render('galery',
								   array(
								   		'img_list'=>$img_list,
								   		//'q_model'=>$q_model,
								   		//'f_model'=>$f_model,
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