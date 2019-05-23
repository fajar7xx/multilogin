<?php  
require_once 'config/database.php';

// sesiion admin
if(isset($_SESSION['admin'])){
	print_r($_SESSION);
}
elseif(isset($_SESSION['akuntan'])){
	print_r($_SESSION);
}
elseif(isset($_SESSION['siswa'])){
	print_r($_SESSION);
}
else{
	echo "<script>
				alert('Akses Ditolak');
				document.location.href = 'login.php';
			</script>";
	exit();
}

?>