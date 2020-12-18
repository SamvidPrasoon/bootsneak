<?php
include 'includes/dbconfig.php';

include 'includes/header.php';


 ?>




<div class="container">

<div class="row">



  <div class="col-md-3 mt-3">
      <p class="lead">Shop by category</p>
      <div class="list-group ">
        <?php
        $query = "select * from categories";
        $category = mysqli_query($connection,$query);
        while ($row=mysqli_fetch_assoc($category)) {
          $cat_title= $row['cat_title'];
          $cat_id = $row['cat_id'];

            echo "<a href='category.php?cat_id=$cat_id' class='list-group-item btn btn-outline-info rounded-pill'>$cat_title </a>";
        }


         ?>
      </div>
  </div>



<div class="col-md-9 mt-3">
<?php

if (isset($_GET['product_id'])) {
  $product_id=$_GET['product_id'];

  $query = "select * from products where product_id = $product_id";
  $products = mysqli_query($connection,$query);
  while ($row=mysqli_fetch_assoc($products)) {
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_category_id = $row['product_category_id'];
    $price = $row['price'];
    $product_description = $row['product_description'];
    $product_short_desc = $row['product_short_desc'];
    $product_image = $row['product_image'];


}
}

   ?>






      <div class="row">
           <div class="col-md-7">

                   <?php    echo "      <img  class='img-fluid rounded-pill' src=' admin/productpics/$product_image '   >" ; ?>

           </div>

<div class="col-md-5">
  <div class="card"style="width: 18rem;">
<div class="card-body">
  <h5 class="card-title"><?php echo $product_title; ?></h5>
  <h6 class="card-subtitle mb-2 text-muted"><?php echo $price; ?></h6>
  <p class="card-text"><?php echo $product_short_desc; ?></p>
  <a href="cart.php?add=<?php echo $product_id  ?>" class="card-link btn btn-primary">add to cart</a>

</div>
</div>
</div>

      </div>
</div>

 </div>


 <div class="row">
     <div role="tabpanel">
         <!-- Nav tabs -->
         <ul class="nav nav-tabs" role="tablist">
             <li role="presentation" class="active nav-item"><a href="#home" aria-controls="home" role="tab" data-toggle="tab" class="nav-link">Description</a>
             </li>
             <li role="presentation" class="nav-item"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"
                 class="nav-link">Reviews</a>
             </li>
         </ul>
         <!-- Tab panes -->
         <div class="tab-content">
             <div role="tabpanel" class="tab-pane active" id="home">
                 <p></p>
                 <p><?php echo $product_description; ?></p>

             </div>
             <div role="tabpanel" class="tab-pane" id="profile">
                 <div class="col-lg-6 mt-4">
                      <h3> Reviews  </h3>
                     <hr>
                     <?php
                     $query="select * from comments where comment_product_id = $product_id ";
                     $query.="AND comment_status = 'approved' ";
                     $query.="ORDER BY comment_id DESC";
                     $comment = mysqli_query($connection,$query);


                     while ($row=mysqli_fetch_assoc($comment)) {
                       $comment_id=$row['comment_id'];
                       $comment_product_id=$row['comment_product_id'];
                       $comment_author=$row['comment_author'];
                       $comment_content=$row['comment_content'];
                       $comment_email=$row['comment_email'];
                       $comment_status=$row['comment_status'];
                       $comment_date=$row['comment_date'];

                     ?>




                     <div class="row">
                         <div class="col-lg-12"> <span class="glyphicon glyphicon-star"></span>
  <span class="glyphicon glyphicon-star"></span>
                             <span
                             class="glyphicon glyphicon-star"></span> <span class="glyphicon glyphicon-star"></span>
  <span class="glyphicon glyphicon-star-empty"></span>
    <?php echo $comment_author; ?>
                                 <span
                                 class="float-right"><?php echo $comment_date; ?></span>
                                     <p><?php echo $comment_content; ?></p>
                         </div>
                     </div>
                     <hr>

<?php } ?>



                 </div>
                 <?php
                     if (isset($_POST['comment'])) {
                       $product_id = $_GET['product_id'];

                       $comment_author = $_POST['comment_author'];
                       $comment_email = $_POST['comment_email'];
                       $comment_content = $_POST['comment_content'];



                        if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {


                     $query = "INSERT INTO comments (comment_product_id, comment_author, comment_email, comment_content, comment_status,comment_date)";

                     $query .= "VALUES ($product_id ,'{$comment_author}', '{$comment_email}', '{$comment_content }', 'approved',now())";

                     $create_comment_query = mysqli_query($connection, $query);

                     if (!$create_comment_query) {
                         die('QUERY FAILED' . mysqli_error($connection));


                     }
                     else {
                       header("location:item.php?product_id= $product_id ");
                     }

                 }


               }


                  ?>











                 <div class="col-6 mt-4">
                      <h3>Add A review</h3>
                     <form action="<?php $_php_self ?>" class="form-inline" method="post">
                         <div class="form-group">
                             <label for="">Name</label>
                             <input type="text" class="form-control" name="comment_author">
                         </div>
                         <div class="form-group">
                             <label for="">Email</label>
                             <input type="test" class="form-control" name="comment_email">
                         </div>
                         <div>
                              <h3 class="mt-4">Your Rating</h3>
  <span class="glyphicon glyphicon-star"></span>
  <span class="glyphicon glyphicon-star"></span>
                             <span
                             class="glyphicon glyphicon-star"></span> <span class="glyphicon glyphicon-star"></span>
                         </div>
                         <br>
                         <div class="form-group">
                             <textarea name="comment_content" id="" cols="60" rows="10" class="form-control"></textarea>
                         </div>
                         <br>
                         <br>
                         <div class="form-group">
                             <input type="submit" class="btn btn-primary" name="comment"  value="SUBMIT">
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
 

 </div>




<?php include 'includes/footer.php'; ?>












</div>
