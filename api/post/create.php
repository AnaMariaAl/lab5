<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Post.php';

$database = new Database();
$db = $database->connect();

$post = new Post($db);


// get the data that was posted
$data = json_decode(file_get_contents("php://input"));

$post->title = $data->title;
$post->author = $data->author;
$post->body = $data->body;
$post->category_id = $data->category_id;

if ($post->create()) {
  echo json_encode('POST request successful');
} else {
  echo json_encode('Unsuccessful request');
}
