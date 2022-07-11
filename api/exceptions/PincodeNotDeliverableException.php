<?php

	require_once __DIR__.'/../constants/HTTPStatus.php';
	require_once __DIR__.'/../constants/Messages.php';
	require_once __DIR__.'/GenericException.php';	

	class PincodeNotDeliverableException extends GenericException{

		public function __construct($userFriendlyMessage = Messages::PINCODE_IS_NOT_DELIVERABLE, $message = Messages::PINCODE_IS_NOT_DELIVERABLE, $code = HTTPStatus::STATUS_OK, Exception $previous = null){
			
			parent::__construct($userFriendlyMessage, $message, $code, $previous);

		}

	}


?>