<?php
class UserIdentity extends CUserIdentity
{
    private $_id;
    private $_active;

    public function authenticate()
    {
    		// выбираем из базы пользователя по имени
    		// $this->username и $this->password - берутся из конструктора
        $record = User::model()->findByAttributes(array('login'=>$this->username));
        //Utils::print_r($this->username);
        if($record===null)
        		// если нет такого пользователя
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else // если логин есть - проверяем пароль
        	//if(!CPasswordHelper::verifyPassword($this->password,$record->pass))
        	if (md5($this->password) != $record->pass)
        			// если пароль неверный
            	$this->errorCode = self::ERROR_PASSWORD_INVALID;
        else
        {		// если всё правильно ввёл пользователь
            $this->_id = $record->id;
            $this->_active = $record->active;
            $this->errorCode = self::ERROR_NONE;
        }

        return !$this->errorCode;
    }
/*--------------------------------------------------------*/
    public function getId()
    {
        return $this->_id;
    }
/*--------------------------------------------------------*/
    public function getStatus()
    {
        if ($this->_active==1) {
            return true;
        } else {
            return false;
        }

    }
/*--------------------------------------------------------*/
}