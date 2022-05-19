<?php

function getArrayResult($result)
{
  $emparray = array();
  while ($row = mysqli_fetch_assoc($result)) {
      $emparray[] = $row;
  }
  return $emparray;
}

function sendJSONResponse($result) {
  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($result);
}