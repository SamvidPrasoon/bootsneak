<?php
    include 'includes/dbconfig.php';
    include 'includes/header.php';
    include 'includes/function.php';

 ?>
 <?php

 if (isset($_POST['user'])) {


        $user_firstname    = $_POST['user_firstname'];
        $user_lastname     = $_POST['user_lastname'];

        $username          = $_POST['username'];
        $email             = $_POST['user_email'];
        $password          = $_POST['user_password'];
        $user_image          = $_FILES['file']['name'];
        $image_temp_location    = $_FILES['file']['tmp_name'];

 move_uploaded_file($image_temp_location  ,"admin/userpics/"  . $user_image);

           $query = "INSERT INTO users(user_firstname,user_lastname,username,email,user_role,password ,user_image)";

     $query .= "VALUES('{$user_firstname}','{$user_lastname}' ,'{$username}','{$email}','user','{$password}','{$user_image}') ";

     $user_query = mysqli_query($connection, $query);


           if (!$user_query) {
           die("query failed" . mysqli_error($connection));
           }


          set_message("Registered successfully please login for shopping");
          header("location:login.php");

 }




  ?>




<!DOCTYPE html>


<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>registration</title>

  </head>
<style type="text/css">

  body{
    background-image: url("banner.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    z-index: -1;
  }
  label{
    font-size: 20px;
    color: white;
  }
</style>
  <body>


  <div class="container register-form mt-4 ">

    <div class="jumbotron bg-primary rounded-pill ">
    <div class="container bg-warning rounded-pill ">
    <center><h1 class="display-4">REGISTER</h1></center>
    </div>
    </div>


       <center>
       <form  action="<?php $_php_self  ?> " method="POST" enctype="multipart/form-data" class="ml-5">

           <div class="form-group ">
             <label for="title">firstname</label>
             <input type="text" class="form-control col-md-5" name="user_firstname" required  >
           </div>

           <div class="form-group">
             <label for="post_category"> lastname</label>
             <input type="text" class="form-control col-md-5" name="user_lastname" required >
           </div>

           <div class="form-group">
             <label for="title">username</label>
             <input type="text" class="form-control  col-md-5" name="username" required  >
           </div>




           <div class="form-group">
             <label for="title">email</label>
             <input type="email" class="form-control  col-md-5" name="user_email" required  >
           </div>

           <div class="form-group">
             <label for="title">password</label>
             <input type="password" class="form-control  col-md-5" name="user_password"  required >
           </div>



           <div class="form-group">
             <input class="btn btn-primary btn-lg"type="submit" name="user" value="Register" required >
           </div>
           <div class="form-group">
               <label for="product-title">user Image</label>
               <input type="file" name="file">

           </div>

       </form>
     </center>


          </div>
          </body>
</html>
