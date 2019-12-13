<?php
include 'conn.php';
if(isset($_POST['regg']))
{
	$t_id=$_POST['t_id'];
	$t_name=$_POST['t_name'];
	$phone=$_POST['phone'];
	$sex=$_POST['sex'];
	$pkg_id=$_POST['pkg_id'];
	$batch_id=$_POST['batch_id'];
	$q4 = " INSERT INTO `Trainee` (`T_id`, `Name`, `Phone`, `Sex`, `Pkg_id`, `Batch_id`)VALUES ($t_id,'$t_name',$phone,'$sex',$pkg_id,$batch_id) ";
	$query = mysqli_query($conn,$q4);

	$nq="UPDATE Trainee set Trnr_id=(SELECT Trnr_id from Trainer where pkg_id=$pkg_id)where pkg_id=$pkg_id";
	$query1 = mysqli_query($conn,$nq);
	header('location:admin_pan.php');
}

if(isset($_POST['add_pack'])){

	$Pkg_id=$_POST['Pkg_id'];
	$Pkg_Name=$_POST['Pkg_Name'];
	$cost=$_POST['cost'];

	
	$q1= " INSERT INTO `package` VALUES ($Pkg_id,'$Pkg_Name',$cost)";
	$query = mysqli_query($conn,$q1);
	header('location:Packages.php');

}



if(isset($_POST['add_trainer'])){

	$Trnr_id=$_POST['trnr_id'];
	$Name=$_POST['trnr_name'];
	$phone=$_POST['phone'];
	$Pkg_id=$_POST['pkg_id'];
	$q2 = " INSERT INTO `Trainer` VALUES ($Trnr_id,'$Name',$phone,$Pkg_id)";
	$query = mysqli_query($conn,$q2);
	header('location:Trainer.php');

}

if(isset($_POST['pay'])){

	$bill_id=$_POST['bill_id'];
	$date=$_POST['date'];
	$t_id=$_POST['t_id'];
	$status=$_POST['status'];
	$q3 = " INSERT INTO `Bill`(`Bill_id`, `Date`, `T_id`,`Status`) VALUES ($bill_id,'$date',$t_id,'$status')";
	$query = mysqli_query($conn,$q3);

	$nq="UPDATE Bill set Pkg_id=(select pkg_id from Trainee where T_id=$t_id)where T_id=$t_id";
	$query1 = mysqli_query($conn,$nq);
	header('location:Bill.php');

}



?>
