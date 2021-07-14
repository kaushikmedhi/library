
<?php

include '../connect.php';

$b_name = $_POST["b_name"];
$b_description = $_POST["description"];
$quantity = $_POST["quantity"];
$author = $_POST["author"];
$year = $_POST["year"];
$category = $_POST["category"];
$isbn = $_POST["isbn"];
$language = $_POST["language"];
$file = $_FILES["file"];
print_r($file);

if (isset($_POST['submit'])) {

	$filename = $file['name'];
	$filerror = $file['error'];
	$filetemp = $file['tmp_name'];
	$filetype = $file['type'];
	$filesize = $file['size'];

	$fileExt = explode('.', $filename);
	$fileActualEXt = strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg', 'png');

	if (in_array($fileActualEXt, $allowed)) {
		if ($filerror === 0) {
			if ($filesize < 5120000) {
				$filenamenew = uniqid('', true) . "." . $fileActualEXt;
				$filedestination = 'uploads/' . $filenamenew;
				move_uploaded_file($filetemp, $filedestination);

				$query = "INSERT INTO books VALUES ('$b_name', '$b_description', '$quantity', '$author', '$year', '$category', '$isbn', '$filedestination', '$language') ON DUPLICATE KEY UPDATE quantity = quantity + $quantity; ";


				if (mysqli_query($con, $query)) {

					for ($i = 0; $i < $quantity; $i++) {

						$query2 = "INSERT INTO book_status VALUES (NULL,'$isbn', 0)";
						$result = mysqli_query($con, $query2);

						if ($result) {
							echo '<script>alert("Records inserted successfully")</script>';
							header("location:viewbook.php");
						}
					}
				} else {
					echo mysqli_error($con);
				}
			} else {
				echo "File size should be less than 5mb";
			}
		} else {
			echo "There was an error uploading your file";
		}
	} else {
		echo " Invalid File type";
	}
}
?>

