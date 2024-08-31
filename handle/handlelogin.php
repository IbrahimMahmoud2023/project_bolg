<?php

require_once '../inc/db.php';

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result); 
            $user_id = $user['id'];
            $user_name = $user['name'];
            $old_password = $user['password'];
            $verify = password_verify($password,$old_password);

            if ($verify) {
                $_SESSION['user_id'] = $user_id;
                $_SESSION['success'] = "Welcome $user_name"; 
                header("location:../index.php");
                exit(); 
            } else {
                $_SESSION['errors'] = "The password is incorrect";
                header("location:../login.php");
                exit(); 
            }
        } else {
            $_SESSION['errors'] = "The email is incorrect";
            header("location:../login.php");
            exit();
        }
    }

    header("location:../login.php");
    exit(); 
}
