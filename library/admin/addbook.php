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




<h1 style="text-align: center;">Input Form</h1>


<form action="addbook1.php" method="POST" enctype="multipart/form-data">

    <div class="row g-2">
        <div class="col-md">
            <div class="form-floating mb-3">

                <input type="text" class="form-control" name="b_id" id="book_id" placeholder="Book ID">
                <label for="book_id"> ID </label>
            </div>
        </div>

        <div class="col-md">
            <div class="form-floating mb-3">

                <input type="text" class="form-control" name="b_name" id="book_name" placeholder="Bookname">
                <label for="book_name"> Book Name </label>
            </div>
        </div>
    </div>

    <div class="row g-2">
        <div class="col-md">
            <div class="form-floating mb-3">

                <input type="text" class="form-control" name="b_description" id="description" placeholder="Description">
                <label for="description"> Description </label>
            </div>
        </div>

        <div class="col-md">
            <div class="form-floating mb-3">
                <input type="number" class="form-control" name="quantity" min="1" max="100" id="quantity" placeholder="Quantity">
                <label for="quantity"> Quantity </label>

            </div>
        </div>
    </div>

    <div class="row g-2">
        <div class="col-md">
            <div class="form-floating mb-3">

                <input type="text" class="form-control" name="author" id="author" placeholder="Author">
                <label for="author"> Author </label>
            </div>
        </div>

        <div class="col-md">
            <div class="form-floating mb-3">

                <input type="text" class="form-control" name="year" id="year" placeholder="Year of publishing">
                <label for="year"> year </label>
            </div>
        </div>
    </div>

    <div class="row g-2">
        <div class="col-md">
            <div class="form-floating mb-3">

                <input type="text" class="form-control" name="category" id="category" placeholder="Category">
                <label for="category"> Category </label>
            </div>
        </div>

        <div class="col-md">
            <div class="form-floating mb-3 ">

                <input type="text" class="form-control" name="isbn" id="isbn" placeholder="ISBN">
                <label for="isbn"> ISBN </label>
            </div>
        </div>
    </div>

    <div class="row g-2">
        <div class="col-md">
            <div class="form-floating mb-3">

                <input type="text" class="form-control" name="language" id="language" placeholder="Language">
                <label for="language"> Language </label>
            </div>
        </div>

        <div class="col-md">
            <div><label for="file"> Photo </label>

                <input type="file" class="form-control" name="file" id="file">
            </div>
        </div>
    </div>

    <input type="submit" class="btn btn-md btn-success" value="Add Book" name="submit">

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