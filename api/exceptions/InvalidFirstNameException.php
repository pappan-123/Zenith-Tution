<?php

	require_once __DIR__.'/../responses/BasicResponse.php';
	require_once __DIR__.'/../constants/HTTPStatus.php';
	require_once __DIR__.'/../constants/Messages.php';
	require_once __DIR__.'/InvalidValueException.php';	


	class InvalidFirstNameException extends InvalidValueException{

		public function __construct($key = "firstName", $userFriendlyMessage = Messages::INVALID_FIRST_NAME, $message = Messages::INVALID_VALUE, $code = HTTPStatus::BAD_REQUEST, Exception $previous = null){
			
			parent::__construct($key, $userFriendlyMessage, $message, $code, $previous);

		}
	}


?>