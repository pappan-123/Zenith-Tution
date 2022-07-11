<?php

	require_once __DIR__.'/../constants/HTTPStatus.php';
	require_once __DIR__.'/../constants/Messages.php';
	require_once __DIR__.'/GenericException.php';	



	class UploadedFileNotFoundException extends GenericException{

		public function __construct($userFriendlyMessage = Messages::SOMETHING_WENT_WRONG, $message = Messages::UPLOADED_FILE_NOT_FOUND, $code = HTTPStatus::BAD_REQUEST, Exception $previous = null){
			
			parent::__construct($userFriendlyMessage, $message, $code, $previous);

		}
	}


?>