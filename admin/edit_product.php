<?php include 'header.php'; ?>
<?php include '../includes/dbconfig.php'; ?>
<?php include '../includes/function.php'; ?>


<?php
if (isset($_GET['edit'])) {
  $product_id=$_GET['edit'];


$query="select * from products where product_id={$product_id}  ";
$updateproduct = mysqli_query($connection,$query);


while ($row=mysqli_fetch_assoc($updateproduct)) {
  $product_id = $row['product_id'];
  $product_title          = $row['product_title'];
  $product_category_id    = $row['product_category_id'];
  $price          =$row['price'];
  $product_description    = $row['product_description'];
  $product_short_desc             = $row['product_short_desc'];
  $product_quantity       = $row['product_quantity'];
  $product_image          = $row['product_image'];



}

       if (isset($_POST['update'])) {

         $product_title          = $_POST['product_title'];
         $product_category_id    = $_POST['product_category_id'];
         $price          =$_POST['price'];
         $product_description    = $_POST['product_description'];
         $product_short_desc             = $_POST['product_short_desc'];
         $product_quantity       = $_POST['product_quantity'];
         $product_image          = $_FILES['file']['name'];
         $image_temp_location    = $_FILES['file']['tmp_name'];


         if(empty($product_image)) {

$get_pic = "SELECT product_image FROM products WHERE product_id = $product_id";
$get_pic=mysqli_query($connection,$query);

while($pic = mysqli_fetch_assoc($get_pic)) {

$product_image = $pic['product_image'];

    }

}












         move_uploaded_file($image_temp_location  ,"productpics/"  . $product_image);















         $query = "UPDATE products SET  ";
 $query .= "product_title            = '{$product_title}'        , ";
 $query .= "product_category_id      = '{$product_category_id}'  , ";
 $query .= "price            = '{$price}'        , ";
 $query .= "product_description      = '{$product_description}'  , ";
 $query .= "product_short_desc               = '{$product_short_desc}'  , ";
 $query .= "product_quantity         = '{$product_quantity}'     , ";
 $query .= "product_image            = '{$product_image}'          ";
  $query .= "WHERE product_id = {$product_id} ";


       $update_product = mysqli_query($connection,$query);

          if (!$update_product) {
            die("query failed"  . mysqli_error($connection)) ;
          }
          else {
            set_message("product updated successfully");
            header("location:products.php");
          }

       }
}

 ?>
 <?php
 $query = "select * from categories";
 $category = mysqli_query($connection,$query);
 while ($row=mysqli_fetch_assoc($category)) {
   $cat_title= $row['cat_title'];
   $cat_id = $row['cat_id'];
 }
   ?>









        <div id="page-wrapper">

            <div class="container-fluid">






<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Edit Product

</h1>
</div>



<form action="<?php $_php_self ?>" method="POST" enctype="multipart/form-data">


<div class="col-md-8">

<div class="form-group">
    <label for="product-title">Product Title </label>
        <input type="text" name="product_title" class="form-control" value="<?php echo $product_title; ?>" required >

    </div>


    <div class="form-group">
           <label for="product-title">Product Description</label>
      <textarea required  name="product_description" id="" cols="30" rows="10" class="form-control"><?php echo $product_description; ?></textarea>
    </div>



    <div class="form-group row">

      <div class="col-xs-3">
        <label for="product-price">Product Price</label>
        <input type="number" name="price" class="form-control" size="60" value="<?php echo $price; ?>" required >
      </div>
    </div>

    <div class="form-group">
               <label for="product-title">Product Short Description</label>
          <textarea required name="product_short_desc" id="" cols="30" rows="3" class="form-control"><?php echo $product_short_desc; ?></textarea>
        </div>





</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">


     <div class="form-group">

        <input type="submit" name="update" class="btn btn-primary btn-lg" value="update">
    </div>


     <!-- Product Categories-->

    <div class="form-group">
         <label for="product-title">Product Category</label>

        <select name="product_category_id" id="" class="form-control">
          <?php
          $query = "select * from categories";
          $category = mysqli_query($connection,$query);
          while ($row=mysqli_fetch_assoc($category)) {
            $cat_title= $row['cat_title'];
            $cat_id = $row['cat_id'];

              echo "<option value='$cat_id'>$cat_title</option>";
          }
            ?>

        </select>


</div>








    <div class="form-group">
      <label for="product-title">Product quantity</label>
          <input type="number" name="product_quantity" class="form-control" value="<?php echo $product_quantity; ?>" required >
    </div>







    <!-- Product Image -->
    <div class="form-group">
        <label for="product-title">Product Image</label>
        <input type="file" name="file" value="<?php echo $product_image ?>">
        <?php echo "<img width='200'src='productpics/$product_image'>"  ?>

    </div>



</aside><!--SIDEBAR-->



</form>







            </div>


        </div>


    </div>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>




</body>

</html>
