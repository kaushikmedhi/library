<?php
  
// Get the s_id 
$s_id = $_REQUEST['s_id'];
  
include '../connect.php';
  
if ($s_id !== "") {
    
    $query = mysqli_query($con, "SELECT * FROM student WHERE s_id='$s_id'");
    

    $row = mysqli_fetch_array($query);
   
    $s_name = $row["s_name"];
    $department = $row["department"];

}
  
// Store it in a array
$result = array("$s_name","$department");
  
// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>