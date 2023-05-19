<?php

$request = $_GET["statusChangeData"]; // if req on POST method
$requestObject = json_decode($request);


require("../app/dbQuery.php"); // file navigation is important 
require("../app/inputValidator.php");
require("../app/errorResponseSender.php");

$responseObject = new stdClass();
$responseObject->status = "failed";

$validator = new Validator($requestObject);
$errors = $validator->validator();
foreach ($errors as $key => $value) {
    if ($value) {
        $responseObject->error = $value;
        ErrorSender::sendError($responseObject);
    }
}
$todo_status_id = $requestObject->todo_status_id;
$todo_id = $requestObject->todo_id;


$database = new DB;
$updateQuery = "UPDATE `todo` SET `status_id`=? WHERE `id`=? ";
$stmt1 = $database->prepare($updateQuery, "ii", array($todo_status_id, $todo_id));

$responseObject->status = "success";
ErrorSender::sendError($responseObject);
