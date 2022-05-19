<?php
require_once '../login.php';
require_once '../responses.php';

$conn = new mysqli($hm, $un, $pw, $db);
if ($conn->connect_error) die("Fatal Error");

$query = "SELECT * FROM Routes";
$result = $conn->query($query);
if (!$result) die("Fatal Error");

sendJSONResponse(getArrayResult($result));

$result->close();
$conn->close();
