<?php

class Post
{
  private $conn;

  public $id;
  public $title;
  public $body;
  public $author;
  public $category_id;


  // Constructor with DB
  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function read()
  {
    $query = 'SELECT * FROM  posts';

    //Prepare statement
    $stmt = $this->conn->prepare($query);

    // Execute the query
    $stmt->execute();

    return $stmt;
  }

  public function read_single()
  {
    $query = 'SELECT * FROM posts WHERE id = :id';

    $stmt = $this->conn->prepare($query);

    //bind the query param
    $stmt->bindParam(':id', $this->id);

    // Execute the query
    $stmt->execute();

    //return array indexed by col name
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $this->title = $row['title'];
    $this->body = $row['body'];
    $this->author = $row['author'];
    $this->category_id = $row['category_id'];
  }

  public function create()
  {
    $query = 'INSERT INTO posts 
    SET title = :title, author = :author, body = :body, category_id = :category_id';

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':title', $this->title);
    $stmt->bindParam(':author', $this->author);
    $stmt->bindParam(':body', $this->body);
    $stmt->bindParam(':category_id', $this->category_id);

    if ($stmt->execute()) {
      return true;
    }

    printf('Error: %s', $stmt->error);

    return false;
  }


  public function update()
  {
    $query = 'UPDATE posts 
    SET title = :title, author = :author, body = :body, category_id = :category_id WHERE author = :author';

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':title', $this->title);
    $stmt->bindParam(':author', $this->author);
    $stmt->bindParam(':body', $this->body);
    $stmt->bindParam(':category_id', $this->category_id);

    if ($stmt->execute()) {
      return true;
    }

    printf('Error: %s', $stmt->error);

    return false;
  }

  public function delete()
  {
    $query = 'DELETE FROM posts WHERE id = :id';

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':id', $this->id);

    if ($stmt->execute()) {
      return true;
    }

    printf('Error: %s', $stmt->error);

    return false;
  }
}
