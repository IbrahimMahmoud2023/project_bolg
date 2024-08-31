<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            background-color: #f0f0f0; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            margin-bottom: 20px;
        }
        .form-container .form-group label {
            font-weight: bold;
        }
        .form-container .btn-primary {
            width: 100%;
        }
    </style>
</head>
<body>
   <div class="container w-50 form-container">
    <h2>Register App</h2>
    <form action="handle/handleregister.php" method="post">
      <div class="form-group">
        <label>name</label>
        <input type="text" name="name" class="form-control" aria-describedby="emailHelp" placeholder="Enter name">
      </div>
      <div class="form-group">
        <label>Email address</label>
        <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label>password</label>
        <input type="password" name="password" class="form-control"  placeholder="Enter password">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">phone</label>
        <input type="phone" name="phone" class="form-control" id="exampleInputPassword1" placeholder="Enter phone number">
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>
</html>
