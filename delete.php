<?php
   include 'conn.php';
if($id=$_GET['idp']){

$q1=" DELETE FROM `package` WHERE Pkg_id = $id";

mysqli_query($conn,$q1);

header('location:Packages.php');
}


if($id=$_GET['idtr']){

$q2=" DELETE FROM `Trainer` WHERE Trnr_id = $id ";

mysqli_query($conn,$q2);

header('location:Trainer.php');
}

if($id=$_GET['idt']){
$q3=" DELETE FROM `Trainee` WHERE T_id = $id";

mysqli_query($conn,$q3);

header('location:admin_pan.php');
}
?>