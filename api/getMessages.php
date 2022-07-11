<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header('Content-type: application/json');

require_once __DIR__.'/util.php';
require_once __DIR__.'/Database.php';
require_once __DIR__.'/constants/HTTPStatus.php';
require_once __DIR__.'/constants/Messages.php';
require_once __DIR__.'/exceptions/GenericException.php';
require_once __DIR__.'/responses/BasicResponse.php';

try{

    $limit = (isset($_GET["limit"]) && $_GET["limit"] != NULL) ? $_GET["limit"] : 25;

	$offset = (isset($_GET["offset"]) && $_GET["offset"] != NULL) ? $_GET["offset"] : 0;

	$requestedOffset = $limit * $offset;

    $getMessagesSql = "SELECT * FROM `customer_messages` LIMIT $requestedOffset, $limit";

    $connection = (new Database())->getConnection();

    $resultForMessagesSql = $connection->query($getMessagesSql)->fetchAll(PDO::FETCH_ASSOC);

    $res = new BasicResponse(
        HTTPStatus::STATUS_OK,
        true,
        Messages::MESSAGES_FETCHED,
        Messages::MESSAGES_FETCHED,
        $resultForMessagesSql
    );

    echo $res->toJson();


}catch(GenericException $ex){
    echo $ex->toJson("");
}

?>