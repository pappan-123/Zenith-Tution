<?php

	require_once __DIR__.'/../constants/HTTPStatus.php';
	require_once __DIR__.'/../constants/Messages.php';
	require_once __DIR__.'/GenericException.php';	



	class InvalidValueException extends GenericException{

		public function __construct($key = "Unknown", $userFriendlyMessage = Messages::INVALID_INPUT, $message = Messages::INVALID_VALUE, $code = HTTPStatus::BAD_REQUEST, Exception $previous = null){
			
			parent::__construct($userFriendlyMessage, $message.$key, $code, $previous);

		}
	}


?>