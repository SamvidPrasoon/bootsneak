<?php include 'header.php'; ?>
<?php include '../includes/dbconfig.php'; ?>
<?php include '../includes/function.php'; ?>


<?php
if(isset($_POST['publish'])) {


$product_title          = $_POST['product_title'];
$product_category_id    = $_POST['product_category_id'];
$price          =$_POST['price'];
$product_description    = $_POST['product_description'];
$product_short_desc             = $_POST['product_short_desc'];
$product_quantity       = $_POST['product_quantity'];
$product_image          = $_FILES['file']['name'];
$image_temp_location    = $_FILES['file']['tmp_name'];

move_uploaded_file($image_temp_location  ,"productpics/"  . $product_image);





          $query = "INSERT INTO products(product_title, product_category_id, price, product_description, product_short_desc, product_quantity, product_image)";

    $query .= "VALUES('{$product_title}', '{$product_category_id}', '{$price}', '{$product_description}', '{$product_short_desc}', '{$product_quantity}', '{$product_image}') ";

    $product_query = mysqli_query($connection, $query);


          if (!$product_query) {
          die("query failed");
          }
          else {
            set_message("New Product  was Added successfully");
            header('Location:products.php');
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
   Add Product

</h1>
</div>



<form action="<?php $_php_self ?>" method="POST" enctype="multipart/form-data">


<div class="col-md-8">

<div class="form-group">
    <label for="product-title">Product Title </label>
        <input type="text" name="product_title" class="form-control" required >

    </div>


    <div class="form-group">
           <label for="product-title">Product Description</label>
      <textarea required name="product_description" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>



    <div class="form-group row">

      <div class="col-xs-3">
        <label for="product-price">Product Price</label>
        <input type="number" name="price" class="form-control"  required size="60">
      </div>
    </div>

    <div class="form-group">
               <label for="product-title">Product Short Description</label>
          <textarea required name="product_short_desc" id="" cols="30" rows="3" class="form-control"></textarea>
        </div>





</div><!--Main Content-->





<aside id="admin_sidebar" class="col-md-4">


     <div class="form-group">

        <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Publish">
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
          <input type="number" name="product_quantity" class="form-control" required >
    </div>







    <!-- Product Image -->
    <div class="form-group">
        <label for="product-title">Product Image</label>
        <input type="file" name="file">

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
