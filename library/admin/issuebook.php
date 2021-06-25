<?php
session_start();
if (!$_SESSION['name']) {
  header("LOCATION: login.php");
}

$name = $_SESSION['name'];


// $con=mysqli_connect("localhost","root1","pass","library")or die("can't connect...");
include '../connect.php';
include 'main.php';

//$name = $_GET["name"];

?>





<html>

<body>
  <form class="form-issuebook" action="issuebook1.php" method="POST">
    <div class="form-floating mb-3">
      <input type="text" name="b_id" class="form-control" placeholder="Enter the book id">
      <label for="b_id">Book ID</label>
    </div>

    <div class="form-floating mb-3">
      <input type="text" name="s_id" class="form-control" placeholder="Student Id">
      <label for="s_id">Student ID</label>
    </div>

    <input class="btn btn-md btn-primary btn-block text-uppercase" name="submit" type="submit"><br><br>

  </form>



</body>

</html>