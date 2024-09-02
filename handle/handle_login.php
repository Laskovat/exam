<?php 
require_once '../inc/conn.php';

if (isset($_POST['submit'])) {
$email = trim(htmlspecialchars($_POST['email']));
$password = trim(htmlspecialchars($_POST['password']));
$errors=[];
if(empty($email)){
		$errors[]="email is required ";
	}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		$errors[]="email is not valid";
	}
	if(empty($password)) {
		$errors[]="password is required ";
	}

	if(empty($errors)){
			$query="select * from users where `email`='$email'";
			$runquery=mysqli_query($conn,$query);
				if(mysqli_num_rows($runquery) == 1){
					$user=mysqli_fetch_assoc($runquery);
					$hashPassword=$user['password'];
					$user_id=$user['id'];
					$name=$user['name'];
					$role=$user['role'];

					$verify = password_verify($password,$hashPassword);
					if ($verify) {
						$_SESSION['user_id']=$user_id;
						$_SESSION['name']=$name;
						$_SESSION['success']="logged in successfuly welcome $name ";
						if ($role=="admin") {
						header("location: ../admin/view/layout.php");
						}else{
						header("location: ../index.php");
						}
					}else{
						$_SESSION['errors']=['login wrong'];
						header("location: ../login.php");
						}

				}else{
						$_SESSION['errors']=['email or password is wrong'];
						header("location: ../login.php");
					}

		}else{
			// errors of validation

				$_SESSION['errors']=$errors;
				header("location: ../Login.php");
				
		}
	

}else{
	header("location: ../Login.php");

}