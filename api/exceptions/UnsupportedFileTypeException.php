<?php

	require_once __DIR__.'/../constants/HTTPStatus.php';
	require_once __DIR__.'/../constants/Messages.php';
	require_once __DIR__.'/GenericException.php';	



	class UnsupportedFileTypeException extends GenericException{

		public function __construct($userFriendlyMessage = Messages::SOMETHING_WENT_WRONG, $message = Messages::UNSUPPORTED_FILE_TYPE, $code = HTTPStatus::BAD_REQUEST, Exception $previous = null){
			
			parent::__construct($userFriendlyMessage, $message, $code, $previous);

		}
	}


?>