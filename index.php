<?php
    include 'includes/dbconfig.php';
    include 'includes/header.php';
   include 'includes/banner.php';
 ?>




<div class="container  mt-3 bg-light text-center area h-50   rounded-pill">
  <div class="row ">
    <div class="col-md-4 col-sm-4 col-xs-2 ">

    <p class="lead text-info">FREE SHIPPING<br><i class="fa fa-truck" aria-hidden="true"></i>
 <br>   On all order over $2000</p>



    </div>
    <div class="col-md-4 col-sm-4  pl-3 pr-3 col-xs-2">
        <p class="lead text-danger">FREE RETURN <br> <i class="fa fa-retweet" aria-hidden="true"></i><br>
  On 1st exchange in 30 days </p>


    </div>
    <div class="col-md-4 col-sm-4 col-xs-2">
        <p class="lead text-success">PREMIUM SUPPORT <br> <i class="fa fa-phone" aria-hidden="true"></i><br>
 support 24 hours a day</p>
    </div>
  </div>
</div>

<div class="ml-3 mt-5">
  <div class="row">
    <div class="col-md-3">
          <p class="lead">Shop by category</p>
          <div class="jumbotron bg-info rounded">


          <div class="list-group">

              <?php
              $query = "select * from categories";
              $category = mysqli_query($connection,$query);
              while ($row=mysqli_fetch_assoc($category)) {
                $cat_title= $row['cat_title'];
                $cat_id = $row['cat_id'];

                  echo "<a href='category.php?cat_id=$cat_id' class='list-group-item btn btn-outline-info rounded-pill mt-3'>$cat_title </a>";
              }


               ?>





  </div>
          </div>
      </div>




      <div class="container  mt-5">


        <div class="row row-cols-1 row-cols-md-4">

          <?php

          $query = "select * from products ";
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




            <div class="card ">
                <?php    echo "    <a href='item.php?product_id= $product_id '>  <img src=' admin/productpics/$product_image '  class='card-img-top' ></a>" ; ?>

              <div class="card-body">
                <h5 class="card-title"><a href="item.php?product_id=<?php echo $product_id  ?>"> <?php echo $product_title;?> </a> </h5>
                  <h5 class="card-title ">Rs<?php echo $price; ?></h5>
                <p class="card-text"><?php echo $product_short_desc; ?></p>
             <p><a  class=" btn btn-outline-primary"   href="cart.php?add=<?php echo $product_id  ?>">Add to Cart   </a></p>
              </div>

            </div>



          </div>

<?php } ?>

        </div>



      </div>



  </div>
</div>













<?php

  include 'includes/footer.php';
 ?>
