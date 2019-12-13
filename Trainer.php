<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);


//echo "Connected successfully";
mysqli_select_db($conn,'test');




?>

<!DOCTYPE html>
    <html lang="en">
            <head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trainers</title>
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
         <div class="col-lg-4">
          <div class="list-group">
                    <a href="admin_pan.php" class="list-group-item list-group-item-action ">Trainee</a>
                    <a href="Trainer.php" class="list-group-item list-group-item-action active">Trainers</a>
                    <a href="Packages.php" class="list-group-item list-group-item-action">Packages</a>
                    <a href="Batch.php" class="list-group-item list-group-item-action">Batch</a>
                    <a href="Bill.php" class="list-group-item list-group-item-action">Bill</a>
                    <br>
            </div>
            <a class="btn btn-outline-primary" href="logout.php">Logout</a>
            </div>
        <div class="col-lg-8">
               <h3 class="text-center display-5">Trainer Details</h3>   
               
<!--Table-->
<table class="table table-striped table-hover table-bordered">

    <thead>
        <tr>
            <th>Trnr_id</th>
            <th>Trnr_Name</th>
            <th>Phone</th>
            <th>Pkg_id</th>
            <th>Delete</th>

            
        </tr>
    </thead>
       <?php
          include 'conn.php';
          $q= "select * from Trainer ";


          $query = mysqli_query($conn,$q);
          while($res = mysqli_fetch_array($query)){

          ?>
      <tbody>
        <tr>
            <td> <?php echo $res['Trnr_id'];  ?> </td>
            <td><?php echo $res['Trnr_Name'];  ?> </td>
            <td><?php echo $res['Phone'];  ?> </td>
            <td><?php echo $res['pkg_id'];  ?> </td>
            <td><button type="submit" class="btn btn-danger"><a href="delete.php?idtr=<?php echo $res['Trnr_id']; ?>" class="text-white"> Delete</a></button> </td>

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
          <h4 class="modal-title">New Trainer </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                        <form action="insert.php" method="post" accept-charset="utf-8">
                    <div class="form-group">
                            <label>Trnr_id</label>
                            <input type="text" name="trnr_id" value="" class="form-control">
                    </div>
                    <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="trnr_name" value="" class="form-control">
                    </div>

                      <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" value="" pattern="[0-9]{10}" class="form-control">
                    </div>
                           <div class="form-group">
                            <label>Pkg_id</label>
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

                    <button type="submit" class="btn btn-info" name="add_trainer">Register</button>
                   
               </form>  
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>
   
        </div>
     

                 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                  <script src="./js/bootstrap.min.js"></script>
                 <script src="./js/jquery.3.4.1.js"></script>
                 
                  
            </body>
            </html>