<!DOCTYPE html>
    <html lang="en">
            <head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Batch</title>
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
                    <a href="Batch.php" class="list-group-item list-group-item-action active">Batch</a>
                    <a href="Bill.php" class="list-group-item list-group-item-action">Bill</a>
                    <br>
            </div>
              <a class="btn btn-outline-primary" href="logout.php">Logout</a>
            </div>
        <div class="col-lg-8">
               <h3 class="text-center display-5">Batches</h3>   
               
<!--Table-->
<table class="table table-striped table-hover table-bordered">

    <thead>
        <tr>
            <th>Batch_id</th>
            <th>Timing</th>
            <th>Details</th>

          </tr>
    </thead>

              <?php
          include 'conn.php';
          $q= "select * from Batch";


          $query = mysqli_query($conn,$q);
          while($res = mysqli_fetch_array($query)){

          ?>
    <tbody>
        <tr>
            <td><?php echo $res['Batch_id'] ?></td>
            <td><?php echo $res['Timing'] ?></td>
            <td><button type="submit" class="btn btn-success"><a href="Batchdet.php?id=<?php echo $res['Batch_id']; ?>" class="text-white"> Details</a></button> </td>

        </tr>
    </tbody>

    <?php
    }
    ?>
    
</table>

</div>
    
        </div>

                 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                  <script src="./js/bootstrap.min.js"></script>
                 <script src="./js/jquery.3.4.1.js"></script>
                 
                  
            </body>
            </html>