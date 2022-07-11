<?php

	require_once __DIR__.'/../constants/HTTPStatus.php';
	require_once __DIR__.'/../constants/Messages.php';
	require_once __DIR__.'/DatabaseException.php';


	class DatabaseConnectException extends DatabaseException{

		public function __construct($userFriendlyMessage = Messages::SOMETHING_WENT_WRONG, $message = Messages::DB_CONNECTION_FAILED, $code = HTTPStatus::INTERNAL_SERVER_ERROR, Exception $previous = null){
			
			parent::__construct($userFriendlyMessage, $message, $code, $previous);

		}

	}


?>