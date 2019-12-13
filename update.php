<?php
  include 'conn.php';

  $idup=$_GET['idup'];
$qr="select * from package where Pkg_id=$idup";
$res=mysqli_query($conn,$qr);
$r=mysqli_fetch_array($res);
   
    $Pkg_id=$r['Pkg_id'];
	$Pkg_name=$r['Pkg_Name'];
	$cost=$r['Price'];



 if(isset($_POST['up_pack']))
 {

	$cost=$_POST['cost'];

	$q = " UPDATE `package` SET `Price`=$cost where Pkg_id=$idup";
	$query = mysqli_query($conn,$q);
	header('location:Packages.php');
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Package</title>
      <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
            <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
      <style>
        *{
        font-family: 'Poppins', sans-serif;
        }

        
      </style>
  </head>
     <body>
         <div class="container">
            <h1 class="text-center display-3 mb-5">Welcome Admin</h1>
      		<div class="row">
                          <button class="btn btn-primary"><a href="Packages.php" class="text-white">BACK</a></button>

      			<div class="col-lg-4 text-center">

      				

      			</div>




   				<div class="col-lg-8  text-center">

      				<h2>Update Package</h2>

      				<form  method="post" accept-charset="utf-8" action="">


                      <div class="form-group">
                            <label>Cost</label>
                            <input type="text" name="cost" value="<?php echo $cost; ?>" class="form-control">
                    </div>


                    <button type="submit" class="btn btn-info" value="submit" name="up_pack">Update</button>
                   
               </form>  
      			</div>
      		</div>
      	</div>


</body>
</html>