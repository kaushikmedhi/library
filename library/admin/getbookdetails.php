<?php
  
// Get the user id 
$b_id = $_REQUEST['b_id'];
  
// Database connection
$con = mysqli_connect("localhost", "root1", "pass", "library");
  
if ($b_id !== "") {
      
    // Get corresponding first name and 
    // last name for that user id    
    $query = mysqli_query($con, "SELECT isbn FROM book_status WHERE b_id='$b_id'");
  
    $row = mysqli_fetch_array($query);
  
    // Get the first name
    $isbn = $row["isbn"];
  
}
  
// Store it in a array
$result = array("$isbn");
  
// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>