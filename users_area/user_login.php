<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();  //@ indicates that if this particular page is active only then I am starting the session.
 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>

    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">

    <style>
      body{
        overflow-x:hidden;
      }
    </style>

</head>
<body>
    <div class="container-fluid my-3">  <!--container-fluid takes complete width of our system-->
    <h2 class="text-center">User Login</h2>

    <div class="row d-flex align-items-center justify-content-center mt-4">
        <div class="col-lg-12 col-xl-6">  <!--lg=large xl=extra large-->
        <form action="" method="post">
            <div class="form-outline mb-4">
                <label for="user_username" class="form-label">Username</label>
                <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username"/>
            </div>



            <div class="form-outline mb-4">
                <label for="user_password" class="form-label">Password</label>
                <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password"/>
            </div>


            <div class="mt-4 pt-2">
                <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="user_login">
                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account ? <a href="user_registration.php" class="text-danger"> Register</a> </p>
            </div>

        </form>

        </div>
    </div>

    </div>
    
</body>
</html>

<?php

if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];

    //checking if the username is already present inside the database

    $select_query="Select * from `user_table` where username='$user_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();

    //cart item

    $select_query_cart="Select * from `cart_details` where ip_address='$user_ip'";
    $select_cart=mysqli_query($con,$select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart);
     


    if( $row_count>0){ //if the row count>0 then this user is present inside the database.
        $_SESSION['username']= $user_username;
        if(password_verify( $user_password,$row_data['user_password'])){  //the password here and the password inside the database are going to checked .if both hash of the passwords matches then this condition verifies.
            // echo "<script>alert('Login Successfull')</script>";
            if($row_count==1 and $row_count_cart==0){  //if the user is present inside the database and do not have any items in the cart then it should be redirected to profile.php.
                $_SESSION['username']= $user_username;
                echo "<script>alert('Login Successfull')</script>";
                echo "<script>window.open('profile.php','_self')</script>";  //index.php ,dont give else
            }
            else{
                $_SESSION['username']= $user_username;
                echo "<script>alert('Login Successfull')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
        }else{
            echo "<script>alert('Invalid Credentials')</script>";  //give this else
        }
    }
    else{
        echo "<script>alert('Invalid Credentials')</script>";
    }
    


}





?>
