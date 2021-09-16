<?php
session_start();
if (!$_SESSION['name']) {
    header("LOCATION: login.php");
}

$name = $_SESSION['name'];

include '../connect.php';
include 'main.php';

$b_id = $_GET["b_id"];

?>


<div class="row">
    <div class="col">
        <div class="container mt-3 mb-5">

            <h2 style="text-align: center;">Delete Book</h2>
        </div>
    </div>
</div>


<div class="col">
    <div class="container-fluid">

        <?php
        $result = mysqli_query($con, "select * from book_status join books on book_status.isbn = books.isbn where book_status.b_id=$b_id");
        while ($row1 = mysqli_fetch_array($result)) {
        ?>

            <form action="deletebook.php?b_id=<?php echo $b_id; ?>&isbn=<?php echo $row1["isbn"]; ?>&b_name=<?php echo $row1["b_name"]; ?>&date=<?php echo date("d-m-y"); ?>" method="POST" enctype="multipart/form-data">

                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating mb-3 ">
                            <h4>Book ID : <?php echo $b_id; ?></h4>
                        </div>
                    </div>

                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <h4>ISBN : <?php echo $row1["isbn"]; ?></h4>
                        </div>
                    </div>
                </div>

                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <h4>Book Name : <?php echo $row1["b_name"]; ?></h4>
                        </div>
                    </div>

                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <h4>Date : <?php date_default_timezone_set("Asia/Calcutta");
                                        echo date("d-m-y"); ?></h4>
                        </div>
                    </div>
                </div>

                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <select class="form-control" name="reason" id="reason" required>
                                <option disabled selected >Select reason</option>
                                <option value="Lost">Lost</option>
                                <option value="Damaged">Damaged</option>
                            </select>
                            <label for="reason"> Reason </label>
                        </div>
                    </div>

                    <div class="col-md">
                        <div class="form-floating mb-3">
                        <select class="form-control" name="by" id="by" required>
                                <option disabled selected >Select person</option>
                                <option value="Admin">Admin</option>
                                <?php 
                                $result2 = mysqli_query($con, "SELECT * FROM student");
                                while ($row2 = mysqli_fetch_array($result2)) {
                                ?>
                                <option value="<?php echo$row2["s_name"]; ?>"><?php echo$row2["s_name"]; ?></option>
                                <?php } ?>
                            </select>
                            <label for="by"> By </label>
                        </div>
                    </div>
                </div>

                <div class="col-md" style="margin-top: 20px;">
                    <input type="submit" class="btn btn-md btn-danger form-control action" value="DELETE" name="submit">
                </div>
    </div>

    </form>

<?php } ?>

</div>
</div>
</div>

<div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

</div>
</body>

</html>