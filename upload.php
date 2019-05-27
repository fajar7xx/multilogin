<?php 
require_once 'config/database.php';
require_once 'function/init.php';

if(isset($_POST['simpan'])){
	print_r($_FILES);
	echo "<br>";
	print_r($_POST);

	$alt = antidos($_POST['alt']);

	$namafile = $_FILES['image']['name'];
	$ukuranfile = $_FILES['image']['size'];
	$error = $_FILES['image']['error'];
	$temp = $_FILES['image']['tmp_name'];

	if($error === 4){
		echo "<script>
				alert('pilih gambar terlebih dahulu');
				document.location.href = 'index.php';
			</script>";
		exit();
	}

	$allow_extension = ['jpg', 'jpeg', 'png'];

	$extension_file = explode('.', $namafile);
	$extension_file = strtolower(end($extension_file));
	
	// $extension_file = strtolower(pathinfo($namafile, PATHINFO_EXTENSION));

	$path = "img/";

	// cek eksternsi gambar
	if(!in_array($extension_file, $allow_extension)){
		echo "<script>
				alert('file gambar yang diizinkan hanya jpg/jpeg/png');
				document.location.href = 'index.php';
			</script>";
		exit();
	}

	// maxfile 1MB
	if($ukuranfile > 1000000){
		echo "<script>
				alert('ukuran file yang diiznkan dibawah 1MB');
				document.location.href = 'index.php';
			</script>";
		exit();
	}

	$newfilename = uniqid();
	$newfilename .= '.';
	$newfilename .= $extension_file;

	$moveto = $path.$newfilename;

	move_uploaded_file($temp, $path.$newfilename);

	$query ="INSERT INTO image(alt, src_img)VALUES('$alt', '$moveto')";
	$sql = mysqli_query($db, $query)or die("Error: " . mysqli_error($db));

	header('location: index.php');

}

?>