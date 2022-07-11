<?php

	require_once __DIR__.'/../constants/HTTPStatus.php';
	require_once __DIR__.'/../constants/Messages.php';
	require_once __DIR__.'/GenericException.php';


	class AccessLevelException extends GenericException{

		public function __construct($requiredAccessLevel, $foundAccessLevel, $userFriendlyMessage = Messages::UNAUTHORIZED_ACCESS, $message = Messages::UNAUTHORIZED_ACCESS, $code = HTTPStatus::UNAUTHORIZED, Exception $previous = null){
			
			parent::__construct($userFriendlyMessage, "You are trying to access feature/services beyond your scope of acees level.", $code, $previous);

		}

	}


?>