<?php

$conn = new mysqli('localhost', 'root', 'JanithNirmal12#$', 'todo_training_voodoo');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM todo";
$result = $conn->query($sql);
$responseArray = array();

for ($i = 0; $i < $result->num_rows; $i++) {
    $data = $result->fetch_assoc();
    $todoObject = new stdClass();
    $todoObject->todo = $data["todo"];
    $todoObject->time = $data["due_datetime"];
    array_push($responseArray, $todoObject);
}

$responseJsonText = json_encode($responseArray); // for arrays and objects
echo ($responseJsonText);

$conn->close();