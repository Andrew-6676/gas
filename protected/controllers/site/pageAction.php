<?php

class pageAction extends CAction /* GuestBookController */
{

    public function run()
	{
		//Utils::print_r(key($_GET));
		$data ='';
		if (sizeof($_GET)==0) {
			$data = 'Страница-заглушка. Когда-нибудь здесь появится контент. Наберитесь терпения :)';
		} else {
			switch (key($_GET)) {
				case 'strukt':
					$data = 'Страница со структурой руководства<br>';
					break;

				default:
					# code...
					break;
			}
		}
		$this->controller->render('page', array('data'=>$data));
	}
}