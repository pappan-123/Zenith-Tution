<?php

	require_once __DIR__.'/../constants/HTTPStatus.php';
	require_once __DIR__.'/../constants/Messages.php';
	require_once __DIR__.'/GenericException.php';	


	class UnauthorizedAccessException extends GenericException{

		public function __construct($userFriendlyMessage = Messages::UNAUTHORIZED_ACCESS, $message = Messages::UNAUTHORIZED_ACCESS, $code = HTTPStatus::UNAUTHORIZED, Exception $previous = null){
			
			parent::__construct($userFriendlyMessage, $message, $code, $previous);

		}

	}


?>