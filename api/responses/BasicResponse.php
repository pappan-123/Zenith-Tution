<?php

require_once __DIR__.'/../constants/HTTPStatus.php';

class BasicResponse{
	public $code;
	public $success;
	public $message;
	public $userFriendlyMessage;
	public $data;
	
	function __construct($code, $success, $message, $userFriendlyMessage, $data){
		
		if ( !settype($code, "integer") && !settype($success, "boolean") && !settype($message, "string") && !settype($userFriendlyMessage, "string") && !settype($data, "object")){

			throw new Exception("Error processing response", HTTPStatus::INTERNAL_SERVER_ERROR);
			return;
		}

		$this->code = $code;
		$this->success = $success;
		$this->message = $message;
		$this->userFriendlyMessage = $userFriendlyMessage;
		$this->data = $data;
	}

	function toArray(){
		return array('code' => $this->code, 'success' => $this->success, 'message' => $this->message, 'userFriendlyMessage' => $this->userFriendlyMessage, 'data' => $this->data );
	}

	function toJson(){
		return json_encode($this->toArray());
	}
}

?>