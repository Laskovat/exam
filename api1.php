<?php
$conn=mysqli_connect("localhost","root","","exam_42");
header("content-type:application/json");
header("access-allow-origin:*");
if ($_SERVER["REQUEST_METHOD"]=="GET") {
	$uri=$_SERVER["REQUEST_URI"];
	$uriArray = explode("/", $uri);
	$id = end($uriArray);

$query = "select * from users where id = $id ";
$runquery = mysqli_query($conn,$query);
      if (mysqli_num_rows($runquery)==1) {
          $users = json_encode(mysqli_fetch_assoc($runquery));
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