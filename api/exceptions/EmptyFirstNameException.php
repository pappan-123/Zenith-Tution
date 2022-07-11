<?php

	require_once __DIR__.'/../constants/HTTPStatus.php';
	require_once __DIR__.'/../constants/Messages.php';
	require_once __DIR__.'/InvalidFirstNameException.php';	


	class EmptyFirstNameException extends InvalidFirstNameException{

		public function __construct($key = "firstName", $userFriendlyMessage = Messages::EMPTY_FIRST_NAME, $message = Messages::MISSING_VALUE, $code = HTTPStatus::BAD_REQUEST, Exception $previous = null){
			
			parent::__construct($key, $userFriendlyMessage, $message, $code, $previous);

		}
	}


?>