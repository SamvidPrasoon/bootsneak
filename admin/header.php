<?php SESSION_start(); ?>







<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">




    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style media="screen">
  .navbar{
    background: rgb(34,132,195);
  background: radial-gradient(circle, rgba(34,132,195,1) 0%, rgba(20,26,27,1) 76%);
  }


</style>


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top  " role="navigation">

            <div class="navbar-header ">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"> Admin </a>
                <a class="navbar-brand" href="../index.php">HOME</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
              <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo strtoupper($_SESSION['username']); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">

                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class=" collapse navbar-collapse navbar-ex1-collapse">
                <ul id="a" class="nav navbar-nav side-nav">
                    <li >
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="products.php"><i class="fa fa-fw fa-bar-chart-o"></i> View Products</a>
                    </li>
                    <li>
                        <a href="add_product.php"><i class="fa fa-fw fa-table"></i> Add Product</a>
                    </li>

                    <li>
                        <a href="categories.php"><i class="fa fa-fw fa-desktop"></i> Categories</a>
                    </li>
                    <li>
                        <a href="users.php"><i class="fa fa-fw fa-wrench"></i>Users</a>
                    </li>
                    <li>
                        <a href="viewallcomments.php"><i class="fa fa-comments-o" aria-hidden="true"></i>
Comments</a>
                    </li>

                </ul>
            </div>

        </nav>
