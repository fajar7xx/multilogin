<?php  
require 'config/database.php';
require 'function/init.php';

if(isset($_POST['login'])){
	// print_r($_POST);

	$email = antidos($_POST['email']);
	$pass = antidos($_POST['pass']);

	// checking login creadential for admin
	$query = "SELECT * FROM admin WHERE email = '$email'";
	$sql = mysqli_query($db, $query)or die("Errror: " . mysqli_error($db));
	if(mysqli_num_rows($sql)){
		$data = mysqli_fetch_assoc($sql);
		if(password_verify($pass, $data['password'])){
			// set session
			$_SESSION['admin'] = $data;
			print_r($_SESSION);
			echo "<br>";
			echo "<a href='logout.php'>logout</a>";
			exit();
		}
	}

	// checking login creadential for akuntan
	$query = "SELECT * FROM akuntan WHERE email = '$email'";
	$sql = mysqli_query($db, $query)or die("Errror: " . mysqli_error($db));
	if(mysqli_num_rows($sql)){
		$data = mysqli_fetch_assoc($sql);
		if(password_verify($pass, $data['password'])){
			// set session
			$_SESSION['akuntan'] = $data;
			print_r($_SESSION);
			echo "<br>";
			echo "<a href='logout.php'>logout</a>";
			exit();
		}
	}

	// checking login creadential for siswa
	$query = "SELECT * FROM siswa WHERE email = '$email'";
	$sql = mysqli_query($db, $query)or die("Errror: " . mysqli_error($db));
	if(mysqli_num_rows($sql)){
		$data = mysqli_fetch_assoc($sql);
		if(password_verify($pass, $data['password'])){
			// set session
			$_SESSION['siswa'] = $data;
			print_r($_SESSION);
			echo "<br>";
			echo "<a href='logout.php'>logout</a>";
			exit();
		}
	}

}
elseif(isset($_POST['register'])){
	// print_r($_POST);

	$nama = antidos($_POST['nama']);
	$email = antidos($_POST['email']);
	$type = antidos($_POST['type']);
	$pass1 = antidos($_POST['pass1']);
	$pass2 = antidos($_POST['pass2']);

	// check username already exist
	if($type === "admin"){
		$query = "SELECT * FROM admin WHERE email = '$email'";
	}
	elseif($type === "akuntan"){
		$query = "SELECT * FROM akuntan WHERE email = '$email'";
	}
	elseif($type === 'siswa'){
		$query = "SELECT * FROM siswa WHERE email = '$email'";
	}

	$sql = mysqli_query($db, $query);

	if(mysqli_fetch_assoc($sql)){
		echo "
			<script>
				alert('email sudah terdaftar, harap menggunakan email lainnya');
				document.location.href = 'register.php';
			</script>
		";
		exit();
	}
	elseif($pass1 !== $pass2){
		echo "
			<script>
				alert('password tidak cocok');
				document.location.href = 'register.php';
			</script>
		";
		exit();
	}
	elseif(strlen($pass1) < 8 ){
		echo "
			<script>
				alert('minimal karakter password adalah 8 karakter');
				document.location.href = 'register.php';
			</script>
		";
		exit();
	}
	else{
		$password = password_hash($pass1, PASSWORD_DEFAULT);

		$qu_register = "INSERT INTO " . "$type" . " (nama, email, password) VALUES('$nama', '$email', '$password')";
		$sql_register = mysqli_query($db, $qu_register)or die("Error: " . mysqli_error($db));

		if($sql_register){
			echo "
			<script>
				alert('Pengguna Berhasil didaftarkan');
				document.location.href = 'login.php';
			</script>
		";
		exit();
		}
	}


}

?>