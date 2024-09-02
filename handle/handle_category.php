<?php 
require_once '../inc/conn.php' ;
if (isset($_POST['submit'])) {
$title = trim(htmlspecialchars($_POST['name']));
$errors=[];

	$query="select title from categories where `title`='$title'";
	$runquery=mysqli_query($conn,$query);
	if (mysqli_num_rows($runquery)==1){
		$_SESSION['title']=$title;
		$_SESSION['errors']=['this category is already exist'];
		header("location: ../admin/view/addCategory.php");
	}else{

	if(empty($title)) {
		$errors[]="title is required ";
	}elseif(is_numeric($title)){
		$errors[]="title must be a string";
	}
	
	if(empty($errors)){
	$query="insert into categories (`title`) values('$title')";
	$runquery=mysqli_query($conn,$query);
		if($runquery){
			$_SESSION['success']="category has addeded successfuly ";
			header("location: ../admin/view/layout.php");
		}else{
				$_SESSION['errors']=['error while processing try again'];
			header("location: ../admin/view/layout.php");
			}

		}else{

				$_SESSION['errors']=$errors;
				header("location: ../admin/view/addCategory.php");
		}

}
}

else{
	$_SESSION['errors']=['fatal error'];
	header("location: ../index.php"); 
}







?>