<?php

require_once '../inc/db.php';

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    $hashpassword = password_hash($password,PASSWORD_DEFAULT);

    $query = "INSERT INTO users (`name`,`email`,`password`,`phone`) VALUES ('$name','$email','$hashpassword','$phone')";

    $result = mysqli_query($conn,$query);

    if($result){
        header("location:../login.php");
    }else{

        header("location:../register.php");
    }

}



