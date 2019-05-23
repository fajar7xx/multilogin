<?php  
function query($query){
	global $db;

	$sql = mysqli_query($db, $query)or die("Error: " . mysqli_error($db));
	$data = mysqli_fetch_assoc($sql);

	return $data; 
}

?>