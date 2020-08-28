<?php

    $server="sql210.epizy.com";
    $username="epiz_26606534";
    $password="sqwLnNTM6twIVZC";
    $dbname="epiz_26606534_cms";
    $con = mysqli_connect($server,$username,$password,$dbname);

    mysqli_select_db($con,'crud');

    /*if($con)
    {
        echo "Connected";
    }
    else
    {
        echo "Not connected";
    }*/
    
    
?>