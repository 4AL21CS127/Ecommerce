
<?php

session_start();
session_unset(); //whatever variables are set inside the session will be unset.
session_destroy();

echo "<script>window.open('index.php','_self')</script>";




?>