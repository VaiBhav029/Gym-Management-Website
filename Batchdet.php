<!DOCTYPE html>
    <html lang="en">
            <head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Batch_Details</title>
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


              <button class="btn btn-primary"><a href="Batch.php" class="text-white">BACK</a></button>
         <div class="col-lg-12">

               <h3 class="text-center display-5">Batches</h3>   
               
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
           
            
        </tr>
    </thead>

    <?php
          include 'conn.php';
          $id=$_GET['id'];
          $q= "CALL `getbatch`($id);";

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