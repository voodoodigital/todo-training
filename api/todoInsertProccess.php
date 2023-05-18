<?php

$request = $_POST["insertTodo"]; // if req on POST method
$requestObject = json_decode($request);


require("../app/dbQuery.php"); // file navigation is important 
require("../app/inputValidator.php");
require("../app/errorResponseSender.php");


$responseObject = new stdClass();

$validator = new Validator($requestObject);
$errors = $validator->validator();

foreach ($errors as $key => $value) {
    if ($value) {
        $responseObject->error = $value;
        ErrorSender::sendError($responseObject);
    }
}

$todo = $requestObject->todo;
$date = $requestObject->date;
$time = $requestObject->time;

$datetime = $date . " " . $time;

$database = new DB();
$query = "INSERT INTO `todo` (`todo`,`due_datetime`) VALUES (?,?)";
$stmt1 = $database->prepare($query, "ss", array($todo, $datetime));

$responseObject->status = "success";
ErrorSender::sendError($responseObject);
