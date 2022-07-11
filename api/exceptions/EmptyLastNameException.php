<?php

	require_once __DIR__.'/../constants/HTTPStatus.php';
	require_once __DIR__.'/../constants/Messages.php';
	require_once __DIR__.'/InvalidLastNameException.php';	


	class EmptyLastNameException extends InvalidLastNameException{

		public function __construct($key = "lastName", $userFriendlyMessage = Messages::EMPTY_LAST_NAME, $message = Messages::MISSING_VALUE, $code = HTTPStatus::BAD_REQUEST, Exception $previous = null){
			
			parent::__construct($key, $userFriendlyMessage, $message, $code, $previous);

		}
	}


?>