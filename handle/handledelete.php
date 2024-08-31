<?php 
require_once '../inc/db.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM posts WHERE id = $id ";
    $result = mysqli_query($conn, $query);
   
   if($result){
        $_SESSION['success'] = "the post deleted successfully";
        header("location:../index.php");
   }else{

    header("location:../viewPost.php?id=$id");
   }


}