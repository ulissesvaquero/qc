<?php

class UsuarioIdentity extends CUserIdentity
{
	private $_id;
	
	public function authenticate()
	{
		$record = Usuario::model()->findByAttributes(array('login'=>$this->username));
		if($record===null)
		{
			$this->errorCode=self::ERROR_USERNAME_INVALID;
			$this->errorMessage = "Login Inválido";
		}elseif($record->senha !== $this->password)
		{
			$this->errorMessage = "Senha Inválida";
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}else {
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
