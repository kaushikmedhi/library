<?php


include '../connect.php';


if (isset($_POST['submit'])) {


    $s_id = $_POST["s_id"];
    $s_name = $_POST["s_name"];
    $s_password = $_POST["s_password"];
    $s_email = $_POST["s_email"];
    $s_phone = $_POST["s_phone"];
    $s_address = $_POST["s_address"];
    $department = $_POST["department"];
    $success_msg= false;
	

				$query = "UPDATE `student` SET  s_name='$s_name', s_password='$s_password', s_email='$s_email', s_phone='$s_phone', s_address='$s_address', department='$department' where s_id='$s_id'  ";
                
				if (mysqli_query($con, $query)) {
                    $success_msg= true;
                    if ($success_msg) {
                        ?>
                        <SCRIPT> 
                            alert('Please log in again to see the changes.')
                            window.location.replace('logout.php');
                        </SCRIPT>

                        <?php
                    }
				} else {
					echo mysqli_error($con);
				}
}

?>