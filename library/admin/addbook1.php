
<?php


$con=mysqli_connect("localhost","root1","pass","library")or die("can't connect...");




if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $b_id = $_POST["b_id"];
    $b_name = $_POST["b_name"];
    $b_description = $_POST["b_description"];
    $quantity = $_POST["quantity"];

    $query = "INSERT INTO books VALUES ('$b_id', '$b_name', '$b_description', '$quantity') ";
    
    if(mysqli_query($con,$query))
	{
		header("location:adminpanel.php?ok=1");
	}
	else
	{
		echo mysqli_error($con);
	}
}

?>

