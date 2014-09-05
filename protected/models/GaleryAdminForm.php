<?php

class GaleryAdminForm extends CFormModel
{
    public $img;// = array();

    public function rules()
    {
        return array(
           // array('path', 'required'), //, 'message'=>'Поле не может быть пустым!'),
            //array('question', 'minLength'),
            //array('email', 'email', 'message'=>'Некорректный адрес электронной почты!'),
            //array('captcha', 'CaptchaExtendedValidator', 'allowEmpty'=>!Yii::app()->user->isGuest, 'message'=>'Неверно введён код с картинки!' ),
        );
    }

/*---------------------------------------------------------------------*/
    // public function minLength($attribute, $params) {
    // 		if (strlen($this->question)<30) {
    // 			$this->addError('question', 'Слишком короткий вопрос!');
    // 		}
    // }
/*---------------------------------------------------------------------*/
    public function attributeLabels()
    {
        return array(
            'img' => 'Файл',
        );
    }
}