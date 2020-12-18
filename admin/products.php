<?php include 'header.php'; ?>
<?php include '../includes/dbconfig.php'; ?>
<?php include '../includes/function.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

             <div class="row">

<h1 class="page-header">
   All Products

</h1>
<table class="table table-hover">


    <thead>
      <?php

      display_message();


       ?>
      <tr>

           <th>Id</th>
           <th>Title</th>
           <th>Category</th>
           <th>Price</th>
            <th>quantity</th>
      </tr>
    </thead>
    <tbody>

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
        $product_quantity = $row['product_quantity'];


        $query = "select * from categories where cat_id = '".$product_category_id."' ";
        $category = mysqli_query($connection,$query);
        while ($row=mysqli_fetch_assoc($category)) {
          $cat_title= $row['cat_title'];
          $cat_id = $row['cat_id'];

     }

       ?>


      <tr>
            <td> <?php echo  $product_id;  ?> </td>
            <td><?php echo   $product_title; ?> <br>
      <?php    echo "     <img width='100' src='  productpics/$product_image ' >" ; ?>
            </td>
              <td><?php echo $cat_title ?></td>

            <td><?php echo $price; ?></td>
            <td><?php echo   $product_quantity; ?></td>
          <td><a class="btn btn-danger" href="products.php?delete=<?php echo $product_id ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
            <td><a class="btn btn-primary" href="edit_product.php?edit=<?php echo $product_id ?>">UPDATE</a></td>
        </tr>

<?php }  ?>



<?php
if (isset($_GET['delete'])) {
  $product_id = $_GET['delete'];
   $query = "delete from  products where product_id={$product_id}";
   $delete_query= mysqli_query($connection,$query);
   set_message("product deleted successfully");
   header("Location:products.php");
}


 ?>



  </tbody>
</table>
















             </div>

            </div>
          

        </div>








    </div>



    <script src="js/jquery.js"></script>


    <script src="js/bootstrap.min.js"></script>




</body>

</html>
