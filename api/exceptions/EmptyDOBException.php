<?php

	require_once __DIR__.'/../constants/HTTPStatus.php';
	require_once __DIR__.'/../constants/Messages.php';
	require_once __DIR__.'/InvalidDOBException.php';	


	class EmptyDOBException extends InvalidDOBException{

		public function __construct($key = "dob", $userFriendlyMessage = Messages::EMPTY_DOB, $message = Messages::MISSING_VALUE, $code = HTTPStatus::BAD_REQUEST, Exception $previous = null){
			
			parent::__construct($key, $userFriendlyMessage, $message, $code, $previous);

		}
	}


?>