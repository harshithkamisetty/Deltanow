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

  // Instanlize blog post object
  $tasks = new tasks($db);

  // Get raw data
  $data = json_decode(file_get_contents("php://input"));

  // Set TID to delete
  $tasks->tid = $data->tid;

  // Delete task
  if($tasks->delete()) {
    echo json_encode(
      array('message' => 'Post Deleted')
    );
  } else {
    echo json_encode(
      array('message' => 'Post Not Deleted')
    );
  }