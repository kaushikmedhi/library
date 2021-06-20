<?php
session_start();


include '../connect.php';
include 'main.php';



$s_id=$_GET["s_id"];

    

$result = mysqli_query($con, "select * from student where s_id=$s_id");
$row = mysqli_fetch_array($result);

?>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>





    <h1 style="text-align: center;">Update Student</h1>
    <form action="editstudent1.php" method="POST">
       

    <div class="row g-2">

<div class="col-md">
    <div class="form-floating mb-3">

        <input type="text" class="form-control" name="s_id" id="id" placeholder="ID" value="<?php echo $row["s_id"] ?>" readonly>
        <label for="id"> ID </label>
    </div>
</div>
    </div>

    <div class="row g-2">

<div class="col-md">
    <div class="form-floating mb-3">

        <input type="text" class="form-control" name="s_name" id="name" placeholder="Name" value="<?php echo $row["s_name"] ?>">
        <label for="name"> Name </label>
    </div>
</div>
</div>


<div class="row g-2">
<div class="col-md">
    <div class="form-floating mb-3">
        <input type="email" class="form-control" name="s_email" id="email" placeholder="E-mail" value="<?php echo $row["s_email"] ?>">
        <label for="email"> E-mail </label>

    </div>
</div>


<div class="col-md">
    <div class="form-floating mb-3">

        <input type="text" class="form-control" name="s_phone" id="phone" placeholder="Phone" value="<?php echo $row["s_phone"] ?>">
        <label for="phone"> Phone </label>
    </div>
</div>
</div>

<div class="row g-2">
<div class="col-md">
    <div class="form-floating mb-3">

        <input type="text" class="form-control" name="s_address" id="address" placeholder="Address" value="<?php echo $row["s_address"] ?>">
        <label for="address"> Address </label>
    </div>
</div>



<div class="col-md">
    <div class="form-floating mb-3">

        <input type="text" class="form-control" name="department" id="department" placeholder="Department" value="<?php echo $row["department"] ?>">
        <label for="department"> Department </label>
    </div>
</div>
</div>



<input type="submit" class="btn btn-md btn-success" value="Update Student" name="submit">

    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    
</body>

</body>

