<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/tasks.php';

  // Instalize DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instalize task object
  $tasks = new tasks($db);

  // Get raw  data(for testing i used it(postman))
  $data = json_decode(file_get_contents("php://input"));

  // Set TID to update
  $tasks->tid = $data->tid;

  // Delete task
  if($tasks->completed()) {
    echo json_encode(
      array('message' => 'Task completed')
    );
  } else {
    echo json_encode(
      array('message' => 'Task Not completed')
    );
  }
