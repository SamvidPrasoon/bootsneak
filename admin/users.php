
<?php include 'header.php'; ?>
<?php include '../includes/dbconfig.php'; ?>
<?php include '../includes/function.php'; ?>


        <div id="page-wrapper">

            <div class="container-fluid">
              <h1 class="page-header">
                 Welcome admin
             <small><?php echo strtoupper($_SESSION['username']); ?></small>
              </h1>
<a class="btn btn-info " href="adduser.php">Add user</a>
<hr>

<table class="table table-bordered table-hover ">
  <?php
  $query="select * from users   ";
  $users = mysqli_query($connection,$query);

   ?>
  <thead>
    <tr>

 <th>id</th>
 <th>image</th>
  <th>username</th>
 <th>firstname</th>
  <th>lastname</th>
  <th>email</th>
  <th>Role</th>

    </tr>
  </thead>





  <tbody>

    <?php

    while ($row=mysqli_fetch_assoc($users)) {
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['email'];
    $user_role = $row['user_role'];
      $user_image = $row['user_image'];



 echo "  <tr> ";
 echo " <td> $user_id    </td>";
 echo "   <td>  <img width='100' src='  userpics/$user_image ' > </td>" ;
 echo"<td>    $username   </td>";
 echo " <td>      $user_firstname  </td>";
 echo "<td>   $user_lastname    </td>";
echo " <td>    $user_email  </td>";
 echo " <td>    $user_role  </td>";







 echo "<td><a class='btn btn-primary' href='users.php?admin={$user_id}'>Admin</a></td>";
 echo "<td><a class='btn btn-danger' href='users.php?user={$user_id}'>User</a></td>";
echo "<td><a class='btn btn-primary ' href='edituser.php?edit={$user_id}'>Update</a></td>";
 echo "<td><a class='btn btn-danger ' href='users.php?delete={$user_id}'>Delete</a></td>";

 echo  " </tr>";


                           }

                           ?>


  </tbody>


</table>
</div>
</div>

 <?php


 if (isset($_GET['delete'])) {
    $user_id=$_GET['delete'];
    $query = "DELETE from  users where user_id={$user_id}";
    $delete_query= mysqli_query($connection,$query);

    header("Location:users.php");
     echo "<div class='alert alert-info' role='alert'>User Registerd Successfully   </div> ";

 }


 if (isset($_GET['user'])) {
    $user_id=$_GET['user'];
    $query = "UPDATE users SET user_role = 'user' where user_id={$user_id}";
    $update_query= mysqli_query($connection,$query);
    header("Location:users.php");
 }

 if (isset($_GET['admin'])) {
    $user_id=$_GET['admin'];
    $query = "UPDATE users SET user_role = 'admin' where user_id={$user_id}";
    $update_query= mysqli_query($connection,$query);
    header("Location:users.php");
 }



 ?>
