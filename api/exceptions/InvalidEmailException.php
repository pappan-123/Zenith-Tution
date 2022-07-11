<?php

	require_once __DIR__.'/../constants/HTTPStatus.php';
	require_once __DIR__.'/../constants/Messages.php';
	require_once __DIR__.'/InvalidValueException.php';	


	class InvalidEmailException extends InvalidValueException{

		public function __construct($key = "emailId", $userFriendlyMessage = Messages::INVALID_EMAIL, $message = Messages::INVALID_VALUE, $code = HTTPStatus::BAD_REQUEST, Exception $previous = null){
			
			parent::__construct($key, $userFriendlyMessage, $message, $code, $previous);

		}
	}


?>