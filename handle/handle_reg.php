<?php 
require_once '../inc/conn.php' ;
if (isset($_POST['submit'])) {
$name = trim(htmlspecialchars($_POST['name']));
$email = trim(htmlspecialchars($_POST['email']));
$password = trim(htmlspecialchars($_POST['password']));
$phone = trim(htmlspecialchars($_POST['phone']));
$address = trim(htmlspecialchars($_POST['address']));
$errors=[];

$query="select email from `users`where email='$email'";
$runquery=mysqli_query($conn,$query);
if (mysqli_num_rows($runquery)==1) {
	$_SESSION['errors']=['email is already chosen before '];
	header("location: ../signup.php");
}else {
	if(empty($name)) {
		$errors[]="name is required ";
	}elseif(is_numeric($name)){
		$errors[]="name must be a string";
	}
	if(empty($email)){
		$errors[]="email is required ";
	}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		$errors[]="email is not valid";
	}
	if(empty($password)) {
		$errors[]="password is required ";
	}elseif(strlen($password)<3){
		$errors[]="password less than 3 chars";
	}
	if(empty($phone)){
		$errors[]="phone is required ";
	}elseif(!is_numeric($phone)){
		$errors[]="phone is not valid";
	}

	$passwordHashed = password_hash($password, PASSWORD_DEFAULT);

	if(empty($errors)){
	$query="insert into users (`name`,`email`,`password`,`phone`,`address`)
	values('$name','$email','$passwordHashed','$phone','$address')";
	$runquery=mysqli_query($conn,$query);
		if($runquery){
			$_SESSION['success']="user has registered successfuly ";
			header("location: ../login.php");
		}else{
				$_SESSION['errors']=['error while processing try again'];
				header("location: ../login.php");
			}

		}else{

				$_SESSION['errors']=$errors;
				$_SESSION['name']=$name;
				$_SESSION['email']=$email;
				$_SESSION['phone']=$phone;
				$_SESSION['address']=$address;
				header("location: ../signup.php");
		}

}
}

else{
	$_SESSION['errors']=['fatal error'];
	header("location:../../index.php"); 
}







?>