<?php
require_once '../login.php';
require_once '../responses.php';

$conn = new mysqli($hm, $un, $pw, $db);
if ($conn->connect_error) die("Fatal Error");

$citySearch = $_GET["citySearch"];

$query = <<<SQL
SELECT s.* FROM Stations s
WHERE name LIKE '$citySearch%';
SQL;

$result = $conn->query($query);
if (!$result) die("Fatal Error");

sendJSONResponse(getArrayResult($result));

$result->close();
$conn->close();
