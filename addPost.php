<?php require_once 'inc/header.php';
require_once 'inc/db.php'; ?>

    

<!-- Page Content -->
    <div class="page-heading products-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>new Post</h4>
              <h2>add new personal post</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    
<div class="container w-50 ">
  <?php
  
  if(isset($_SESSION['errors'])){
    foreach($_SESSION['errors'] as $error)
    {
    ?> <div class="alert alert-danger">
      <?php echo $error; ?>
    </div>
    <?php
    }
  }
  unset($_SESSION['errors']);
  
  
  
  ?>
  <div class="d-flex justify-content-center">
    <h3 class="my-5">add new Post</h3>
  </div>
  <form method="POST" action="handle/handlepost.php" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="">
    </div>
    <div class="mb-3">
        <label for="body" class="form-label">Body</label>
        <textarea class="form-control" id="body" name="body" rows="5"></textarea>
    </div>
    <div class="mb-3">
        <label for="body" class="form-label">image</label>
        <input type="file" class="form-control-file" id="image" name="image" >
    </div>
    <!-- <img src="uploads/<?php echo $post['image'] ?>" alt="" width="100px" srcset=""> -->
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </form>
</div>

    <?php require_once 'inc/footer.php' ?>
