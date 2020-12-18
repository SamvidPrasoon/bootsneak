<?php
    include 'includes/dbconfig.php';
    include 'includes/header.php';
    include 'includes/function.php';

 ?>







<?php


if (isset($_GET['edit'])) {
  $user_id=$_GET['edit'];


$query="select * from users where user_id={$user_id}  ";
$updateuser = mysqli_query($connection,$query);


while ($row=mysqli_fetch_assoc($updateuser)) {
$user_id = $row['user_id'];
$username = $row['username'];
$password = $row['password'];
$user_firstname = $row['user_firstname'];
$user_lastname = $row['user_lastname'];
$email = $row['email'];
$user_role = $row['user_role'];
$user_image = $row['user_image'];
}

if (isset($_POST['user'])) {


       $user_firstname    = $_POST['user_firstname'];
       $user_lastname     = $_POST['user_lastname'];

       $username          = $_POST['username'];
       $email        = $_POST['user_email'];
       $password     = $_POST['user_password'];
       $user_image          = $_FILES['file']['name'];
       $image_temp_location    = $_FILES['file']['tmp_name'];









       if(empty($user_image)) {

    $getpic = "SELECT user_image FROM users WHERE user_id = $user_id";
    $getpic=mysqli_query($connection,$query);

    while($pic = mysqli_fetch_assoc($getpic)) {

    $user_image = $pic['user_image'];

    }

    }











 move_uploaded_file($image_temp_location  ,"admin/userpics/"  . $user_image);

         $query = "UPDATE users SET ";
         $query .="user_firstname  = '{$user_firstname }', ";
         $query .="user_lastname   = '{$user_lastname }',  ";
         $query .="username = '{$username}', ";
         $query .="email = '{$email}', ";
         $query .="password   = '{$password}', ";
         $query .= "user_image  = '{$user_image}' ";
          $query .= "WHERE user_id = {$user_id} ";

       $update_user = mysqli_query($connection,$query);

              if (!$update_user) {
                die("query failed" .   mysqli_error($connection)  );
              }
              else {
                set_message("user updated Successfully");

              }

       }

}
 ?>

 <form  action="" method="POST" enctype="multipart/form-data" class="container">

   <div class=" container jumbotron bg-warning rounded-pill mt-3">
   <div class="container bg-dark rounded-pill ">
  <center> <h1 class="display-4">PROFILE</h1></center>
   </div>
   </div>
     <?php
     if (isset($_POST['user'])) {
    echo "<div class='alert alert-info' role='alert'>";
     display_message();
     echo "</div>" ;
     }



      ?>
   <div class="form-group">
       <label for="product-title">Profile Image</label>
       <input type="file" name="file" value="<?php echo $user_image; ?>">
       <?php echo "<img width='200'src='admin/userpics/$user_image'>"  ?>

   </div>

     <div class="form-group">
       <label for="title">firstname</label>
       <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>"  required >
     </div>

     <div class="form-group">
       <label for="post_category"> lastname</label>
       <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>" required  >
     </div>

     <div class="form-group">
       <label for="title">username</label>
       <input type="text" value="<?php echo $username; ?>" class="form-control" name="username" required  >
     </div>




     <div class="form-group">
       <label for="title">email</label>
       <input type="email" class="form-control" name="user_email" required  value="<?php echo $email; ?>" >
     </div>

     <div class="form-group">
       <label for="title">password</label>
       <input type="password" class="form-control" name="user_password" required value="<?php echo $password; ?>">
     </div>



     <div class="form-group">
       <input class="btn btn-primary btn-lg" type="submit" name="user" value="update profile">
     </div>

 </form>



</div>
<?php include 'includes/footer.php'; ?>
</div>
