<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header('Content-type: application/json');

require_once __DIR__.'/util.php';
require_once __DIR__.'/Database.php';
require_once __DIR__.'/constants/HTTPStatus.php';
require_once __DIR__.'/constants/Messages.php';
require_once __DIR__.'/exceptions/GenericException.php';
require_once __DIR__.'/exceptions/InvalidValueException.php';
require_once __DIR__.'/exceptions/DatabaseIntegrationException.php';
require_once __DIR__.'/responses/BasicResponse.php';

try{

    $requiredKeys = array("status", "demoRequestId");

	if(
	 	validateRequiredInputParameters($requiredKeys, $_POST)
	){

        $status = strtoupper($_POST["status"]);
        $demoRequestId = $_POST["demoRequestId"];

        if($status != "OPEN" && $status != "CLOSED"){
			
            throw new InvalidValueException("status");

        }

        $updateDemoRequestSql = "UPDATE `demo_class_requests` SET `status` = '$status' WHERE `demo_class_requests`.`id` = '$demoRequestId'";

        $connection = (new Database())->getConnection();

		$resultForUpdateDemoRequestSQL = $connection->exec($updateDemoRequestSql);

		if($resultForUpdateDemoRequestSQL != 1){

			throw new DatabaseIntegrationException($updateDemoRequestSql);

		}

        $res = new BasicResponse(
            HTTPStatus::STATUS_OK,
            true,
            "Demo request status updated successfully.",
            "Demo request status updated successfully.",
            ""
        );

        echo $res->toJson();

    }


}catch(GenericException $ex){
    echo $ex->toJson("");
}

?>