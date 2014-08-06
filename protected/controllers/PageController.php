<?php
class PageController extends Controller
{

	public function actions()
    {
        return array(
                // сюда будут попадать по адресу /page/<страница>, такая страница создаётся программно
            'quest'=>'application.controllers.page.questAction',
            //'quest_form'=>'application.controllers.page.quest_formAction',
            'strukt'=>'application.controllers.page.struktAction',
                // галерея
            'galery'=>'application.controllers.page.galeryAction',
                // контакты, берутся из БД
            'contact'=>'application.controllers.page.contactAction',
            'vakansii'=>'application.controllers.page.vakansiiAction',
                // сюда будут попадать по адресу /page?<страница>, <страница> будет загружена из БД
            'index'=>'application.controllers.page.indexAction',

                // капча
            'captcha'=>array(
                        'class'=>'CaptchaExtendedAction',
                        'mode' => 'math',    // режимы  math, mathverbal, default, logical, words
                        'density' => '15',      // кол-во точек
                        'lines'   => '7'        // линии
            ),
        );
    }

/*-------------------------------------------------------------------------------*/


/* ------------------------- фильтры -------------------------*
	 public function filters()
    {
        return array(
            'accessControl',
        );
    }
/* --------------------------- паравила доступа ---------------*
public function accessRules()
    {
        return array(
        		// правила просматриваются по порядку до первого совпадения
        	array('allow',
                'actions'=>array('delete','index'),  	// только пользователь "test" получит доступ
                'users'=>array('test'),					// остальным выдаст ошибку
            ),
            array('deny',
                'actions'=>array('index', 'edit'),		// запреить всем доступ к "index"
                'users'=>array('*'),					// запрет должен стоять после разрешения
            ),

            array('deny',
                'actions'=>array('delete'),
                'roles'=>array('admin'),
                'users'=>array('*'),
            ),
        );
    }
*/
}
