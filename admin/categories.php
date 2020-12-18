<?php include 'header.php'; ?>

<?php include '../includes/dbconfig.php'; ?>
<?php include '../includes/function.php'; ?>


        <div id="page-wrapper">

            <div class="container-fluid">




<?php
if (isset($_POST['add'])) {

  $cat_title = $_POST['cat_title'];
$query = "INSERT INTO categories(cat_title) values('".$cat_title."')";
  $category = mysqli_query($connection,$query);
  if (!$category) {
    die('query falied');
  }
  else {
       set_message("category added successfully");
  }
}



 ?>



<h1 class="page-header">
  Product Categories

</h1>


<div class="col-md-4">

    <form action="<?php $_php_self ?>" method="post">
      <?php
      if (isset($_POST['add'])) {
     echo "<div class='alert alert-info' role='alert'>";
      display_message();
      echo "</div>" ;
      }
       ?>
        <div class="form-group">
            <label for="category-title">Title</label>
            <input type="text" class="form-control" name="cat_title" required >
        </div>

        <div class="form-group">

            <input type="submit" class="btn btn-primary" value="Add Category" name="add" required >
        </div>


    </form>


</div>


<div class="col-md-8">

    <table class="table table-bordered table-hover table-striped">
            <thead>

        <tr>
            <th>id</th>
            <th>Title</th>
        </tr>
            </thead>
            <?php
            $query = "select * from categories";
            $category = mysqli_query($connection,$query);
            while ($row=mysqli_fetch_assoc($category)) {
              $cat_title= $row['cat_title'];
              $cat_id = $row['cat_id'];

              ?>

    <tbody>
        <tr>
            <td><?php echo $cat_id; ?></td>
            <td><?php echo $cat_title; ?></td>
              <td><a class="btn btn-danger btn-lg" href="categories.php?delete=<?php echo $cat_id ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
        </tr>
    </tbody>
  <?php } ?>

        </table>


<?php
        if (isset($_GET['delete'])) {
          $cat_id = $_GET['delete'];
           $query = "delete from  categories where cat_id={$cat_id}";
           $delete_query= mysqli_query($connection,$query);

           header("Location:categories.php");

        }
        ?>
</div>

















            </div>


        </div>

    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>



</body>

</html>
