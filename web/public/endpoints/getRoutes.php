<?php
require_once '../login.php';
require_once '../responses.php';

$conn = new mysqli($hm, $un, $pw, $db);
if ($conn->connect_error) die("Fatal Error");

$departureDate = $_GET["departureDate"];

$passengers = $_GET["passengers"];

$fromCityId = $_GET["fromCityId"];

$toCityId = $_GET["toCityId"];

if ($passengers < 0) {
    $emparray = array();
    sendJSONResponse($emparray);
    die();
}

$query = <<<SQL
    SELECT r.*,
        s1.name as 'fromStationName',
        s2.name as 'toStationName',
        t.number as 'trainNumber',
        t.company as 'trainCompany'

    FROM (
        select ro.*, (ro.places - (select COUNT(*) from SoldTickets st where st.routeId = ro.id)) as freeSpaces
        FROM Routes ro
    ) r
    
    inner join Stations s1 on r.departurePlace = s1.id
    inner join Stations s2 on r.arrivalPlace = s2.id
    inner join Trains t on r.trainId = t.id

    WHERE 
        DATE(r.departureTime) = "$departureDate"
        AND r.freeSpaces >= "$passengers"
        AND r.departurePlace = "$fromCityId"
        AND r.arrivalPlace = "$toCityId"
SQL;

$result = $conn->query($query);
if (!$result) die("Fatal Error");

sendJSONResponse(getArrayResult($result));

$result->close();
$conn->close();
