<?php

	require_once __DIR__.'/../constants/HTTPStatus.php';
	require_once __DIR__.'/../constants/Messages.php';
	require_once __DIR__.'/GenericException.php';	



	class MissingKeyException extends GenericException{

		public function __construct($key = "Unknown", Exception $previous = null){
			
			parent::__construct(Messages::INVALID_INPUT, Messages::MISSING_KEY.$key, HTTPStatus::BAD_REQUEST, $previous);

		}
	}


?>