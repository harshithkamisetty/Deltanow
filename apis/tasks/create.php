<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/tasks.php';

  // Instalize DB & connect
  $database = new Database();
  $db = $database->connect();


  $tasks = new tasks($db);

  // Get raw  data
  $data = json_decode(file_get_contents("php://input"));

  $tasks->tname = $data->tname;
  $tasks->description = $data->description;
  
  // Create task
  if($tasks->create()) {
    echo json_encode(
      array('message' => 'Post Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Post Not Created')
    );
  }