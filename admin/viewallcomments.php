<?php include 'header.php'; ?>
<?php include '../includes/dbconfig.php'; ?>


        <div id="page-wrapper">

            <div class="container-fluid">


                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">

                            Welcome To Admin
                          <small><?php echo strtoupper($_SESSION['username']); ?></small>

                        </h1>

                        <table class="table table-bordered table-hover">
                          <?php
                          $query="select * from comments ";
                          $comment = mysqli_query($connection,$query);

                           ?>
                          <thead>
                            <tr>

                         <th>id</th>
                          <th>author</th>
                         <th>comment</th>
                          <th>email</th>
                          <th>status</th>
                          <th>in response to</th>
                          <th>date</th>
                            </tr>
                          </thead>





                          <tbody>

                            <?php

                            while ($row=mysqli_fetch_assoc($comment)) {
                              $comment_id=$row['comment_id'];
                              $comment_product_id=$row['comment_product_id'];
                              $comment_author=$row['comment_author'];
                              $comment_content=$row['comment_content'];
                              $comment_email=$row['comment_email'];
                              $comment_status=$row['comment_status'];
                              $comment_date=$row['comment_date'];



                         echo "  <tr> ";
                         echo " <td>   $comment_id  </td>";
                         echo"<td>   $comment_author  </td>";
                         echo " <td>   $comment_content  </td>";
                         echo "<td>   $comment_email  </td>";

                         echo " <td>    $comment_status </td>";



                            $query = "SELECT * FROM products where product_id = $comment_product_id";
                            $select_product_id = mysqli_query($connection,$query);
                              while ($row = mysqli_fetch_assoc($select_product_id)) {
                                 $product_id = $row['product_id'];
                                 $product_title = $row['product_title'];

                         echo "<td> $product_title </td>";
                        }



                         echo " <td>   $comment_date </td>";
                         echo "<td><a class='btn btn-primary' href='viewallcomments.php?approved={$comment_id}'>approved</a></td>";
                         echo "<td><a class='btn btn-danger' href='viewallcomments.php?unapproved={$comment_id}'>unapproved</a></td>";

                         echo "<td><a class='btn btn-danger ' href='viewallcomments.php?deletecomments={$comment_id}'>
                         <i class='fa fa-trash-o' aria-hidden='true'></i>
           </a></td>";

                         echo  " </tr>";


                                                   }

                                                   ?>


                          </tbody>


                        </table>


                        <?php


                         if (isset($_GET['deletecomments'])) {
                            $comment_id=$_GET['deletecomments'];
                            $query = "DELETE from  comments where comment_id={$comment_id}";
                            $delete_query= mysqli_query($connection,$query);
                            header("Location:viewallcomments.php");
                         }


                         if (isset($_GET['unapproved'])) {
                            $comment_id=$_GET['unapproved'];
                            $query = "UPDATE comments SET comment_status = 'unapproved' where comment_id={$comment_id}";
                            $update_query= mysqli_query($connection,$query);
                            header("Location:viewallcomments.php");
                         }

                         if (isset($_GET['approved'])) {
                            $comment_id=$_GET['approved'];
                            $query = "UPDATE comments SET comment_status = 'approved' where comment_id={$comment_id}";
                            $update_query= mysqli_query($connection,$query);
                            header("Location:viewallcomments.php");
                         }



                         ?>









                    </div>
                </div>
              

            </div>


        </div>
