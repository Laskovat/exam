<?php
$conn=mysqli_connect("localhost","root","","exam_42");
header("content-type:application/json");
header("access-allow-origin:*");

if ($_SERVER["REQUEST_METHOD"]=="GET") {

$query = "select * from users";
$runquery = mysqli_query($conn,$query);
      if (mysqli_num_rows($runquery)>0) {
          $users = mysqli_fetch_all($runquery,MYSQLI_ASSOC);
          $users = json_encode($users);
          var_dump($users);
      }else{
      	echo json_encode("no data found");
      	http_response_code(404);	
      }
}else{
      	echo json_encode("method not correct");
      	http_response_code(503);	

} 





?>