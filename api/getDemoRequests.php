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

    $getDemoRequestsSql = "SELECT * FROM `demo_class_requests` LIMIT $requestedOffset, $limit";

    $connection = (new Database())->getConnection();

    $resultForDemoRequestsSql = $connection->query($getDemoRequestsSql)->fetchAll(PDO::FETCH_ASSOC);

    $res = new BasicResponse(
        HTTPStatus::STATUS_OK,
        true,
        Messages::DEMO_REQUESTS_FETCHED,
        Messages::DEMO_REQUESTS_FETCHED,
        $resultForDemoRequestsSql
    );

    echo $res->toJson();


}catch(GenericException $ex){
    echo $ex->toJson("");
}

?>