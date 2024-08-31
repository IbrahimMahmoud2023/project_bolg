<?php

require_once '../inc/db.php';

if(isset($_POST['submit'])){

    $title = $_POST['title'];
    $body = $_POST['body'];
    $now = date("Y/m/d h:i:s");
    $dir = "../assets/images/postImage/";

    $errors = [];
    if(empty($title)){
        $errors[] = "title should be exits";

    }
    if(empty($body)){
        $errors[] = "body should be exits";

    }

    $img = $_FILES['image'];
    $img_name = $img['name'];
    $tmp_name = $img['tmp_name'];
    $ext = pathinfo($img_name, PATHINFO_EXTENSION);
    $newName = uniqid(). "." .$ext;
    $img_error = $img['error'];
    $img_size = $img['size']/ (1024 *1024);

   if($img_error >0){

        $errors[] = "the image not correct";

   }elseif($img_size >1){

        $errors[] = "the image is bigger than 1MB";

   }elseif(!in_array($ext,['png','jpg','jpeg'])){

        $errors[] = "the image must be png or jpg";
   }


    if(empty($errors)){

        $query = "INSERT INTO posts (`title`,`body`,`image`,`created_at`,`user_id`) 
        VALUES ('$title', '$body', '$newName', '$now', 1)";

        $result = mysqli_query($conn, $query);

        if($result){

            $_SESSION['success'] = "the post inserted successfully";
            move_uploaded_file($tmp_name,$dir.$newName);
            header("location:../index.php");
            exit();
        }else{
            $errors[] = "the post is not inserted";
        
    }
}

    $_SESSION['errors'] = $errors;
    header("location:../addpost.php");
    exit();
}