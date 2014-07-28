<?php

class LoginForm extends CFormModel
{
    public $login;
    public $pass;
    //public $rememberMe=false;

	public $_identity;

    public function rules()
    {
        return array(
            array('login, pass', 'required', 'message'=>'Заполните все поля!'),
            array('pass', 'authenticate'),
        );
    }

/*---------------------------------------------------------------------*/
   // public function required($attribute, $params) {
   // 		if ($this->login=='' || $this->pass=='') {
   // 			$this->addError('pass', 'Заполните все поля!');
   // 		}

   // }
/*---------------------------------------------------------------------*/
    public function authenticate($attribute, $params)
    {
     		// проверяем логин/пароль
    	//if ()
        $this->_identity = new UserIdentity($this->login, $this->pass);
        if(!$this->_identity->authenticate()) {
        	$this->addError('pass', 'Неправильное имя пользователя или пароль.');
        } else {
        	//Utils::print_r($this->_identity->getStatus());
        	if (!$this->_identity->getStatus()) {
        		$this->addError('pass', 'Учётная запись отключена.');
        	}
        }
    }
/*---------------------------------------------------------------------*/
    public function attributeLabels()
    {
        return array(
            'login' => 'Логин',
            'pass' => 'Пароль'
        );
    }
}