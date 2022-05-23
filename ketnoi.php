<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "sporter";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('kết nối thất bại.')</script>");
} 

?>