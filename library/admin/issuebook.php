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
    <input type="text" name="isbn" id="isbn" class="form-control" placeholder='Isbn'value="" readonly>
      <label for="isbn">ISBN</label>
    </div>


    <div class="form-floating mb-3">
      <input type="text" name="s_id" class="form-control" placeholder="Student Id">
      <label for="s_id">Student ID</label>
    </div>

    <input class="btn btn-md btn-primary btn-block text-uppercase" name="submit" type="submit"><br><br>

  </form>

  <script>
  
  // onkeyup event will occur when the user 
  // release the key and calls the function
  // assigned to this event
  function GetDetail(str) {
      if (str.length == 0) {
          document.getElementById("isbn").value = "";
          
          return;
      }
      else {

          // Creates a new XMLHttpRequest object
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {

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
                    
                  document.getElementById
                      ("isbn").value = myObj[0];
                    
                  // Assign the value received to
                  // name input field
                  
              }
          };

          // xhttp.open("GET", "filename", true);
          xmlhttp.open("GET", "getbookdetails.php?b_id=" + str, true);
            
          // Sends the request to the server
          xmlhttp.send();
      }
  }
</script>

</body>

</html>