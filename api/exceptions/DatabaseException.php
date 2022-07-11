<?php

	require_once __DIR__.'/../constants/HTTPStatus.php';
	require_once __DIR__.'/../constants/Messages.php';
	require_once __DIR__.'/GenericException.php';


	class DatabaseException extends GenericException{

		public function __construct($userFriendlyMessage = Messages::SOMETHING_WENT_WRONG, $message = Messages::INCONSISTENT_DB, $code = HTTPStatus::INTERNAL_SERVER_ERROR, Exception $previous = null){
			
			parent::__construct($userFriendlyMessage, $message, $code, $previous);

		}

	}


?>