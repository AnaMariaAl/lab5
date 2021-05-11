<?php

class Car
{
  private $conn;

  public $id;
  public $brand;
  public $model;
  public $year;
  


  // Constructor with DB
  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function read()
  {
    $query = 'SELECT * FROM  cars';

    //Prepare statement
    $stmt = $this->conn->prepare($query);

    // Execute the query
    $stmt->execute();

    return $stmt;
  }

  public function read_single()
  {
    $query = 'SELECT * FROM cars WHERE id = :id';

    $stmt = $this->conn->prepare($query);

    //bind the query param
    $stmt->bindParam(':id', $this->id);

    // Execute the query
    $stmt->execute();

    //return array indexed by col name
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $this->model = $row['model'];
    $this->brand = $row['brand'];
    $this->year = $row['year'];
   
  }

  public function create()
  {
    $query = 'INSERT INTO cars 
    SET brand = :brand, year = :year, model = :model';

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':model', $this->model);
    $stmt->bindParam(':brand', $this->brand);
    $stmt->bindParam(':year', $this->year);
    

    if ($stmt->execute()) {
      return true;
    }

    printf('Error: %s', $stmt->error);

    return false;
  }


  public function update()
  {
    $query = 'UPDATE cars 
    SET brand = :brand, year = :year, model = :model WHERE brand = :brand';

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':model', $this->model);
    $stmt->bindParam(':brand', $this->brand);
    $stmt->bindParam(':year', $this->year);
    

    if ($stmt->execute()) {
      return true;
    }

    printf('Error: %s', $stmt->error);

    return false;
  }

  public function delete()
  {
    $query = 'DELETE FROM cars WHERE id = :id';

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':id', $this->id);

    if ($stmt->execute()) {
      return true;
    }

    printf('Error: %s', $stmt->error);

    return false;
  }
}
