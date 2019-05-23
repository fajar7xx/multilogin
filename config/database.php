<?php  
session_start();

date_default_timezone_set('Asia/Jakarta');

// error reportint
ini_set('display_errors', 1);
error_reporting(E_ALL);

$host = "localhost";
$username = "root";
$pass = "";
$database = "multilogin";

$db = mysqli_connect($host, $username, $pass, $database);

// cek koneksi ke database

if(!$db){
	echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

// echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
// echo "<br>";
// echo "Host information: " . mysqli_get_host_info($db) . PHP_EOL;
?>