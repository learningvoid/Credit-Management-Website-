<?php

    include 'connection.php';
     $q="select * from transactions";
     
     $query = mysqli_query($con,$q);

?>

<html>
    <head>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
<style>
        body{
    background-image: url("unsplash25.jpg");
    background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
  
}
</style>


    <body>
        <div class="container">
        <div class="col-log-12">
            <br><br>
            <h1 class="text-center " style="color:black" >Transaction Statement</h1>

            <table class="table table-striped table-hover table-bordered"><br>
                <tr class="bg-dark text-white text-center">
                    <th>Sender's ID</th>
                    <th>Senders Name</th>
                    <th>Receiver's ID</th>
                    <th>Receiver's Name</th>
                    <th>Amount</th>
                 
                </tr>
                <?php
    include 'connection.php';

        $q="select * from transactions";

        $query = mysqli_query($con,$q);

        while($res = mysqli_fetch_array($query))
        {

?>
                <tr style="color:white;background-color: rgba(0,0,0,.6);"  class="text-center">
                    <td> <?php echo $res['sid'] ;?></td>
                    <td><?php echo $res['sname'] ;?></td>
                    <td><?php echo $res['rid'] ;?></td>
                    <td><?php echo $res['rname'] ;?></td>
                    <td><?php echo $res['amount'] ;?></td>
                    
                    

                    </tr>
                <?php 
                    }
                ?>
            </table>

        </div>
        </div>
        <div class="center" style="text-align: center" >
            <button> <a href="index.php" style="color:chocolate; " style="text-decoration: none">Back to Home</a> </button>
        </div>
    </body>
</html>