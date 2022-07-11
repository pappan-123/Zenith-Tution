<?php

	require_once __DIR__.'/../responses/BasicResponse.php';


	class GenericException extends Exception{

		protected $userFriendlyMessage;

		public function __construct($userFriendlyMessage, $message, $code, Exception $previous = null){
			
			$this->userFriendlyMessage = $userFriendlyMessage;
			
			parent::__construct($message, $code, $previous);

		}

		public function getUserFriendlyMessage(){
			
			return $this->userFriendlyMessage;

		}

		public function toJson($dataObject){
			
			$res = new BasicResponse(
						$this->getCode(),
						false,
						$this->getMessage(),
						$this->getUserFriendlyMessage(),
						$dataObject
					);

			return $res->toJson();

		}


	}


?>