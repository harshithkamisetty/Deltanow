<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/tasks.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $tasks = new tasks($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to update
  $tasks->tid = $data->tid;

  $tasks->tname= $data->tname;
  $tasks->description = $data->description;
  
  // Update post
  if($tasks->update()) {
    echo json_encode(
      array('message' => 'Task Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Task Not Updated')
    );
  }
