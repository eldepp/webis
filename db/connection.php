<?php
// Register connection part
function connection(){
    mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
    $object=mysqli_connect('localhost','root','','register');
    return $object;
}


function register($name,$email,$password){
    $object=connection();
    $stmt=mysqli_prepare($object,"insert into users(name,email,password) values(?,?,?)");
    mysqli_stmt_bind_param($stmt,'sss',$name,$email,$password);
    mysqli_stmt_execute( $stmt);
}

// the book conection part

function database_book_insert($name, $number, $email, $date, $time)
{
    $object = connection();
    $stmt = mysqli_prepare( $object, "insert into book (name, number, email, date, time) values (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'sisss', $name, $number, $email, $date, $time);
    mysqli_stmt_execute($stmt);
}


// login connection part

// function logconnection(){
//     mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
//     $object=mysqli_connect('localhost','root','','login');
//     return $object;
// }


 
// function logregister($email,$password){
//     $object=logconnection();
//     $stmt=mysqli_prepare($object,"insert into users(email,password) values(?,?)");
//     mysqli_stmt_bind_param($stmt,'ss',$email,$password);
//     mysqli_stmt_execute( $stmt);
// }



// the validation part
 function database_auth_user($email , $password){
    $object=connection();
    $stmt=mysqli_prepare($object,"select * from users where email = ? and password = ?");
    mysqli_stmt_bind_param($stmt,'ss',$email,$password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($result)>0){
        $user =(object)mysqli_fetch_assoc($result);
    }else{
        $user = null;
    }
    return $user;
 }
// the email validation
 function email_exist($email){
    $object=connection();
    $stmt=mysqli_prepare($object,"select email from users where email = ?")  ;
    mysqli_stmt_bind_param($stmt,'s', $email );
    mysqli_stmt_execute( $stmt);
    $result=mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result)>0){
        return true;
    }
        return false;
}

 
 