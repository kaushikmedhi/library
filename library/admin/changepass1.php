<?php
session_start();
include("../connect.php");
if(isset($_POST['Submit']))
{
 $oldpass=($_POST['opwd']);
 $aname=$_SESSION['name'];
 $newpassword=($_POST['npwd']);
mysqli_query($con,"SELECT password FROM admin where password='$oldpass' && name='$aname'");


 $ok=mysqli_query($con,"update admin set password=' $newpassword' where name='$aname'");
if ($ok){
    header("location:changepass.php?ok=1");
}
else{
    header("location:changepass.php?ok=0");
}


}
?>