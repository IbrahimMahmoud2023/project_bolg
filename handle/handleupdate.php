<?php
require_once '../inc/db.php';

if(isset($_POST['submit']) && isset($_GET['id'])){

    $id = $_GET['id'];
    $title = $_POST['title'];
    $body = $_POST['body'];

    $query = "SELECT * FROM posts WHERE id = $id";
    $result = mysqli_query($conn,$query);
    $oldimage = mysqli_fetch_assoc($result)['image'];



    $errors = [];
    if(empty($title)){
        $errors[] = "title should be exits";

    }
    if(empty($body)){
        $errors[] = "body should be exits";

    }

    if(isset($_FILES['image']) && $_FILES['image']['name']){

        $img = $_FILES['image'];
        $img_name = $img['name'];
        $tmp_name = $img['tmp_name'];
        $ext = pathinfo($img_name, PATHINFO_EXTENSION);
        $newName = uniqid(). "." .$ext;
        $img_error = $img['error'];
        $img_size = $img['size']/ (1024 *1024);
        $dir = "../assets/images/postImage/";
    
       if($img_error >0){
    
            $errors[] = "the image not correct";
    
       }elseif($img_size >1){
    
            $errors[] = "the image is bigger than 1MB";
 
       }elseif(!in_array($ext, ['png', 'jpg', 'jpeg'])){
    
            $errors[] = "the image must be png or jpg";
       }

    }else{
        $newName = $oldimage;
    }
    if(empty($errors)){

        $query = "UPDATE posts SET `title` = '$title', `body` = '$body', `image` = '$newName' WHERE `id` = $id";


        $result = mysqli_query($conn,$query);

        if($result){

            $_SESSION['success'] = "the post updated successfully";
            unlink("assets/images/postImage/$oldimage");
            move_uploaded_file($tmp_name,$dir.$newName);

            
        }else{
            $errors[] = "the post is not updated";
    }

}
$_SESSION['errors'] = $errors;
    header("location:../index.php");
  

}