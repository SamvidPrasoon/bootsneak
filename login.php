<?php include 'includes/dbconfig.php' ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/function.php'; ?>



<?php

if (isset($_POST['submit'])) {

  session_start();
  $username = $_POST["username"];
  $password = $_POST["password"];


$username = mysqli_real_escape_string($connection,$username);
$password = mysqli_real_escape_string($connection,$password);

  $query =  "select * from users where username = '".$username."' and password = '".$password."' ";
  $login = mysqli_query($connection,$query);



  while ($row = mysqli_fetch_assoc($login)) {
    $db_user_id = $row["user_id"];
    $db_username =  $row["username"];
    $db_user_password = $row["password"];
    $user_role = $row["user_role"];

  }
  if ($username === $db_username  &&  $password === $db_user_password && $user_role === "admin") {

    $_SESSION["username"] = $db_username;
    $_SESSION["user_id"] =   $db_user_id;
    $_SESSION["Password"] =   $db_user_password;
    $_SESSION['user_role'] = $user_role;



    header("location: admin/index.php");
  }
  elseif ($username === $db_username  &&  $password === $db_user_password && $user_role === "user") {
    $_SESSION["username"] = $db_username;
    $_SESSION["user_id"] =   $db_user_id;
    $_SESSION["Password"] =   $db_user_password;
      $_SESSION['user_role'] = $user_role;



    header("location: index.php");
  }
  else {
    echo "your username or password is wrong";
    header("location: login.php");
  }
}


 ?>









<link rel="stylesheet" href="css/login.css">
    <div class="container mt-5 ">
      <div class="jumbotron bg-primary rounded-pill ">
    <div class="container bg-warning rounded-pill ">
      <h1 class="display-4">BOOTSNEAK</h1>
      </div>
      </div>
      <?php if (isset($_SESSION["message"])) {?>
        <div class="alert alert-primary" role="alert">
        <?php display_message(); ?>
      </div>
    <?php } ?>

    <form action="<?php $_php_self ?>" method="POST" >

      <h1 class="text-info">REGISTER </h1>

  <div class="form-group">
    <label class="text-primary" for="exampleInputEmail1" >username</label>
    <input type="text" name="username"class="form-control col-md-5 " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username" required>

  </div>
  <div class="form-group">
    <label class="text-primary"  for="exampleInputPassword1">Password</label>
    <input type="password"  name="password" class="form-control col-md-5 " id="exampleInputPassword1" placeholder="Password" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your password with anyone else.</small>
  </div>


  <input  class="btn btn-primary col-md-2" type="submit" name="submit" value="login">
</form>

  </div>
  </body>
</html>
