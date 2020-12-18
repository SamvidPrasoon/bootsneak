<?php include 'header.php'; ?>
<?php include '../includes/dbconfig.php'; ?>
<?php include '../includes/function.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">
      <h1 class="page-header">
         Welcome admin

      </h1>





<?php

if (isset($_POST['user'])) {


       $user_firstname    = $_POST['user_firstname'];
       $user_lastname     = $_POST['user_lastname'];

       $username          = $_POST['username'];
       $email             = $_POST['user_email'];
       $password          = $_POST['user_password'];
       $user_image          = $_FILES['file']['name'];
       $image_temp_location    = $_FILES['file']['tmp_name'];

       move_uploaded_file($image_temp_location  ,"userpics/"  . $user_image);

          $query = "INSERT INTO users(user_firstname,user_lastname,username,email,user_role,password,user_image )";

    $query .= "VALUES('{$user_firstname}','{$user_lastname}' ,'{$username}','{$email}','user','{$password}','{$user_image}') ";

    $user_query = mysqli_query($connection, $query);


          if (!$user_query) {
          die("query failed" . mysqli_error($connection));
          }


        echo "<div class='alert alert-info' role='alert'>User Registerd Successfully   </div> ";

}




 ?>





<form  action="<?php $_php_self  ?> " method="POST" enctype="multipart/form-data">
  <div class="form-group">
      <label for="product-title">user Image</label>
      <input type="file" name="file">

  </div>
    <div class="form-group">
      <label for="title">firstname</label>
      <input type="text" class="form-control" name="user_firstname" required >
    </div>

    <div class="form-group">
      <label for="post_category"> lastname</label>
      <input type="text" class="form-control" name="user_lastname" required  >
    </div>

    <div class="form-group">
      <label for="title">username</label>
      <input type="text" class="form-control" name="username" required >
    </div>




    <div class="form-group">
      <label for="title">email</label>
      <input type="email" class="form-control" name="user_email" required  >
    </div>

    <div class="form-group">
      <label for="title">password</label>
      <input type="password" class="form-control" name="user_password" required  >
    </div>



    <div class="form-group">
      <input class="btn btn-primary btn-lg"type="submit" name="user" value="Add user">
    </div>

</form>

</div>
</div>
