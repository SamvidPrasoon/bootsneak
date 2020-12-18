
<?php SESSION_start(); ?>
<?php include 'includes/dbconfig.php'; ?>
<?php
$query="select * from users";
$users = mysqli_query($connection,$query);
while ($row=mysqli_fetch_assoc($users)) {
$user_id = $row['user_id'];
$username = $row['username'];
$user_password = $row['password'];
$user_firstname = $row['user_firstname'];
$user_lastname = $row['user_lastname'];
$user_email = $row['email'];
$user_role = $row['user_role'];
  $user_image = $row['user_image'];
}
?>






<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>




     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


    <link rel="stylesheet" href="css/home.css">




</head>

<body>
  <!-- Navigation -->

  <nav class="navbar navbar-expand-lg navbar-light bg-primary">



    <a class="navbar-brand" href="index.php">BOOTSNEAK</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="shop.php"><i class="fa fa-shopping-basket" aria-hidden="true"></i>
SHOP <span class="sr-only">(current)</span></a>
        </li>





          <li class="nav-item active">
            <a class="nav-link" href="admin/index.php"><i class="fa fa-lock" aria-hidden="true"></i>
           admin</a>
          </li>






        <li class="nav-item active">

          <a class="nav-link" href="checkout.php"><i class="fa fa-money" aria-hidden="true"></i>
checkout</a>
        </li>



      </ul>

      <ul class="navbar-nav ml-auto">


        <?php
     if (!isset($_SESSION['username'])) {
       echo "<li class='nav-item active' >";
        echo "<a class='nav-link' href='login.php'><i class='fa fa-sign-in' aria-hidden='true'></i> Login </a> ";
      echo "</li>";

     }

         ?>

         <?php
       if (isset($_SESSION['username'])) {
        echo "<li class='nav-item active' >";
         echo "<a class='nav-link' href='admin/logout.php'><i class='fa fa-sign-in' aria-hidden='true'></i> Logout </a> ";
       echo "</li>";

       }

          ?>
          <?php
        if (isset($_SESSION['username'])) {
         echo "<li class='nav-item active' >";
          echo "<a class='nav-link'  href='updatepro.php?edit={$_SESSION['user_id']}'><i class='fa fa-sign-in' aria-hidden='true'></i> profile </a> ";
        echo "</li>";

        }

           ?>






        <li class="nav-item active ">
          <a class="nav-link" href="registration.php"><i class="fa fa-registered" aria-hidden="true"></i>
Register</a>
        </li>
        <li class="nav-item active ">
          <a class="nav-link" href="#">
      <?php
      if (isset($_SESSION['username'])) {
      echo    strtoupper(  $_SESSION['username']);
      }
       ?>

</a>
        </li>









</ul>
    </div>

  </nav>
