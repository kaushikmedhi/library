<?php
session_start();
if(!$_SESSION['name']){
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
<form class="form-issuebook"  action="issuebook1.php" method="POST">
              <div class="form-label-group">
                <input type="text" name="b_id" class="form-control" placeholder="Enter the book id" value="">
              </div>

              <div class="form-label-group">
                <input type="text" name="sname" class="form-control" placeholder="Enter the student name" >
              </div>

              <div class="form-label-group">
                <input type="number" name="qty" class="form-control" placeholder="Enter the quantity" >
              </div>

              <input class="btn btn-lg btn-primary btn-block text-uppercase" name="submit"  type="submit"><br><br>
             
            </form>
	
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    

	
</body>
</html>

