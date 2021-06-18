<?php


include '../connect.php';


$b_id = $_POST["b_id"];
$b_name = $_POST["b_name"];
$b_description = $_POST["b_description"];
$quantity = $_POST["quantity"];
$author = $_POST["author"];
$year = $_POST["year"];
$category = $_POST["category"];
$isbn = $_POST["isbn"];
$language = $_POST["language"];

$photo = $_POST["photo"];

    $result = mysqli_query($con, "update books set  b_name='$b_name', b_description='$b_description', quantity='$quantity', author='$author', year='$year', category='$category', isbn='$isbn', photo='$photo', language='$language' where b_id='$b_id' ");

    
    if($result){
		header("location:viewbook.php?ok=1");
    }
    else{
        echo "failed:  ";
        echo mysqli_error($con);
    
    }
    

?>
