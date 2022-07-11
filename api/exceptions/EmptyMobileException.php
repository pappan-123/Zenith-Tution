<?php

	require_once __DIR__.'/../constants/HTTPStatus.php';
	require_once __DIR__.'/../constants/Messages.php';
	require_once __DIR__.'/InvalidMobileException.php';	


	class EmptyMobileException extends InvalidMobileException{

		public function __construct($key = "mobile", $userFriendlyMessage = Messages::EMPTY_MOBILE, $message = Messages::MISSING_VALUE, $code = HTTPStatus::BAD_REQUEST, Exception $previous = null){
			
			parent::__construct($key, $userFriendlyMessage, $message, $code, $previous);

		}
	}


?>