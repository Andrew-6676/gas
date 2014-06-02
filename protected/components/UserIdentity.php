<?php
class UserIdentity extends CUserIdentity
{
    private $_id;
    public function authenticate()
    {
    		// выбираем из базы пользователя по имени
    		// $this->username и $this->password - берутся из конструктора
        $record=User::model()->findByAttributes(array('login'=>$this->username));

        if($record===null)
        		// если нет такого пользователя
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else // если логин есть - проверяем пароль
        	//if(!CPasswordHelper::verifyPassword($this->password,$record->pass))
        	if($this->password!=$record->pass)
        			// если пароль неверный
            	$this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {		// если всё правильно ввёл пользователь
            $this->_id=$record->id;
            //$this->setState('title', $record->title);
            $this->errorCode=self::ERROR_NONE;
        }

        return !$this->errorCode;
    }

    public function getId()
    {
        return $this->_id;
    }
}