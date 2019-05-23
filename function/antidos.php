<?php  
function antidos($data){
	global $db;

	$sql = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));
	$sql = mysqli_real_escape_string($db, $sql);

	return $sql;
}

?>