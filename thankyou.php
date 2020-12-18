<?php include 'includes/dbconfig.php'; ?>
<?php include 'includes/function.php'; ?>
<?php include 'includes/header.php'; ?>
<center>
<div class="container jumbotron mt-4 rounded-pill">
  <div class=" display-3">
    CHECKOUT
  </div>
  <div class="lead display-4">


<?php
if (isset($_POST['buy'])) {
     display_message() ;
   echo "<a class='btn btn-outline-primary ml-3' href='index.php'>continue shopping</a>";
}

  ?>
  </div>
  <form  class="mt-4 "action="<?php $_php_self ?>" method="POST">
    <div class="form-group">
      <label for="exampleInputEmail1">TOTAL PRICE</label>
      <input type="text" required   name="price" class="form-control col-md-4" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $_SESSION['item_total'] ?>">

    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">QUANTITY</label>
      <input type="text"  required  name="quantity" class="form-control col-md-4" id="exampleInputPassword1" value="<?php echo $_SESSION['item_quantity'] ?>">
    </div>

  <input type="submit" name="buy" class="btn btn-primary" value="BUY">
  </form>

</div>
</center>

<?php

if (isset($_POST['buy'])) {
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];
    $order_status = "completed";
    $order_date  = date('d-m-y');

              $query = "INSERT INTO orders (order_date,order_amount,order_quantity,order_status) ";

        $query .= "VALUES( now() ,'{$price}',{$quantity} ,'{$order_status}') ";

   $add_order_query = mysqli_query($connection, $query);


         if (!$add_order_query) {
           die("query failed" . mysqli_error($connection));
         }
         else {
          set_message("Thankyou for doing shopping with us");

         }

}









 ?>
<?php include 'includes/footer.php'; ?>
