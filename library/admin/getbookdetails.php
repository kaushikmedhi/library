<?php
  
// Get the b_id 
$b_id = $_REQUEST['b_id'];
  
include '../connect.php';
  
if ($b_id !== "") {
      
    // Get corresponding first name and 
    // isbn for that b_id    
    $query = mysqli_query($con, "SELECT isbn FROM book_status WHERE b_id='$b_id'");
    

    $row = mysqli_fetch_array($query);
    
    // Get the isbn
    $isbn = $row["isbn"];
    

    $query2 = mysqli_query($con, "SELECT * FROM books WHERE isbn='$isbn'");
    $row2 = mysqli_fetch_array($query2);
    $name = $row2["b_name"];
    $category = $row2["category"];
}
  
// Store it in a array
$result = array("$isbn","$name","$category");
  
// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>