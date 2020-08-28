<?php
include 'connection.php';
$amterr = "";
if(isset($_POST['done']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amt = $_POST['amount'];
    $q = "SELECT * from users where id=$from";
    $query = mysqli_query($con,$q);
    $q1 = mysqli_fetch_array($query);
    $q = "SELECT * from users where id=$to";
    $query = mysqli_query($con,$q);
    $q2 = mysqli_fetch_array($query);
    if($amt > $q1['Credits'])
    {
        $amterr = "Insufficient Balance";
    }
    else {

        $newCredit = $q1['Credits'] - $amt;
        $q = "UPDATE users set Credits=$newCredit where id=$from";
        mysqli_query($con,$q);
     


        $newCredit = $q2['Credits'] + $amt;
        $q = "UPDATE users set Credits=$newCredit where id=$to";
        mysqli_query($con,$q);
           
        $sname = $q1['UserName'];
        $rname = $q2['UserName'];
        $q = "INSERT INTO `transactions`(`sid`,sname, `rid`,rname, `amount`) VALUES ($from,'$sname',$to,'$rname',$amt);";
        $tns=mysqli_query($con,$q);
        if(!$tns){
         echo mysqli_error($con);
        }
        $newCredit= 0;
        $amt =0;
        header('location:index.php');
    }
    
}
?>

<html>
    <head>
        <title>Transaction</title>
       
         <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>

<style>
        body{
    background-image: url("unsplash4.jpg");
     background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}


</style>

    <body>
    <br/><br/><br/>
    
    <div class="" style="width:40%;margin-left:30%">
        
        <header class="">
            <h2 class=" text-center " style="color:black; text-align:center " > Processing </h2>
        </header>
        <form method="post" name="tcredit" style="margin-left:10%;margin-right:10%;border:solid 2px black;border-radius: 25px 25px 25px 25px;"><br/>
            <?php
                include 'connection.php';
                $sid=$_GET['id'];
                $q = "SELECT * FROM users where id=$sid";
                $query=mysqli_query($con,$q);
                if(!$query)
                {
                    echo "Error ".$q."<br/>".mysqli_error($con);
                }
                $res=mysqli_fetch_array($query);
            ?>
            <label style="color: black;"> From </label><br/>
                <?php echo $res['UserName'] ;?> <br>
                    <?php echo $res['Email'] ;?> <br>
                    <?php echo $res['Contact'] ;?> <br>
                    <?php echo $res['Credits'] ;?><br/><br/>
            <label style="color:black;">To</label>
            <select class="" name="to" style="margin-bottom:5%;margin-left: 9%;">
            <option value="" disabled selected> To </option>
            <?php
                include 'connection.php';
                $sid=$_GET['id'];
                $q = "SELECT * FROM users where id!=$sid";
                $query=mysqli_query($con,$q);
                if(!$query)
                {
                    echo "Error ".$q."<br/>".mysqli_error($con);
                }
                while($res = mysqli_fetch_array($query)) {
            ?>
                <option value="<?php echo $res['id'];?>">
                <?php echo $res['UserName'] ;?>
                  <span style="color: black;">  <?php echo $res['Email'] ;?></span>
                    <?php echo $res['Contact'] ;?>
                    <?php echo $res['Credits'] ;?>
                </option>
            <?php } ?>
            </select> <br>
            <label style="color: black;">Amount</label>
            <input class="w3-input" style="margin-bottom:7%" name="amount" required/> <p class="error"></p><?php echo $amterr;?></p>
            
            <button class="" name="done" type="submit" style="margin-bottom:4%;margin-left:1%">Submit</button>
            
            
        </form>
    </div>
    </body>
</html>