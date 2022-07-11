<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/x-www-form-urlencoded; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once __DIR__.'/util.php';
require_once __DIR__.'/Database.php';
require_once __DIR__.'/constants/HTTPStatus.php';
require_once __DIR__.'/constants/Messages.php';
require_once __DIR__.'/exceptions/GenericException.php';
require_once __DIR__.'/responses/BasicResponse.php';

try{

	$requiredKeys = array("firstname", "lastname", "email", "subject", "message");

	if(
	 	validateRequiredInputParameters($requiredKeys, $_POST)
	 	&& 
	 	isValidEmail($_POST["email"])
		&&
		isValidFirstName($_POST["firstname"])
		&&
		isValidLastName($_POST["lastname"])
	){
		
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$fullname = $firstname . " " . $lastname;
		$email = $_POST["email"];
		$subject = $_POST["subject"];
		$message = $_POST["message"];

		$mailBody = "<div style=\"font-size:16px;\"><div>Name : <b>{$fullname}</b></div><br/><div>Email : <b>{$email}</b></div><br/><div>Subject : <b>{$subject}</b></div><br/><div>Message/Query/Feedback : <b>{$message}</b></div><br/></div>";

		$insertCustomerMessageSql = 
		
					"INSERT INTO 
						`customer_messages` 
						
						(`id`, `name`, `email`, `subject`, `message`, `created`, `modified`)

					VALUES 

						(NULL, '$fullname', '$email', '$subject', '$message', CURRENT_TIME(), CURRENT_TIME())";
		

		$connection = (new Database())->getConnection();

		$resultForCustomerMessageSQL = $connection->exec($insertCustomerMessageSql);

		if($resultForCustomerMessageSQL != 1){

			throw new DatabaseIntegrationException($insertCustomerMessageSql);

		}

		if(sendEMail(constant("CUSTOMER_QUERY_EMAIL_ID"), constant("CUSTOMER_QUERY_EMAIL_PASSWORD"), "Customer Message From {$fullname}", constant("ADMIN_EMAIL_ID"), "Customer Query/Feedback/Message", $mailBody)){
			$res = new BasicResponse(
						HTTPStatus::STATUS_OK,
						true,
						"E-Mail sent successfuly.",
						"Thanks {$fullname} for reachig us, Your message has been submitted. We will get back to you shortly in regards with your message.",
						""
					);

			echo $res->toJson();
		}

	}


}catch(GenericException $ex){

   	echo $ex->toJson("");
}




?>
