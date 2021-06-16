<?php
session_start();



include '../connect.php';
// $con=mysqli_connect("localhost","root1","pass","library")or die("can't connect...");




?>

<html>



    <title>library</title>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">



</head>

<body>
<div class="container my-4">

    <h1 style="text-align: center;">View Book</h1>
</div>

  
<div class="container my-4">
    <table class="table" id="myTable" >
        <thead>
            <tr>
                <td>Photo</td>
                <td>ID</td>
                <td>Name</td>
                <td>Description</td>
                <td>quantity</td>
                <td>Author</td>
                <td>Year of publication</td>
                <td>Category</td>
                <td>ISBN</td>
                <td>Language</td>
                <td>Action</td>
            </tr>
        </thead>

        <tbody>
         <?php

        $result = mysqli_query($con, "select * from books");
        while ($row = mysqli_fetch_array($result)){
            echo '
                <tr>
                    <td>'.$row["photo"].'</td>
                    <td>'.$row["b_id"].'</td>
                    <td>'.$row["b_name"].'</td>
                    <td>'.$row["b_description"].'</td>
                    <td>'.$row["quantity"].'</td>
                    <td>'.$row["author"].'</td>
                    <td>'.$row["year"].'</td>
                    <td>'.$row["category"].'</td>
                    <td>'.$row["isbn"].'</td>
                    <td>'.$row["language"].'</td>
                    <td><button><a href="editbook.php?b_id='.$row["b_id"].'">EDIT</a></button>
                    <button><a href="deletebook.php?b_id='.$row["b_id"].'">DELETE</a></button></td>
            ';
        } 
        ?>
        </tbody>


    </table>
    </div>

    <div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>
        <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                responsive: true
            });

        });
        </script>
    </div>

</html>