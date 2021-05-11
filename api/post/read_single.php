<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Car.php';

$database = new Database();
$db = $database->connect();

$car = new Car($db);

$car->id = isset($_GET['id']) ? $_GET['id'] : die();

// get single car
$car->read_single();

// create array
$car_arr = array(
  'id' => $car->id,
  'brand' => $car->brand,
  'model' => $car->model,
  'year' => $car->year,
);

print_r(json_encode($car_arr));
