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

  <script src="https://code.jquery.com/jquery-3.2.1.min.js">
  </script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
  </script>


  <form class="form-issuebook" action="issuebook1.php" method="POST">
   
    <div class="form-floating mb-3">
      <input type="text" name="b_id" class="form-control" onkeyup="GetDetail(this.value)" placeholder="Enter the book id">
      <label for="b_id">Book ID</label>
    </div>

    <div class="form-floating mb-3">
      <input type="text" name="isbn" id="isbn" class="form-control-plaintext readonly" placeholder='ISBN' value="" required>
      
    </div>

    <div class="form-floating mb-3">
      <input type="text" name="name" id="name" class="form-control-plaintext readonly" placeholder='Book Name' value="" required>
      
    </div>

    <div class="form-floating mb-3">
      <input type="text" name="category" id="category" class="form-control-plaintext readonly" placeholder='Category' value="" required>
    </div>

    <div style="width: 100%; height: 2px; background-color: gray; margin-top:30px; margin-bottom:30px;"></div>

    <div class="form-floating mb-3">
      <input type="text" name="s_id" class="form-control" onkeyup="GetStudent(this.value)" placeholder="Student Id">
      <label for="s_id">Student ID</label>
    </div>


    <div class="form-floating mb-3">
      <input type="text" name="s_name" id="s_name" class="form-control-plaintext readonly" placeholder='Student Name' value="" required>
    </div>


    <div class="form-floating mb-3">
      <input type="text" name="department" id="department" class="form-control-plaintext readonly" placeholder='Department' value="" required>
    </div>

    <input class="btn btn-md btn-primary btn-block text-uppercase" name="submit" type="submit"><br><br>

  </form>

  <script>
  // readonly fields
    $(".readonly").on('keydown paste focus mousedown', function(e){
        if(e.keyCode != 9) // ignore tab
            e.preventDefault();
    });
</script>

  <script>
    // onkeyup event will occur when the user 
    // release the key and calls the function
    // assigned to this event
    function GetDetail(str) {
      if (str.length == 0) {
        document.getElementById("isbn").value = "";
        document.getElementById("name").value = "";
        document.getElementById("category").value = "";
        return;
      } else {

        // Creates a new XMLHttpRequest object
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {

          // Defines a function to be called when
          // the readyState property changes
          if (this.readyState == 4 &&
            this.status == 200) {

            // Typical action to be performed
            // when the document is ready
            var myObj = JSON.parse(this.responseText);

            // Returns the response data as a
            // string and store this array in
            // a variable assign the value 
            // received to isbn input field

            document.getElementById("isbn").value = myObj[0];

            // Assign the value received to
            // other input field
            document.getElementById("name").value = myObj[1];
            document.getElementById("category").value = myObj[2];
          }
        };

        // xhttp.open("GET", "filename", true);
        xmlhttp.open("GET", "getbookdetails.php?b_id=" + str, true);

        // Sends the request to the server
        xmlhttp.send();
      }
    }

    function GetStudent(str) {
      if (str.length == 0) {
        document.getElementById("s_name").value = "";
        document.getElementById("department").value = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {

          if (this.readyState == 4 &&
            this.status == 200) {

            var myObj = JSON.parse(this.responseText);


            document.getElementById("s_name").value = myObj[0];
            document.getElementById("department").value = myObj[1];
            }
        };

        xmlhttp.open("GET", "getstudentdetails.php?s_id=" + str, true);

        xmlhttp.send();
      }
    }
  </script>

</body>

</html>