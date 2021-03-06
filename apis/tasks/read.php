<?php
 header('Access-Control-Allow-Origin: * ');
 header('Content-Type: application/json');

 include_once '../../config/Database.php';
 include_once '../../models/tasks.php';

 $database = new Database();
 $db = $database->connect();

 $tasks = new tasks($db);

 $read_result = $tasks->read();

 $post_arr = array();
 $post_arr['data'] = array();
  
 $result = $read_result->get_result();

 while($row=$result->fetch_assoc ( ))
{
   extract($row);
   $post_item= array(
      'id'=>$tid,
      'title'=>$tname,
      'description'=>$description
   );
   array_push($post_arr['data'],$post_item);
}
 echo json_encode($post_arr);
 ?>
