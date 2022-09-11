<?php
require_once '../login.php';
require_once '../responses.php';

$conn = new mysqli($hm, $un, $pw, $db);
if ($conn->connect_error) die("Fatal Error");

$id = $_GET["id"];
$surname = $_GET["surname"];

$query = <<<SQL
INSERT INTO SoldTickets (`id`, `routeId`, `surname`) VALUES (NULL, '$id', '$surname');
SQL;

$result = $conn->query($query);

setCors();

$result->close();
$conn->close();
