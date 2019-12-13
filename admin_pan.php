<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
mysqli_select_db($conn,'test');


?>


<!DOCTYPE html>
    <html lang="en">
            <head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome Admin to the Gym</title>
      <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
      <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
      <style>
        *{
        font-family: 'Poppins', sans-serif;
        }
  


        
      </style>
        </head>
     <body>
      <h1 class="text-center display-3 mb-5 ">Welcome Admin</h1>
 
       
         <div class="container mt-2">
            
      <div class="row">
         <div class="col-lg-4">
          <div class="list-group">
                    <a href="admin_pan.php" class="list-group-item list-group-item-action active">Trainee</a>
                    <a href="Trainer.php" class="list-group-item list-group-item-action ">Trainers</a>
                    <a href="Packages.php" class="list-group-item list-group-item-action">Packages</a>
                    <a href="Batch.php" class="list-group-item list-group-item-action">Batch</a>
                    <a href="Bill.php" class="list-group-item list-group-item-action">Bill</a>
                  <br>

            </div>
              <a class="btn btn-outline-primary" href="logout.php">Logout</a>
            </div>
        <div class="col-lg-8">
               <h3 class="text-center display-5 mb-3">Trainee Details</h3>   
              
<!--Table-->
<table class="table table-striped table-hover table-bordered">

    <thead>
        <tr>
            <th>T_id</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Sex</th>
            <th>Pkg_id</th>
            <th>Trnr_id</th>
            <th>Batch_id</th>
            <th>Delete</th>
            
        </tr>
    </thead>

    <?php
          
          $q= "SELECT t.T_id,Name,Phone,Sex,Pkg_id,Trnr_id,Batch_id,Joined_on
from Trainee t,trig tr
where t.T_id=tr.T_id";


          $query = mysqli_query($conn,$q);
          while($res = mysqli_fetch_array($query)){

          ?>
    <tbody>
        <tr >
            

            <td><?php echo $res['T_id'];  ?> </td>
            <td><?php echo $res['Name'];  ?> </td>
            <td><?php echo $res['Phone'];  ?> </td>
            <td><?php echo $res['Sex'];  ?> </td>
            <td><?php echo $res['Pkg_id'];  ?> </td>
            <td><?php echo $res['Trnr_id'];  ?> </td>
            <td><?php echo $res['Batch_id'];  ?> </td>
            <td>
              <button type="submit" class="btn btn-danger">
                <a data-toggle="tooltip" title="<?php echo $res['Joined_on'];  ?>" href="delete.php?idt=<?php echo $res['T_id']; ?>" class="text-white">
                 Remove
                </a>
              </button> 
            </td>
        </tr>
    </tbody>
    <?php
    }
    ?>
</table>


<!-- Button to Open the Modal -->
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
    Add Trainee
  </button>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">New Register </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                        <form action="insert.php" method="POST" accept-charset="utf-8">
                         <div class="form-group">
                            <label>T_id</label>
                            <input type="text" name="t_id" value="" class="form-control">
                        </div>
                    <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="t_name" value="" class="form-control">
                    </div>
   
                       <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" pattern="[0-9]{10}" value="" class="form-control">
                    </div>
                    <div class="form-group">
                            <label>Sex</label>
                            <select class="form-control" name="sex" >


                                <option value="M">M</option>
                                <option value="F">F</option>
                                
                            </select> 
                    </div>
                        <div class="form-group">
                            <label>Package</label>
                            <select class="form-control" name="pkg_id" >
                                    <?php
                                        $qp="select * from package ";
                                      $queryp = mysqli_query($conn,$qp);
                                   while($res2 = mysqli_fetch_array($queryp)) { ?>

                         <option value="<?php echo $res2[0];?>"><?php echo $res2[1];?></option>

                              <?php 
                            }
                              ?>
                            </select>
                          </div>

                      <div class="form-group">
                            <label>Bacth_id</label>
                            <input type="text" name="batch_id" value="" class="form-control">
                    </div>

 
                    <button type="submit" class="btn btn-info" name="regg">Register</button>
                   
               </form>  
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
  <script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
                 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                  <script src="./js/bootstrap.min.js"></script>
                 <script src="./js/jquery.3.4.1.js"></script>
                 
                  
            </body>
            </html>