
<?php include 'header.php'; ?>
<?php include '../includes/dbconfig.php'; ?>

<?php if (!isset($_SESSION['user_role']) == "admin" ) {
  header("location: ../index.php");
} ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- /.row -->
                <div class="row">

                            <div class="col-lg-4 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">


                                      <?php

                                      $query= "select * from orders";
                                      $count_orders = mysqli_query($connection,$query);
                                      $orders = mysqli_num_rows($count_orders);

                                        echo " <div class='huge'>$orders</div>";
                                       ?>

                                        <div> Orders!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                      <?php

                                      $query= "select * from products";
                                      $count_products = mysqli_query($connection,$query);
                                      $products = mysqli_num_rows($count_products);

                                        echo " <div class='huge'>$products</div>";
                                       ?>
                                        <div>Products!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="products.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                      <?php

                                      $query= "select * from Categories";
                                      $count_category = mysqli_query($connection,$query);
                                      $category = mysqli_num_rows($count_category);

                                        echo " <div class='huge'>$category</div>";
                                       ?>
                                        <div>Categories!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                   <span class="pull-left">View Detail</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>


                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading ">
                                <h1 class="panel-title"><i class="fa fa-money fa-fw"></i> Transactions Panel</h1>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead class="bg-info">
                                            <tr>
                                                <th>Order #</th>
                                                <th>Order Date</th>
                                                <th>Order amount</th>
                                                <th>order quantity</th>
                                                <th>order status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
            <?php

            $query="select * from orders  ";
            $orders = mysqli_query($connection,$query);
              while ($row=mysqli_fetch_assoc($orders)) {
                 $order_id = $row['order_id'];
                 $order_date = $row['order_date'];
                 $order_amount = $row['order_amount'];
                 $order_quantity = $row['order_quantity'];
                 $order_status = $row['order_status'];




             ?>

                               <?php

                                          echo " <tr>";
                                          echo "<td> $order_id</td>";
                                          echo "<td>   $order_date</td>";
                                          echo "<td>   $order_amount</td>";
                                          echo "<td> $order_quantity</td>";
                                          echo " <td> $order_status</td>";
                                              echo "<td><a class='btn btn-danger'  href='index.php?delete={$order_id}'><i class='fa fa-times'></i></a></td>";
                                          echo " </tr>";

                                ?>
                                          <?php } ?>

                                        </tbody>


<?php



 if (isset($_GET['delete'])) {
    $delete=$_GET['delete'];
    $query = "delete from  orders where order_id={$order_id}";
    $delete_query= mysqli_query($connection,$query);
    header("Location:index.php");
 }



 ?>






                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
























                </div>


            </div>


        </div>


    </div>


    <script src="js/jquery.js"></script>


    <script src="js/bootstrap.min.js"></script>


</body>

</html>
