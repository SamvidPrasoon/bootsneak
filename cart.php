<?php include 'includes/dbconfig.php'; ?>
<?php include 'includes/function.php'; ?>
<?php include  'includes/header.php' ?>
<?php

if (isset($_GET['add'])) {
$product_id = $_GET['add'];
$query = "select * from products where product_id = '".$product_id."'";
$add_products =mysqli_query($connection,$query);
if (!$add_products) {
  echo "query failed";
}
while ($row = mysqli_fetch_assoc($add_products)) {
  $product_id = $row['product_id'];
  $product_title = $row['product_title'];
  $product_category_id = $row['product_category_id'];
  $price = $row['price'];
  $product_description = $row['product_description'];
  $product_quantity = $row['product_quantity'];


if ($product_quantity != $_SESSION['product_'.$product_id]) {
    $_SESSION['product_'.$_GET['add']]+=1;
      header("location:checkout.php");
}
else {

  set_message("we only have" . " " .$product_quantity. " " ."$product_title". "availaible");
  header("location:checkout.php");
}


}


//  header("location:index.php");
}


if (isset($_GET['remove'])) {
  $product_id = $_GET['remove'];
  $_SESSION['product_'.$product_id]--;
  if (  $_SESSION['product_'.$product_id]<1) {
    unset($_SESSION['item_total']);
      unset($_SESSION['item_quantity']);
    header("location:checkout.php");
  }else {
      header("location:checkout.php");
  }
}


if (isset($_GET['delete'])) {
  $product_id = $_GET['delete'];
  $_SESSION['product_'.$product_id]='0';
  unset($_SESSION['item_total']);
    unset($_SESSION['item_quantity']);
    header("location:checkout.php");
}






 ?>
