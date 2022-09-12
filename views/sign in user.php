<?php
require_once __DIR__ .'/../db/connection.php';
$conn=connection();
session_start();
$name ='';
$email ='';

?>

<?php
$error_email='';
$error_password ='';
if (isset($_POST['signup'])){
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$passwordconfirm=$_POST['passwordconfirm'];


if (email_exist($email)){
	$error_email="this email already exists";
}

if ($password!==$passwordconfirm){

	$error_password =" the password and the confirmation doesn't match";

}
if(!$error_password &&!$error_email){
 
	register($name,$email,$password);
    header("Location: redirect.php");
	exit;
}
 
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../image/hlogo.png">
	<link rel="stylesheet" href="../css2/all.min.css">
	<link rel="stylesheet" href="../css2/stylee.css">
	<title>Sign UP</title>
</head>

<body>
	<div class="container">
	
		<div class="form-container sign-in-container">
			<form action = "sign in user.php" method="post">
				<h1>Sign UP Now</h1>
                <input required name="name" type="text" placeholder="Username" value="<?php echo $name ;?>" />
				<input required name="email" type="email" placeholder="Email" value="<?php echo $email ;?>"/>
				<?php if($error_email): ?>
				<div class="error"><?php echo $error_email ;?></div>
				<?php endif; ?>
				<input required name="password" type="password" placeholder="Password" />
                <input required name="passwordconfirm" type="password" placeholder="Confirm Password" />
				<?php if($error_password): ?>
				<div class="error"><?php echo $error_password ;?></div>
				<?php endif; ?>
			    <input  name="signup" class="button" type="submit" value="SIGN UP "/> 
				 
				You already have an Account ? <a href="../views/sign in admin.php"   class="btn btn-danger sbutton">Login Now! </a>
			</form>
		</div>
	</div>

</body>

</html>