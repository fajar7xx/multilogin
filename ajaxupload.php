<?php  
require 'config/database.php';
require 'function/init.php';

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp');
$path = 'img/';

if(isset($_POST['simpan'])){
	$img = $_FILES['image']['name'];
	$tmp = $_FILES['image']['tmp_name'];

	// get upload ffile extension`
	$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

	// can upload sama image using rand function
	// make new filenama
	$final_image = rand(1000,1000000).$img;

	// check valid format
	if(in_array($ext, $valid_extensions)){
		$path = $path.strtolower($final_image);

		if(move_uploaded_file($tmp, $path)){
			echo"<img src='$path'/>";
			$alt = $_POST['alt'];

			$query = "INSERT INTO image(alt, src_img) VALUES('$alt', '$path')";
			$sql = mysqli_query($db, $query)or die("Error: " . mysqli_error($db));
		}
	}
	else{
		echo "Invalid";
	}
}

?>