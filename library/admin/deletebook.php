<?php

include '../connect.php';
// $con=mysqli_connect("localhost","root1","pass","library")or die("can't connect...");



    $isbn=$_GET["isbn"];

    $result = mysqli_query($con, "delete from books where isbn='$isbn'");

    
    if($result){
        header("location:viewbook.php?ok=1");
    }
    else{
        echo "failed:  ";
        echo mysqli_error($con);
    
    }
    

?>