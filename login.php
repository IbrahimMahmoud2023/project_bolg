<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            background-color: #f0f0f0; 
            font-family: 'Arial', sans-serif;
        }

        .login-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            max-width: 400px;
            margin: 50px auto;
        }

       
        .form-group label {
            font-weight: bold;
            color: #495057;
        }

        .form-control {
            border-radius: 5px;
            padding: 10px;
        }

        .btn-primary {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .forgot-password {
            text-align: center;
            display: block;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }
    </style>
</head>


<body>
    <div class="login-container">
       
<?php
if (isset($_SESSION['success'])){?>
    <div class="alert alert_success"><?php echo $_SESSION['success']
 ?></div>
 <?php }
 unset($_SESSION['success']);
?>
<?php

if (!empty($_SESSION['errors'])) {
     ?>
   <div class="alert alert-danger"><?php  echo $_SESSION['errors'] ?></div>
<?php }
unset($_SESSION['errors']);
?>
        <form action="handle/handlelogin.php" method="post">
        
            <div class="form-group">
                <label>Email address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email">
            </div>
            <div class="form-group">
        <label>password</label>
        <input type="password" name="password" class="form-control"  placeholder="Enter password">
      </div>
          
            <button type="submit" name="submit" class="btn btn-primary">Login</button>
            <a href="#" class="forgot-password">Forgot password?</a>
        </form>
    </div>
</body>
</html>
