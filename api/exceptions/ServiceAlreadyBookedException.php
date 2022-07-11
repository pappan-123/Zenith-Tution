<?php

	require_once __DIR__.'/../constants/HTTPStatus.php';
	require_once __DIR__.'/../constants/Messages.php';
	require_once __DIR__.'/GenericException.php';	

	class ServiceAlreadyBookedException extends GenericException{

		public function __construct($userFriendlyMessage = Messages::SLOT_ALREADY_BOOKED, $message = Messages::SLOT_ALREADY_BOOKED, $code = HTTPStatus::STATUS_OK, Exception $previous = null){
			
			parent::__construct($userFriendlyMessage, $message, $code, $previous);

		}

	}


?>