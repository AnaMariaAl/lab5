<?php

header("Access-Control-Allow-Origin: 'no-cors'"); // make the api public
// header("Origin: 'localhost'"); // make the api public
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Car.php';

$database = new Database();
$db = $database->connect();

$car = new Car($db);

$result = $car->read();

//get row count
$num = $result->rowCount();

// Check if any cars
if ($num > 0) {

  $cars_arr = array();

  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

    $car_item = array(
      'id' => $row['id'],
      'brand' => $row['brand'],
      'model' => $row['model'],
      'year' => $row['year'],
    );

    array_push($cars_arr, $car_item);
  }

  // Turn it into json & output
  echo json_encode($cars_arr);
} else {
  echo json_encode('no cars found');
}
