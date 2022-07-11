<?php

	require_once __DIR__.'/../constants/HTTPStatus.php';
	require_once __DIR__.'/../constants/Messages.php';
	require_once __DIR__.'/InvalidEmailException.php';	


	class EmptyEmailException extends InvalidEmailException{

		public function __construct($key = "lastName", $userFriendlyMessage = Messages::EMPTY_EMAIL, $message = Messages::MISSING_VALUE, $code = HTTPStatus::BAD_REQUEST, Exception $previous = null){
			
			parent::__construct($key, $userFriendlyMessage, $message, $code, $previous);

		}
	}


?>