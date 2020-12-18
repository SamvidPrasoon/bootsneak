<?php include 'includes/dbconfig.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/function.php'; ?>

    <!-- Page Content -->








    <div class="container">








<form action="">



 <?php echo display_message();?>

 <h1 class="text-primary mt-2">Checkout</h1>
  <table class="table table-striped mt-3">

  <thead class="thead-dark">


    <tr>
      <th scope="col">product</th>
      <th scope="col">price</th>
      <th scope="col">quantity</th>
      <th scope="col">sub-total</th>
    </tr>
  </thead>
  <tbody>

    <?php
       $total=0;
       $quantity = 0;
     foreach ($_SESSION as $name => $value) {
       if ($value > 0) {
         // code...


       if (substr($name, 0, 8) == "product_") {
     $length = strlen($name);
     $id  = substr($name, 8, $length );


     $query = "select * from products where product_id = '".$id."' ";
     $disp_products =mysqli_query($connection,$query);
     while ($row = mysqli_fetch_assoc($disp_products)) {


       $product_id = $row['product_id'];
       $product_title = $row['product_title'];
       $product_category_id = $row['product_category_id'];
       $price = $row['price'];
       $product_description = $row['product_description'];
       $product_quantity = $row['product_quantity'];
       $product_image = $row['product_image'];

        $sub_total =$price*$value;

     ?>

    <tr>

      <td><?php echo $product_title;  ?><br>
    <?php    echo "     <img width='100' src=' admin/productpics/$product_image '  >" ; ?>
    </td>
      <td>  &#8377 <?php echo $price ?></td>
      <td> <?php echo $value ?></td>
      <td>   &#8377 <?php echo $sub_total; ?></td>
        <td><a class="btn btn-warning" href="cart.php?remove=<?php echo $product_id ?>"><i class="fa fa-times" aria-hidden="true"></i>
</td>
<td><a class="btn btn-primary" href="cart.php?add=<?php echo $product_id ?>"><i class="fa fa-cart-plus" aria-hidden="true"></i>

</td>
        <td><a class="btn btn-danger" href="cart.php?delete=<?php echo $product_id ?>"><i class="fa fa-trash-o" aria-hidden="true"></i>
</td>
    </tr>
  <?php } ?>

  <?php $_SESSION['item_total'] = $total += $sub_total; ?>
  <?php $_SESSION['item_quantity'] = $quantity += $value; ?>
  <?php   } } }?>

  </table>
</form>




<div class="col-md-4 float-right ">
<h2>Cart Totals</h2>

<table class="table table-striped" cellspacing="0">

<tr class="cart-subtotal">
<th>Items:</th>
<td>&#8377<span class="amount"><?php echo isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity'] : $_SESSION['item_quantity'] = "0"; ?></span></td>
</tr>
<tr class="shipping">
<th>Shipping and Handling</th>
<td>Free Shipping</td>
</tr>

<tr class="order-total">
<th>Order Total</th>
<td>&#8377<strong><span class="amount"><?php echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0"; ?></span></strong> </td>
</tr>
<tr class="BUY NOW">
<th>BUY NOW</th>
<td><strong><span class="amount"><a href="thankyou.php" class="btn btn-primary" >BUY NOW </a></span></strong> </td>
</tr>













</tbody>

</table>

</div><!-- CART TOTALS-->



   <?php include 'includes/footer.php'; ?>


</div>






</body>


</html>
