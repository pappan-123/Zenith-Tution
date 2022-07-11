<?php

	require_once __DIR__.'/../constants/HTTPStatus.php';
	require_once __DIR__.'/../constants/Messages.php';
	require_once __DIR__.'/InvalidGenderException.php';	


	class EmptyGenderException extends InvalidGenderException{

		public function __construct($key = "gender", $userFriendlyMessage = Messages::EMPTY_GENDER, $message = Messages::MISSING_VALUE, $code = HTTPStatus::BAD_REQUEST, Exception $previous = null){
			
			parent::__construct($key, $userFriendlyMessage, $message, $code, $previous);

		}
	}


?>