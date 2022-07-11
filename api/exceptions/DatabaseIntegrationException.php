<?php

	require_once __DIR__.'/../constants/HTTPStatus.php';
	require_once __DIR__.'/../constants/Messages.php';
	require_once __DIR__.'/DatabaseException.php';


	class DatabaseIntegrationException extends DatabaseException{

		public function __construct($sql = "",$userFriendlyMessage = Messages::SOMETHING_WENT_WRONG, $message = Messages::DB_INTEGRATION_FAILED, $code = HTTPStatus::INTERNAL_SERVER_ERROR, Exception $previous = null){
			
			parent::__construct($userFriendlyMessage, $message." sql =>".preg_replace("/\t|\r|\n/", "", $sql) , $code, $previous);

		}

	}


?>