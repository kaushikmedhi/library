<?php

include '../connect.php';
// $con=mysqli_connect("localhost","root1","pass","library")or die("can't connect...");



    $b_id=$_GET["b_id"];
    $isbn=$_GET["isbn"];
    $b_name=$_GET["b_name"];
    $date=$_GET["date"];
    $reason=$_POST["reason"];
    $by=$_POST["by"];

    $result = mysqli_query($con, "INSERT INTO `delete_book` (`b_id`, `isbn`, `b_name`, `date`, `reason`, `by_person`) VALUES ('$b_id', '$isbn', '$b_name', '$date', '$reason', '$by')");

    
    if($result){
        
        $sql=mysqli_query($con, "SELECT * FROM book_status where b_id='$b_id' ");
        $row=mysqli_fetch_array($sql);
        if ($row["status==0"]){

        mysqli_query($con, "delete from book_status where b_id='$b_id'");
        header("location:viewbook.php?ok=1");
    }
    else{
        mysqli_query($con, "delete from book_issue where b_id='$b_id'");
        mysqli_query($con, "delete from book_status where b_id='$b_id'");
        header("location:viewbook.php?ok=1");
    }
}
    else{
        echo "failed:  ";
        echo mysqli_error($con);
    
    }
    

?>