<?php

header("Access-Control-Allow-Origin: 'no-cors'"); // make the api public
// header("Origin: 'localhost'"); // make the api public
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Post.php';

$database = new Database();
$db = $database->connect();

$post = new Post($db);

$result = $post->read();

//get row count
$num = $result->rowCount();

// Check if any post
if ($num > 0) {

  $posts_arr = array();

  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

    $post_item = array(
      'id' => $row['id'],
      'title' => $row['title'],
      'body' => $row['body'],
      'author' => $row['author'],
      'category_id' => $row['category_id']
    );

    array_push($posts_arr, $post_item);
  }

  // Turn it into json & output
  echo json_encode($posts_arr);
} else {
  echo json_encode('no post found');
}
