<?php

// user access validation by check if the user is logged in from the request source. (if needed)

// get the request data
// only use one
// most requests comes in JSON format
// $request = $_GET["requestParameter"]; // if req on GET method
// $request = $_POST["requestParameter"]; // if req on POST method
// $requestObject = json_decode($request);

// // import backend processes
// require("../app/templateBackendProcess.php"); // file navigation is important 


// do the APi process
// ---> any process you need to do can be done here. also you can use predefined classes in other classes that you imported to this doc
// make sure to create classes in 'app' folder for specific tasks.
// only program bias process for the eact usecase and repeated processes can be create in the 'app' as classes and can  reuse in here

$conn = new mysqli('localhost', 'root', '', 'todo_training_voodoo');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM todo";
$result = $conn->query($sql);
$responseArray = array();

for ($i=0; $i < $result->num_rows; $i++) { 
    $data=$result->fetch_assoc();
    $todoObject=new stdClass();
    $todoObject->todo=$data["todo"];
    $todoObject->time=$data["due_datetime"];
    array_push($responseArray, $todoObject);    
}

$responseJsonText = json_encode($responseArray); // for arrays and objects
echo ($responseJsonText);

$conn->close();

?>


