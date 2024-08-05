<!--connect file-->
<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
    <link rel="stylesheet" href="style.css">

    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
    <!-- font awesome link -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
      body{
        overflow-x:hidden;
      }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
  <img src="./images/logo3p.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>

        <?php
          if( isset($_SESSION['username'])){
            echo "
            <li class='nav-item'>
            <a class='nav-link' href='./users_area/profile.php'>My Account</a>
            </li>";
          }else{
            echo "
            <li class='nav-item'>
            <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
          </li>";
          }
        ?>

        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php total_cart_price();?>/-</a>
        </li>
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

<!--calling cart function-->
<?php
cart();



?>

<!--second child-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary mb-3">
  <ul class="navbar-nav me-auto">
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Welcome Guest</a>
      </li> -->
      <?php

        if( !isset($_SESSION['username'])){
          echo "            <li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
        </li>";
        }
        else{
          echo "      <li class='nav-item'>
          <a class='nav-link' href='#'>Welcome ".$_SESSION['username']." </a>
        </li>";
        }

        
        if( !isset($_SESSION['username'])){
          echo "      <li class='nav-item'>
          <a class='nav-link' href='./users_area/user_login.php'>Login</a>
      </li>";
        }
        else{
          echo "      <li class='nav-item'>
          <a class='nav-link' href='./users_area/logout.php'>Logout</a>
      </li>";
        }



      ?>

  </ul>
</nav>

<!-- third child-->



<!--fourth child-->

<div class="row px-2">
  <div class="col-md-10">
    <div class="row">

    <!--fetching products-->

    <?php
    // $select_query="Select * from `products` order by rand() limit 0,9";
    // $result_query=mysqli_query($con,$select_query);
    // while($row=mysqli_fetch_assoc($result_query)){
    //   $product_id=$row['product_id'];
    //   $product_title=$row['product_title'];
    //   $product_description=$row['product_description'];
    //   $product_image1=$row['product_image1'];
    //   $product_price=$row['product_price'];
    //   $category_id=$row['category_id'];
    //   $brand_id=$row['brand_id'];
    //   echo "<div class='col-md-4 mb-2'>
      
    //   <div class='card' >
    //     <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
    //     <div class='card-body'>
    //       <h5 class='card-title'>$product_title</h5>
    //       <p class='card-text'>$product_description</p>
    //       <a href='#' class='btn btn-info'>Add to cart</a>
    //       <a href='#' class='btn btn-secondary'>View More</a>
    //     </div>
    //   </div>
    // </div>";
     

    // }



    //instead of writing the above content ,I separately written that in common_functions.php and I just calling that function here.
    getproducts();
    get_unique_categories();
    get_unique_brands();
    // $ip = getIPAddress();  
    // echo 'User Real IP Address - '.$ip;  
    ?>
      <!--<div class="col-md-4 mb-2">
      
        <div class="card" >
          <img src="./images/wztch4.webp" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-info">Add to cart</a>
            <a href="#" class="btn btn-secondary">View More</a>
          </div>
        </div>
      </div>

  


      <div class="col-md-4 mb-2">

        <div class="card" >
          <img src="./images/shirt.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-info">Add to cart</a>
            <a href="#" class="btn btn-secondary">View More</a>
          </div>
        </div>
      </div>


      <div class="col-md-4 mb-2">
        <div class="card" >
          <img src="./images/bag2.webp" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-info">Add to cart</a>
            <a href="#" class="btn btn-secondary">View More</a>
          </div>
        </div>
      </div>


      <div class="col-md-4 mb-2">

        <div class="card" >
          <img src="./images/tshirt.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-info">Add to cart</a>
            <a href="#" class="btn btn-secondary">View More</a>
          </div>
        </div>
      </div>


      <div class="col-md-4 mb-2">

         <div class="card" >
          <img src="./images/sh2.webp" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-info">Add to cart</a>
            <a href="#" class="btn btn-secondary">View More</a>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-2">

        <div class="card" >
          <img src="./images/image-1.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-info">Add to cart</a>
            <a href="#" class="btn btn-secondary">View More</a>
          </div>
        </div>
      </div>
-->
    <!--row end-->
    </div>
    <!--col end-->
  </div>

  <div class="col-md-2 bg-secondary p-0">

  <!--Brands-->
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
        <a href="#" class="nav-link text-light"><h4>Delivery brands</h4></a>
      </li>

      <?php
      // $select_brands="Select * from `brands`";
      // $result_brands=mysqli_query($con,$select_brands);
      // //fetching the data from the database
      // //$row_data=mysqli_fetch_assoc($result_brands);
      // //echo $row_data['brand_title'];

      // while($row_data=mysqli_fetch_assoc($result_brands)){
      //   $brand_title=$row_data['brand_title'];
      //   $brand_id=$row_data['brand_id'];
      //   echo "<li class='nav-item '>
      //   <a href='index.php?brand=$brand_title' class='nav-link text-light'>$brand_title</a>
      // </li>";
      // }

      getbrands();
      ?>

    <!--  <li class="nav-item ">
        <a href="#" class="nav-link text-light">Brand2</a>
      </li>

      <li class="nav-item ">
        <a href="#" class="nav-link text-light">Brand3</a>
      </li>

      <li class="nav-item ">
        <a href="#" class="nav-link text-light">Brand4</a>
      </li>

      <li class="nav-item ">
        <a href="#" class="nav-link text-light">Brand5</a>
      </li> -->


    </ul>

    <!--category-->

    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
        <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
      </li>


      
      <?php
      // $select_categories="Select * from `categories`";
      // $result_categories=mysqli_query($con,$select_categories);
      // //fetching the data from the database
      // //$row_data=mysqli_fetch_assoc($result_brands);
      // //echo $row_data['brand_title'];

      // while($row_data=mysqli_fetch_assoc($result_categories)){
      //   $category_title=$row_data['category_title'];
      //   $category_id=$row_data['category_id'];
      //   echo "<li class='nav-item '>
      //   <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
      // </li>";
      // }

      getcategories();
      ?>

      <!--<li class="nav-item ">
        <a href="#" class="nav-link text-light">Categories1</a>
      </li>

      <li class="nav-item ">
        <a href="#" class="nav-link text-light">Categories2</a>
      </li>

      <li class="nav-item ">
        <a href="#" class="nav-link text-light">Categories3</a>
      </li>

      <li class="nav-item ">
        <a href="#" class="nav-link text-light">Categories4</a>
      </li>

      <li class="nav-item ">
        <a href="#" class="nav-link text-light">Categories5</a>
      </li> -->
    </ul>


     

  </div>
</div>




<!-- include footer-->
<?php
include("./includes/footer.php");
?>

    </div>


    

<!-- bootstrap js link-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
crossorigin="anonymous"></script>
</body>
</html>