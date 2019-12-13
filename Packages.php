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
    <title>Packages</title>
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
                    <a href="Trainer.php" class="list-group-item list-group-item-action ">Trainers</a>
                    <a href="Packages.php" class="list-group-item list-group-item-action active">Packages</a>
                    <a href="Batch.php" class="list-group-item list-group-item-action">Batch</a>
                    <a href="Bill.php" class="list-group-item list-group-item-action">Bill</a>
                    <br>
            </div>
            <a class="btn btn-outline-primary" href="logout.php">Logout</a>
            </div>
        <div class="col-lg-8">
               <h3 class="text-center display-5">Package Details</h3>   
               
<!--Table-->
<table class="table table-striped table-hover table-bordered">

    <thead>
        <tr>
            <th>Pkg_id</th>
            <th>Pkg_Name</th>
            <th>Price</th>
            <th>Update</th>
            <th>Delete</th>
            
          </tr>
    </thead>


          <?php
          include 'conn.php';
          $qq= "select * from package ";


          $query = mysqli_query($conn,$qq);
          while($res = mysqli_fetch_array($query)){

          ?>
              <tbody>
        <tr>
            <td> <?php echo $res['Pkg_id'];  ?> </td>
            <td><?php echo $res['Pkg_Name'];  ?> </td>
            <td><?php echo $res['Price'];  ?> </td>
            <td>
              <button type="submit" class="btn btn-info">
                <a href="update.php?idup=<?php echo $res['Pkg_id']; ?>" class="text-white"> Update
                </a>
              </button> 
            </td>
            <td>
              <button type="submit" class="btn btn-danger">
                <a href="delete.php?idp=<?php echo $res['Pkg_id']; ?>" class="text-white">Delete
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
    Add Package
  </button>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">New Package </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                        <form  method="post" accept-charset="utf-8" action="insert.php">
                    <div class="form-group">
                            <label>Pkg_id</label>
                            <input type="text" name="Pkg_id" value="" class="form-control">
                    </div>
                    <div class="form-group">
                            <label>Pkg_Name</label>
                            <input type="text" name="Pkg_Name" value="" class="form-control">
                    </div>

                      <div class="form-group">
                            <label>Cost</label>
                            <input type="text" name="cost" value="" class="form-control">
                    </div>


                    <button type="submit" class="btn btn-info" value="submit" name="add_pack">Add</button>
                   
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