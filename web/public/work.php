<?php
require_once 'login.php';
$conn = new mysqli($hm, $un, $pw, $db);
if ($conn->connect_error) die("Fatal Error");

$query = "SELECT * FROM classics";
$result = $conn->query($query);
if (!$result) die("Fatal Error");

$rows = $result->num_rows;

$emparray = array();
while ($row = mysqli_fetch_assoc($result)) {
    $emparray[] = $row;
}
echo json_encode($emparray);

$result->close();
$conn->close();
