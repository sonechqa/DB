<?php
require_once '../login.php';
require_once '../responses.php';

$entityBody =  json_decode(file_get_contents('php://input'), true);



setCors();
$conn = new mysqli($hm, $un, $pw, $db);
if ($conn->connect_error) die("Fatal Error");

$number = $entityBody["number"];
$departurePlace = $entityBody["departurePlace"];
$arrivalPlace = $entityBody["arrivalPlace"];
$departureTime = $entityBody["departureTime"];
$arrivalTime = $entityBody["arrivalTime"];
$trainNumber = $entityBody["trainNumber"];
$freeSpaces = $entityBody["freeSpaces"];
$price = $entityBody["price"];

$query = <<<SQL
INSERT INTO Routes (`id`, `number`, `departurePlace`, `arrivalPlace`, `departureTime`, `arrivalTime`, `trainId`, `places`, `price`)
VALUES (NULL, '$number', '$departurePlace', '$arrivalPlace', '$departureTime', '$arrivalTime', '$trainNumber', '$freeSpaces', '$price');
SQL;

$conn->query($query);

$selectingLastQuery = <<<SQL
SELECT * from Routes where id = LAST_INSERT_ID();
SQL;


$result = $conn->query($selectingLastQuery);


if (!$result) die("Fatal Error");

sendJSONResponse(getArrayResult($result));


$result->close();
$conn->close();
