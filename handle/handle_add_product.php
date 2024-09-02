<?php 
require_once '../inc/conn.php' ;
	if (!isset($_SESSION['user_id'])) {
		header("location: ../Login.php");
    }else{ 

if (isset($_POST['submit'])) {
	$id = $_SESSION['user_id'];
$cat = trim(htmlspecialchars($_POST['cat']));
$title = trim(htmlspecialchars($_POST['title']));
$desc = trim(htmlspecialchars($_POST['desc']));
$price = trim(htmlspecialchars($_POST['price']));
$quantity = trim(htmlspecialchars($_POST['quantity']));
$image=$_FILES['img'];
	$imageName=$image['name'];
	$tmp_name=$image['tmp_name'];
	$err=$image['error'];
	$ext=strtolower(pathinfo($imageName,PATHINFO_EXTENSION));
	$exts=["png","jpg","gif","svg"];
	$size=$image['size']/(1024*1024);
	$image_new_name= time().".$ext";
	$errors=[];

	$query = "select * from categories where `title`='$cat'";
      $runquery = mysqli_query($conn,$query);
      if (mysqli_num_rows($runquery)==1) {
          $category = mysqli_fetch_assoc($runquery);
          $category_id=$category['id'];


	if(empty($cat)) {
		$errors[]="category is required ";
	}elseif(is_numeric($cat)){
		$errors[]="category must be a string";
	}
	if(empty($title)) {
		$errors[]="title is required ";
	}elseif(is_numeric($title)){
		$errors[]="title must be a string";
	}
	if(empty($desc)) {
		$errors[]="description is required ";
	}elseif(strlen($desc)<20){
		$errors[]="description is too short";
	}if(empty($price)) {
		$errors[]="price is required ";
	}elseif(!is_numeric($price)){
		$errors[]="price must be a numeric";
	}if(empty($quantity)) {
		$errors[]="quantity is required ";
	}elseif(!is_numeric($quantity)){
		$errors[]="quantity must be a numeric";
	}
	if($err!=0){
		$errors[]="image is required";
	}elseif(!in_array($ext,$exts)){
		$errors[]="image's extinsion isn't correct";
	}elseif($size>1){
		$errors[]="image must be less than 1 mb ";
	}
	if(empty($errors)){
	$query="insert into products(`category_id`,`title`,`description`,`price`,`quantity`,`image`,`added_by`)
			values('$category_id','$title','$desc','$price','$quantity','$image_new_name','$id') ";
			$runquery=mysqli_query($conn,$query);
					if($runquery){
					move_uploaded_file($tmp_name, "../uploads/$image_new_name");
					$_SESSION['success']="post added successfuly ";
					header("location: ../admin/view/layout.php");
					
					}else{
						$_SESSION['errors']=['error while processing'];
						header("location: ../admin/view/addProduct.php");
					}
		}else{
			$_SESSION['errors']=$errors;
			$_SESSION['cat']=$cat;
			$_SESSION['title']=$title;
			$_SESSION['desc']=$desc;
			$_SESSION['price']=$price;
			$_SESSION['quantity']=$quantity;
			header("location: ../admin/view/addProduct.php");
		}
}else{
	$_SESSION['errors']=['this category is not exist'];
	header("location: ../admin/view/addProduct.php");

}

}else{
	$_SESSION['errors']=['fatal error'];
	header("location:../../index.php"); 
}}
?>