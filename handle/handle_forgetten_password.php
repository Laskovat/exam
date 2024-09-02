<?php 
require_once '../inc/conn.php' ;
if (isset($_POST['submit'])) {
$email = trim(htmlspecialchars($_POST['email']));
$password1 = trim(htmlspecialchars($_POST['password1']));
$password2 = trim(htmlspecialchars($_POST['password2']));
$errors=[];

	if(empty($email)){
		$errors[]="email is required ";
	}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		$errors[]="email is not valid";
	}
	if(empty($password1)) {
		$errors[]="password is required ";
	}elseif(strlen($password1)<3){
		$errors[]="password less than 3 chars";
	}if(empty($password2)) {
		$errors[]="confirming password is required ";
	}elseif($password2 != $password1){
		$errors[]="password not match";
	}
	
		

	if(empty($errors)){
$query="select email from `users`where email='$email'";
$runquery=mysqli_query($conn,$query);
if (mysqli_num_rows($runquery)==1) {

	$passwordHashed = password_hash($password1, PASSWORD_DEFAULT);
	$query="update users set `password` = '$passwordHashed' where `email` = '$email' ";
	$runquery=mysqli_query($conn,$query);
		if($runquery){
			$_SESSION['success']="password has been changed successfuly ";
			header("location: ../login.php");
		}else{
				$_SESSION['errors']=['error while processing try again'];
				header("location: ../login.php");
			}

		}else{

				$_SESSION['errors']=["this email is not exist"];
			
				header("location: ../forgetPassword.php");
		}

				}else{

						$_SESSION['errors']=$errors;
					
						header("location: ../forgetPassword.php");
				}
	
}else{
	$_SESSION['errors']=['fatal error'];
	header("location:../../index.php"); 
}
?>