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
    <title>Cart details</title>
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

    .cart_img{
      width:80px;
      height:80px;
      object-fit:contain;
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
        <li class="nav-item">
          <a class="nav-link" href="./users_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>

      </ul>

    </div>
  </div>
</nav>

<!--calling cart function-->
<?php
cart();



?>

<!--second child-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Welcome Guest</a>
      </li>
      <?php
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

<div class="bg-light">
  <h3 class="text-center">Hidden store</h3>
  <p class="text-center">Communication is at the heart of e-commerce and community</p>
</div>

<!--fourth child-->

<div class="container">
  <div class="row">

  <form action="" method="post">
    <table class="table table-bordered text-center">

        <!-- php code to display dynamic  data-->
        <?php
              global $con;
              $ip = getIPAddress(); 
              $total=0;
              $cart_query="Select * from `cart_details` where ip_address='$ip'"; //the IP address which i am getting here,if that ip address present inside my tabke I am fetching all the records from there.
              $result=mysqli_query($con,$cart_query);
              $result_count=mysqli_num_rows($result);
              if($result_count>0){
                echo "      
                <thead>
                <tr>
                  <th>Product Title</th>
                  <th>Product Image</th>
                  <th>Quantity</th>
                  <th>Total Price</th>
                  <th>Remove</th>
                  <th colspan='2'>Operations</th>
                </tr>
              </thead>
              <tbody>";

              while($row=mysqli_fetch_array($result)){
                $product_id=$row['product_id'];
                $select_product="Select * from `products` where product_id='$product_id'";   //combining multiple tables.
                $result_products=mysqli_query($con,$select_product);
                while($row_product_price=mysqli_fetch_array($result_products)){
                  $product_price=array($row_product_price['product_price']);
                  $price_table=$row_product_price['product_price'];
                  $product_title=$row_product_price['product_title'];
                  $product_image1=$row_product_price['product_image1'];
                  $product_values=array_sum($product_price);
                  $total+=$product_values;
                  ?>

                


                  
                  <tr>
                    <td><?php echo $product_title?></td>
                    <td><img src='./admin_area/product_images/<?php echo $product_image1?>' alt='' class='cart_img'></td>
                    <td><input type='text' name='qty' class='form-input w-50'></td>

                    <?php
                      $ip = getIPAddress();
                      if(isset($_POST['update_cart'])){
                        $quantities=$_POST['qty'];
                        $update_cart="update `cart_details` set quantity=$quantities where ip_address='$ip'";
                        $result_products_quantity=mysqli_query($con,$update_cart);  //we have changed the variable name because result_product is used before.
                        $total=$total*$quantities;
                      }


                    ?>
                    <td><?php echo $price_table?> /-</td>
                    <td><input type='checkbox' name="removeitem[]" value="<?php echo $product_id  ?>"></td>  <!--using this product id we can remove item from cart-->
                    <td>
                      <input type='submit' value='Update Cart' class='bg-info px-3 py-2 border-0 mx-3' name='update_cart'>
                      <!-- <button class='bg-info px-3 py-2 border-0 mx-3'>Remove</button> -->
                      <input type='submit' value='Remove Cart' class='bg-info px-3 py-2 border-0 mx-3' name='remove_cart'>
                    </td>
                  </tr>
                
                <?php
              }}}
                  else
                  {
                    echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                  }


                ?>
      </tbody>
    </table>

    <!--subtotal-->
    <div class="d-flex mb-5">

    <?php 
      $ip = getIPAddress(); 
      $cart_query="Select * from `cart_details` where ip_address='$ip'"; //the IP address which i am getting here,if that ip address present inside my tabke I am fetching all the records from there.
      $result=mysqli_query($con,$cart_query);
      $result_count=mysqli_num_rows($result);
      if($result_count>0){
        echo "<h4 class='px-3'>Subtotal:<strong class='text-info'> $total/-</strong></h4>
        <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>
        <button class='bg-secondary p-3 py-2 border-0 '><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</button>";
      }
      else{
        echo "        <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>";
      }

      if(isset($_POST['continue_shopping'])){
        echo "<script>window.open('index.php','_self')</script>";
      }



    ?>



      
    </div>
  </div>
</div>
</form>

<!-- function to remove item -->
<?php

function remove_cart_item(){
  global $con;
  if(isset($_POST['remove_cart'])){
    foreach($_POST['removeitem'] as $remove_id)  {  //If the button is clicked I am accessing the product id
      echo $remove_id; //printing or getting the product_id
      $delete_query="Delete from `cart_details` where product_id=$remove_id";  //after getting the product_id we are deleting the product_id from cart.
      $run_delete=mysqli_query($con,$delete_query);
      if($run_delete){
        echo "<script>window.open('cart.php','_self')</script>";
      }
    }

  }

}

echo $remove_item=remove_cart_item();


?>




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