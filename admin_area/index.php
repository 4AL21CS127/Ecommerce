<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">

    

    <!-- font awesome link -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../style.css">
    <style>
        .admin-image{
            width:80px;
            object-fit:contain;
        }

        .footer{
            position:absolute;
            bottom:0;
        }

        .logo{
            width:3%;
            height:3%;
        }
        
        .footer{
            position:absolute;
            bottom:0;
        }

        body{
            overflow-x:hidden;
        }

        .product_img{
            width:100px;
            object-fit:contain;
        }


        
    </style>
</head>
<body>

    <div class="container-fluid p-0">

        <!--first child-->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo3p.png" alt="" class="logo">
            <nav class="navbar navbar-expand-lg ">
                <ul class="navbar-nav">
                    <!-- <li class="nav-item">
                        <a href="" class="nav-link">Welcome guest</a>

                    </li> -->
                    <?php

                    if( !isset($_SESSION['admin_name'])){
                        echo "            <li class='nav-item'>
                        <a class='nav-link' href='#'>Welcome Guest</a>
                        </li>";
                        }
                        else{
                        echo "      <li class='nav-item'>
                        <a class='nav-link' href='#'>Welcome ".$_SESSION['admin_name']." </a>
                        </li>";
                        }
                    ?>
                          <?php  if( !isset($_SESSION['admin_name'])){
                            echo "      <li class='nav-item'>
                            <a class='nav-link' href='admin_login.php'>Login</a>
                        </li>";
                        
                            }
                            else{
                            echo "      <li class='nav-item'>
                            <a class='nav-link' href='admin_logout.php'>Logout</a>
                        </li>";
                            }
                    ?>
                </ul>
            </nav>

            </div>
        </nav>

        <!--second child-->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!--third child-->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 ">


                <div class="button text-center m-5 align-items-center">
                    <!-- button*10>a.nav-link.text-light.bg-info.my-1   (emmet)-->
                    <a href="insert_product.php" class="btn btn-info">Insert Products</a>
                    <a href="index.php?view_products" class="btn btn-info">View Products</a>
                    <a href="index.php?insert_category" class="btn btn-info">Insert Categories</a>
                    <a href="index.php?view_categories" class="btn btn-info">View Categories</a>
                    <a href="index.php?insert_brand" class="btn btn-info">Insert Brands</a>
                    <a href="index.php?view_brands" class="btn btn-info">View Brands</a>
                    <a href="index.php?list_orders" class="btn btn-info">All Orders</a>
                    <a href="index.php?list_payments" class="btn btn-info">All Payments</a>
                    <a href="index.php?list_users" class="btn btn-info">List Users</a>
                    
                </div>
            </div>
        </div>

        <!-- fourth child-->
        <div class="container my-3">
            <?php 
            if(isset($_GET['insert_category'])){  // If this particular get variable is active,only then we have to include that file
                include('insert_categories.php');
            }

            if(isset($_GET['insert_brand'])){ 
                include('insert_brands.php');
            }

            if(isset($_GET['view_products'])){ 
                include('view_products.php');
            }

            if(isset($_GET['edit_products'])){ 
                include('edit_products.php');
            }

            if(isset($_GET['delete_product'])){ 
                include('delete_product.php');
            }

            if(isset($_GET['view_categories'])){ 
                include('view_categories.php');
            }

            if(isset($_GET['view_brands'])){ 
                include('view_brands.php');
            }

            if(isset($_GET['edit_category'])){ 
                include('edit_category.php');
            }
            
            if(isset($_GET['edit_brands'])){ 
                include('edit_brands.php');
            }

            if(isset($_GET['delete_category'])){ 
                include('delete_category.php');
            }

            if(isset($_GET['delete_brands'])){ 
                include('delete_brands.php');
            }

            if(isset($_GET['list_orders'])){ 
                include('list_orders.php');
            }

            if(isset($_GET['list_payments'])){ 
                include('list_payments.php');
            }

            if(isset($_GET['list_users'])){ 
                include('list_users.php');
            }


             ?>
        </div>

        <?php
include("../includes/footer.php");
?>

    </div>

    <!--bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</body>
</html>