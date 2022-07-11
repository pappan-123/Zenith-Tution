<?php

	require_once __DIR__.'/../constants/HTTPStatus.php';
	require_once __DIR__.'/../constants/Messages.php';
	require_once __DIR__.'/GenericException.php';	



	class CartItemAlreadyRemovedException extends GenericException{

		public function __construct($userFriendlyMessage = Messages::PRODUCT_ALREADY_REMOVED_FROM_CART, $message = Messages::PRODUCT_ALREADY_REMOVED_FROM_CART, $code = HTTPStatus::BAD_REQUEST, Exception $previous = null){
			
			parent::__construct($userFriendlyMessage, $message, $code, $previous);

		}
	}


?>