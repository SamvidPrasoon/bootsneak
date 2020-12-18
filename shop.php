<?php include 'includes/dbconfig.php' ?>

<?php include 'includes/header.php'; ?>


    <!-- Page Content -->
    <div class="container mt-3">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer rounded-pill text-center ">
            <h1 class="display-3 text-success">SHOP!<i class="fa fa-shopping-basket" aria-hidden="true"></i>
</h1>

            </p>
        </header>

        <hr>



        <!-- /.row -->
        <div class="row row-cols-1 row-cols-md-3">
<?php



  $query = "select * from products";
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
      <?php    echo "      <img src=' admin/productpics/$product_image '  class='card-img-top' >" ; ?>
      <div class="card-body">
        <h5 class="card-title"><?php echo $product_title; ?></h5>
        <p class="card-text"><?php echo $product_short_desc; ?></p>
          <a href="cart.php?add=<?php echo $product_id  ?>" class="card-link btn btn-primary">add to cart</a>
            <a href="item.php?product_id=<?php echo $product_id; ?>" class="card-link btn btn-outline-primary ">more info</a>
      </div>
    </div>
  </div>

<?php } ?>

</div>


        <hr>


      <?php include 'includes/footer.php'; ?>

    </div>




</body>

</html>
