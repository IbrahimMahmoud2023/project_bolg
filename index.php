<?php
session_start();
require_once 'inc/header.php';
require_once 'inc/db.php';
?>

<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="banner header-text">
  <div class="owl-banner owl-carousel">
    <div class="banner-item-01">
      <div class="text-content">
        <!-- <h4>Best Offer</h4> -->
        <!-- <h2>New Arrivals On Sale</h2> -->
      </div>
    </div>
    <div class="banner-item-02">
      <div class="text-content">
        <!-- <h4>Flash Deals</h4> -->
        <!-- <h2>Get your best products</h2> -->
      </div>
    </div>
    <div class="banner-item-03">
      <div class="text-content">
        <!-- <h4>Last Minute</h4> -->
        <!-- <h2>Grab last minute deals</h2> -->
      </div>
    </div>
  </div>
</div>
<!-- Banner Ends Here -->

<div class="latest-products my-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Latest Posts</h2>
          <?php if (isset($_SESSION['success'])) { ?>
            <div class="alert alert-success">
              <?php echo $_SESSION['success']; ?>
            </div>
          <?php unset($_SESSION['success']);

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
         } ?>
          <!-- <a href="products.html">view all products <i class="fa fa-angle-right"></i></a> -->
        </div>
      </div>
    </div>
    
    <div class="row">
      <?php

      $pageQuery = "SELECT count(id) as totalposts FROM posts";
      $resultQuery = mysqli_query($conn, $pageQuery);
      $total = mysqli_fetch_assoc($resultQuery)['totalposts'];
    
        
      if(isset($_GET['page'])){
        $page = $_GET['page'];
      }else{
        $page = 1;
      }

      $limit = 3;
      $offset = ($page - 1) * $limit;
      $numberpages = ceil($total / $limit);

      if($page < 1){
        header("location:index.php?page= 1");
        exit();
      }

      if($page > $numberpages){
        header("location:index.php?page= $numberpages");
        exit();
      }

      $query = "SELECT * FROM posts  LIMIT $limit  OFFSET $offset ";
      $result = mysqli_query($conn, $query);
      $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

      if (!empty($posts)) {
        foreach($posts as $post) {
      ?>
        <div class="col-md-4 mb-4">
          <div class="product-item card h-100">
            <a href="#"><img src="assets/images/postImage/<?php echo $post['image']; ?>" class="card-img-top" alt=""></a>
            <div class="card-body">
              <a href="#"><h4 class="card-title"><?php echo $post['title']; ?></h4></a>
              <h6 class="text-muted"><?php echo $post['created_at']; ?></h6>
              <p class="card-text"><?php echo $post['body']; ?></p>
              <div class="d-flex justify-content-end">
                <a href="viewPost.php?id=<?php echo $post['id']; ?>" class="btn btn-info">View</a>
              </div>
            </div>
          </div>
        </div>
      <?php
        }
      } else {
      ?>
        <div class="col-12">
          <h1 class="text-center">There are no posts</h1>
        </div>
      <?php
      }
      ?>
    </div>
    <nav aria-label="Page navigation example" class="container d-flex justify-content-center">
  <ul class="pagination">
    
    <li class="page-item <?php if($page == 1) echo "disabled"; ?>">
      <a class="page-link" href="index.php?page=<?php echo $page - 1; ?>">Previous</a>
    </li>

    
    <?php for ($i = 1; $i <= $numberpages; $i++): ?>
      <li class="page-item <?php if($page == $i) echo 'active'; ?>">
        <a class="page-link" href="index.php?page=<?php echo $i; ?>" 
           style="<?php if($page == $i) echo 'background-color: #007bff; color: white;'; 
                  else echo 'color: #6c757d;'; ?>">
          <?php echo $i; ?>
        </a>
      </li>
    <?php endfor; ?>

    
    <li class="page-item <?php if($page == $numberpages) echo "disabled"; ?>">
      <a class="page-link" href="index.php?page=<?php echo $page + 1; ?>">Next</a>
    </li>
  </ul>
</nav>
  </div>
</div>

<?php require_once 'inc/footer.php'; ?>
