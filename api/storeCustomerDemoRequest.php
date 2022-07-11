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

	$requiredKeys = array("name", "mobileNo", "class");

	if(
	 	validateRequiredInputParameters($requiredKeys, $_POST) 
	 	&& 
	 	isValidMobileNumber($_POST["mobileNo"])
	){

		$name = $_POST["name"];
		$mobileNo = $_POST["mobileNo"];
		$class = $_POST["class"];

		$mailBody = "<div style=\"font-size:16px\"><b>{$name} ( mob no: {$mobileNo} )</b> has requested for demo class of <b>{$class}</b></div>";

		$insertDemoRequestSql = 
		
					"INSERT INTO 
						`demo_class_requests` 
						
						(`id`, `name`, `mobile`, `class`, `created`, `modified`) 

					VALUES 

						(NULL, '$name', '$mobileNo', '$class', CURRENT_TIME(), CURRENT_TIME())";
		

		$connection = (new Database())->getConnection();

		$resultForDemoRequestSQL = $connection->exec($insertDemoRequestSql);

		if($resultForDemoRequestSQL != 1){

			throw new DatabaseIntegrationException($insertDemoRequestSql);

		}

		if(sendEMail(constant("CUSTOMER_QUERY_EMAIL_ID"), constant("CUSTOMER_QUERY_EMAIL_PASSWORD"), "Customer Request From {$name}", constant("ADMIN_EMAIL_ID"), "Request for demo class", $mailBody)){
		
			$res = new BasicResponse(
						HTTPStatus::STATUS_OK,
						true,
						"E-Mail sent successfuly.",
						"Thanks {$name} for requesting a demo, Your request has been submitted. We will get back to you shortly in regards with your request.",
						""
					);

			echo $res->toJson();
		}

	}


}catch(GenericException $ex){

   	echo $ex->toJson("");
}




?>
