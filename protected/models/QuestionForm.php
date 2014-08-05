<?php

class QuestionForm extends CFormModel
{
    public $question;
    public $name;
    public $email;
    public $captcha;

    //public $rememberMe=false;
	//public $_identity;

    public function rules()
    {
        return array(
            array('question, email, name', 'required', 'message'=>'Поле не может быть пустым!'),
            array('question', 'minLength'),
            array('email', 'email', 'message'=>'Некорректный адрес электронной почты!'),
            array('captcha', 'CaptchaExtendedValidator', /*'allowEmpty'=>!Yii::app()->user->isGuest,*/ 'message'=>'Неверно введён код с картинки!' ),
        );
    }

/*---------------------------------------------------------------------*/
    public function minLength($attribute, $params) {
    		if (strlen($this->question)<30) {
    			$this->addError('question', 'Слишком короткий вопрос!');
    		}
    }
/*---------------------------------------------------------------------*/
    public function attributeLabels()
    {
        return array(
            'question' => 'Ваш вопрос',
            'name' => 'ФИО',
            'email' => 'Электронная почта',
            'captcha' => 'Код с картинки',
        );
    }
}