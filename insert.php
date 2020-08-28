<?php
    include 'connection.php'; ?>
  <?php

        if(isset($_POST['done'])){
        $UserName = $_POST['UserName'];
        $Email = $_POST['Email'];
        $Contact = $_POST['Contact'];
        $Credits = $_POST['Credits'];

        $q="INSERT INTO `users`(`UserName`, `Email`, `Contact`, `Credits`) VALUES ('$UserName','$Email','$Contact','$Credits')";

        $query = mysqli_query($con,$q);
        header("allusers.php");
    }
?>
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=number] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #000501;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: 270px;
  height: 55px;
  margin-left: 420px;
  padding: 10px 18px;
  background-color: #000501;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 400px;
  border-radius: 50%;
}

.container {
  padding: 16px;

}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 60%; /* Full width */
  height: 6 0%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-image: url(unsplash5.png);
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
  /*margin: 5% auto 15% auto; 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  
  
  width: 200px; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s;
 /* width: auto;*/
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 300px;
  }
  body{
    background-image: url("unsplash2.jpg");
     background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}
}
</style>
<html>
    <head>
        <title>Credit Management System</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>
        <!--<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

<div id="id01" class="modal">-->

  <form class="modal-content animate"  method="post" action="insert.php" >
    <div class="imgcontainer">
      <span style.display='none' class="close" title="Close Modal">&times;</span>
      <img src="adduser.png" alt="Avatar" class="avatar">
    </div>

    <div class="container" style="width: 300px;">
    
      <label for="UserName"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="UserName" required>

      <label for="Email"><b>E-mail</b></label>
      <input type="text" placeholder="Enter mail" name="Email" required>

      <br><label for="Contact"><b>Contact number</b></label>
      <br><input type="number" placeholder="Enter Phone number" name="Contact" required>

      <br><label for="Credits"><b>Credits</b></label>
      <br><input type="number" placeholder="Enter Credits" name="Credits" required>
        
      <button type="submit" name="done">Submit</button>
    </div>

    <div class="container">
      <button type="button"  class="cancelbtn"> <a href="index.php" style="color: #f1f1f1; " style="text-decoration: none" >Cancel</a></button>
    </div>

    <div class="container">
      <button type="button"  class="cancelbtn"> <a href="index.php" style="color: #f1f1f1; " style="text-decoration: none" >Home</a></button>
    </div>
   
  </form>
</div>




    </body>
</html>