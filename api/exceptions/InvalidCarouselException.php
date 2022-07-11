<?php

	require_once __DIR__.'/../constants/HTTPStatus.php';
	require_once __DIR__.'/../constants/Messages.php';
	require_once __DIR__.'/GenericException.php';


	class InvalidCarouselException extends GenericException{

		public function __construct($userFriendlyMessage = "Invalid carousel", $message = "Invalid carousel", $code = HTTPStatus::BAD_REQUEST, Exception $previous = null){
			
			parent::__construct($userFriendlyMessage, $message, $code, $previous);

		}

	}


?>