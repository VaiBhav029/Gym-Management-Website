    <?php
          
    function getbill()

      {
        include 'conn.php';
      $q="select * from Bill";
        $res=mysqli_query($conn,$q);
        while($row=mysqli_fetch_array($res))
        {
        $Bill_id=$row['Bill_id'];
        $date=$row['Date'];
        $T_id=$row['T_id'];
        $Pkg_id=$row['Pkg_id'];
        $Status=$row['Status'];
        
        echo"<tr>
        <td>$Bill_id</td>
        <td>$date</td>
        <td>$T_id</td>
        <td>$Pkg_id</td>
        <td>$Status</td>
          </tr>";

    }
  }

    ?>

<!DOCTYPE html>
    <html lang="en">
            <head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bill</title>
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
                    <a href="Packages.php" class="list-group-item list-group-item-action ">Packages</a>
                    <a href="Batch.php" class="list-group-item list-group-item-action">Batch</a>
                    <a href="Bill.php" class="list-group-item list-group-item-action active">Bill</a>
                    <br>
            </div>
              <a class="btn btn-outline-primary" href="logout.php">Logout</a>
            </div>
        <div class="col-lg-8">
               <h3 class="text-center display-5">Bill Details</h3>   
               
<!--Table-->
<table class="table table-striped table-hover table-bordered">

    <thead>
        <tr>
            <th>Bill_id</th>
            <th>Date</th>
            <th>T_id</th>
            <th>Pkg_id</th>
            <th>Stauts</th>

          </tr>
    </thead>

      <tbody>
         <?php getbill(); ?>

    </tbody>

</table>











<!-- Button to Open the Modal -->
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
    Pay
  </button>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">New Bill </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                        <form action="insert.php" method="post" accept-charset="utf-8">
                    <div class="form-group">
                            <label>Bill_id</label>
                            <input type="text" name="bill_id" value="" class="form-control">
                    </div>
                    <div class="form-group">
                            <label>Date</label>
                            <input type="text" name="date" value="" class="form-control">
                    </div>

                       <div class="form-group">
                            <label>T_id</label>
                  <input type="text" name="t_id" value="" class="form-control">
                    </div>


                      <div class="form-group">
                            <label>Status</label>
                            <input type="text" name="status" value="" class="form-control">
                    </div>


                    <button type="submit" class="btn btn-info" name="pay">Pay</button>
                   
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