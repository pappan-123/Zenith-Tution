<?php

	require_once __DIR__.'/../constants/HTTPStatus.php';
	require_once __DIR__.'/../constants/Messages.php';
	require_once __DIR__.'/InvalidValueException.php';	


	class InvalidAddressTypeException extends InvalidValueException{

		public function __construct($key = "name", $userFriendlyMessage = Messages::INVALID_ADDRESS_TYPE, $message = Messages::INVALID_VALUE, $code = HTTPStatus::BAD_REQUEST, Exception $previous = null){
			
			parent::__construct($key, $userFriendlyMessage, $message, $code, $previous);

		}
	}


?>