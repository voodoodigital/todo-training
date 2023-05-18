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
    if($value){
        $responseObject->error = $value;
        ErrorSender::sendError($responseObject);
        
    }
}

date_default_timezone_set('Asia/Colombo');
$currentDateTime = new DateTime();
$formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');

$todo = $requestObject->todo;
$date = $requestObject->date;
$time = $requestObject->time;

// $datetime = DateTime::createFromFormat('Y-m-d H:i:s', $date);
// $dateFormatted = $datetime->format('Y-m-d');

$database = new DB();
$query = "INSERT INTO `todo` (`todo`,`due_datetime`,`time`,`date`) VALUES (?,?,?,?)";
$stmt1 = $database->prepare($query,"siis",array($todo,$date,$time,$formattedDateTime));

$responseObject->status = "success";
ErrorSender::sendError($responseObject);






