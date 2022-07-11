<?php

	require_once __DIR__.'/../constants/HTTPStatus.php';
	require_once __DIR__.'/../constants/Messages.php';
	require_once __DIR__.'/InvalidValueException.php';	


	class InvalidTokenException extends InvalidValueException{

		public function __construct($userFriendlyMessage = Messages::UNAUTHORIZED, $message = Messages::INVALID_TOKEN, $code = HTTPStatus::UNAUTHORIZED, Exception $previous = null){
			
			parent::__construct("", $userFriendlyMessage, $message, $code, $previous);

		}

	}


?>