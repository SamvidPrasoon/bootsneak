<?php
 include 'includes/dbconfig.php';
include 'includes/header.php';

?>



    <!-- Page Content -->
    <div class="container mt-3">

        <!-- Jumbotron Header -->
        <header class="jumbotron ">

          <?php
          if (isset($_GET['cat_id'])) {
            $cat_id = $_GET['cat_id'];

          $query = "select * from categories where cat_id  = $cat_id";
          $category = mysqli_query($connection,$query);
          while ($row=mysqli_fetch_assoc($category)) {
            $cat_title= $row['cat_title'];
            $cat_id = $row['cat_id'];

          }}

           ?>
        <center>    <h1 class="text-primary "><?php echo strtoupper($cat_title); ?></h1></center>

        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Latest</h3>
            </div>
        </div>
        <!-- /.row -->
        <div class="row row-cols-1 row-cols-md-3">
<?php

if (isset($_GET['cat_id'])) {
  $cat_id = $_GET['cat_id'];















  $query = "select * from products where product_category_id = $cat_id ";
  $products = mysqli_query($connection,$query);
  while ($row=mysqli_fetch_assoc($products)) {
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_category_id = $row['product_category_id'];
    $price = $row['price'];
    $product_description = $row['product_description'];
    $product_image = $row['product_image'];
    $product_short_desc = $row['product_short_desc'];

?>







  <div class="col mb-4">
    <div class="card">
      <?php    echo "    <img src=' admin/productpics/$product_image '  class='card-img-top' >" ; ?>
      <div class="card-body">
        <h5 class="card-title"><?php echo $product_title; ?></h5>
        <p class="card-text"><?php echo $product_short_desc; ?></p>
                   <a  class=" btn btn-primary"   href="cart.php?add=<?php echo $product_id  ?>">Add to Cart   </a>
            <a href="item.php?product_id=<?php echo $product_id; ?>" class="card-link btn btn-outline-primary ">more info</a>
      </div>
    </div>
  </div>

<?php }} ?>

</div>


        <!-- /.row -->

        <hr>



    </div>
    <!-- /.container -->

  <?php include 'includes/footer.php'; ?>

</body>

</html>
