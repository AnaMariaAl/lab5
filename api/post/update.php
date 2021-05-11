<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Car.php';

$database = new Database();
$db = $database->connect();

$car = new Car($db);


// get the data that was posted
$data = json_decode(file_get_contents("php://input"));

$car->brand = $data->brand;
$car->model = $data->model;
$car->year = $data->year;

if ($car->update()) {
  echo json_encode('PUT update successful');
} else {
  echo json_encode('Unsuccessful request');
}
