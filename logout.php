<?php  
session_start();

$session = [];
session_unset();
session_destroy();


echo "
			<script>
				alert('session sudah bersih');
				document.location.href = 'login.php';
			</script>
		";
// header('Location: login.php');
exit();
?>