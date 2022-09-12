<?php
require_once __DIR__ .'/../db/connection.php';
// $conn=logconnection();
 session_start();
$error ='';
$email ='';
if(isset($_POST['submit_login'])){
   $email = $_POST['email'];
   $password =$_POST['password'];
   $user = database_auth_user($email , $password); 
if($user=== null){
		$error = 'Wrong email or password';
}else{ 
		$_SESSION['user'] = $user;
		header("Location: profile.php");
		exit;
		
}
}




?>

<?php
// if (isset($_POST['submit_login'])){
// $email=$_POST['email'];
// $password=$_POST['password'];
// logregister($email,$password);
// header("Location: logredirect.php");


// }
?>








<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="../image/hlogo.png">
	<link rel="stylesheet" href="../css2/all.min.css">
	<link rel="stylesheet" href="../css2/stylee.css">
	<title>Log In</title>
</head>

<body>
	<div class="container">
		<div class="form-container sign-in-container">
			<form action="sign in admin.php" method="post">
				<h1>Log In Now</h1>
				
				<input required name="email" type="email" placeholder="Email" value="<?php echo $email ;?>"  />
                <input required name="password" type="password" placeholder="Password" />
				<?php if($error): ?>
				<div class="error"><?php echo $error ;?></div>
				<?php endif; ?>
				<input type="submit" name="submit_login" class="button" value="Login">
				
			</form>
		</div>
	</div>

</body>

</html>