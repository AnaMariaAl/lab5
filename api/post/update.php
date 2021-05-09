<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Post.php';

$database = new Database();
$db = $database->connect();

$post = new Post($db);


// get the data that was posted
$data = json_decode(file_get_contents("php://input"));

$post->author = $data->author;
$post->title = $data->title;
$post->body = $data->body;
$post->category_id = $data->category_id;

if ($post->update()) {
  echo json_encode('PUT update successful');
} else {
  echo json_encode('Unsuccessful request');
}
