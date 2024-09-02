<?php 
require_once '../inc/conn.php' ;
if (isset($_SESSION['user_id'])) {


if (isset($_POST['submit'])) {
	$user_id = $_SESSION['user_id'];
    $quantity=$_POST['quantity'];
    $product_id=$_POST['id'];
    

	$query = "select * from products where `id`=$product_id";
      $runquery = mysqli_query($conn,$query);
      if (mysqli_num_rows($runquery)==1) {
          $product = mysqli_fetch_assoc($runquery);
          $image=$product['image'];
          $title=$product['title'];
          $price=$product['price'];
          $description=$product['description'];
          $quantity=$_POST['quantity'];
          $subtotal= $price * $quantity ;  

          $query = "select product_id,quantity from order_details where `product_id`=$product_id";
          $runquery = mysqli_query($conn,$query);
          if (mysqli_num_rows($runquery)==1) {
          $old_quantity = mysqli_fetch_assoc($runquery)['quantity'];
            $quantity+=$old_quantity;
          $query = "update order_details set `quantity`=$quantity ,`subtotal`=$subtotal where `product_id`=$product_id";
          $runquery = mysqli_query($conn,$query);
          if ($runquery) {
            header("location:../cart.php"); 
        }else{
            $_SESSION['errors']=['cant'];
            header("location:../shop.php");      
        }
          }else{

          $query = "insert into `order_details` 
          (`image`,`title`,`description`,`quantity`,`price_unit`,`subtotal`,`product_id`,`order_num`)
          values('$image','$title','$description','$quantity','$price','$subtotal','$product_id','5')  ";
          $runquery = mysqli_query($conn,$query);
          if($runquery){
              header("location:../cart.php"); 
          }else{
            $_SESSION['errors']=['uuuuuuuuuuuuuuuu'];
            header("location:../shop.php");      
        }


            
        }
	}else{
        $_SESSION['errors']=['no product selected'];
        header("location:../shop.php"); 
    }
}else{
	$_SESSION['errors']=['fatal error'];
	header("location:../index.php"); 
}
}else{
	$_SESSION['errors']=['you must login first'];
	header("location:login.php"); 
}
?>
