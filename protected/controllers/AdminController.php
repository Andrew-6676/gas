<?php
class AdminController extends Controller
{

	public function actions()
    {
        return array(
            'index'=>'application.controllers.admin.indexAction',
            // 'mail'=>'application.controllers.site.mailAction',
            // 'login'=>'application.controllers.site.loginAction',
            // 'search'=>'application.controllers.site.searchAction',
            // 'logout'=>'application.controllers.site.logoutAction',
        );
    }

/* ------------------------- фильтры -------------------------*/
	 public function filters()
    {
        return array(
            'accessControl',
        );
    }
/* --------------------------- паравила доступа ---------------*/
public function accessRules()
    {
        return array(
        		// правила просматриваются по порядку до первого совпадения
        	array('allow',
                'actions'=>array('index'),  	// только пользователь "test" получит доступ
                'users'=>array('admin'),					// остальным выдаст ошибку
            ),
            array('deny',
                'actions'=>array('index'),		// запреить всем доступ к "index"
                'users'=>array('*'),					// запрет должен стоять после разрешения
            ),

            // array('deny',
            //     'actions'=>array('delete'),
            //     'roles'=>array('admin'),
            //     'users'=>array('*'),
            // ),
        );
    }

}
