<?php
include 'conn.php';



if(isset($_POST['submit'])){
     $u= $_POST['user'];
    $p= $_POST['pass'];

    $q = " SELECT * FROM admin_log WHERE  username = '$u' and password = '$p'";
    
   $res=mysqli_query($conn,$q);
    
if(mysqli_num_rows($res)==1)
{
    $_SESSION['uname'] = $u;
    //echo "welcome  $u";
    header('location:admin_pan.php');
}
else
{
    $message = "incorect Username Or Passsword";
    

   echo '<script type="text/javascript">alert("' . $message . '")</script>';
   echo "<script>window.open('login.php','_self')</script>";

}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
         <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
      <style>
        *{
        font-family: 'Poppins', sans-serif;
        }
  

        
      </style>
</head>
<body>
    <h1 class="text-center  display-3  mb-5">Multigym Management System</h1>


	<div class="container ">
      
        <h2 class="text-center display-5  mb-5 ">Admin Login<h2> 
        
      
        <div class="row"> 

        
            <div class="col-lg-6 ">
                
                <form  method="POST">
                        <div class="form-group mb-5">
                            <label>Username</label>
                            <input type="text" name="user" value="" class="form-control">
                        </div>
                        <div class="form-group">
                         <label>Password</label>
                            <input type="password" name="pass" value="" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary text-center mx-auto" name="submit">Login</button>
                </form>
            </div>
            <div class="col-lg-6">
                 <img src="./images/mm.png" alt="" class="image-fluid"> 
            </div>
        </div>


    </div>

    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/jquery.3.4.1.js"></script>

</body>
</html>
