<?php
require_once __DIR__ .'/../db/connection.php';
session_start();



?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="../image/hlogo.png">
	<link rel="stylesheet" href="../css2/all.min.css">
	<link rel="stylesheet" href="../css2/stylee2.css">
	<title>Log In</title>
</head>
    <body>
        <div class="container">
           <div class="profile-box">
               <img src="../image/menu.png" class = "menu-icon">
               <img src="../image/profile.png" class = "profile-pic-icon">
               <h2>
               <?php $username = $_SESSION['user']->name ; ?>
                <?php echo $username ; ?>
               </h2>
               <p>welcome in your acoount</p>

               <button value="submit" class="logbutn"><a href="sign in admin.php" >Logout</a></button><br>
               <button value="submit" class="logbutn"><a href="../index.php" >Back to home</a></button><br>

               <div class="profile-button">
                   <p>learn more..</p>
                   <img src="../image/arrow.png">
               </div>
           </div>
        </div>


           

    </body>
</html>