<?php
$showerror="false";
if($_SERVER['REQUEST_METHOD']=='POST'){
    require '_dbconnect.php';
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $existuser="SELECT * FROM `users` WHERE user_email='$email'";
    $result=mysqli_query($conn,$existuser);
    if($result&&mysqli_num_rows($result)>0){    
        $showerror="email alreardy exist";
    }
    else{
        if($password==$cpassword){
            $hash=password_hash($password,PASSWORD_DEFAULT); 
            $sql="INSERT INTO `users` (`user_id`, `user_email`, `user_password`, `dt`) VALUES (NULL, '$email', '$hash', current_timestamp())";
            $result=mysqli_query($conn,$sql);
            if($result){
            $showalert=true;
            header("location:/forum/index.php?signupsuccess=true");
            exit();
            }
        }
        else{
            $showerror="password do not match";

        }
    }
    header("location:/forum/index.php?signupsuccess=false&error=$showerror");  
}

?>