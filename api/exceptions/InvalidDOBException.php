<?php

	require_once __DIR__.'/../constants/HTTPStatus.php';
	require_once __DIR__.'/../constants/Messages.php';
	require_once __DIR__.'/InvalidValueException.php';	


	class InvalidDOBException extends InvalidValueException{

		public function __construct($key = "dob", $userFriendlyMessage = Messages::INVALID_DOB, $message = Messages::INVALID_VALUE, $code = HTTPStatus::BAD_REQUEST, Exception $previous = null){
			
			parent::__construct($key, $userFriendlyMessage, $message, $code, $previous);

		}
	}


?>