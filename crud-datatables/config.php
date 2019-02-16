<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$http = "https://";
$base_url = "caexampartners.com/uc/";
$base_url_admin = "caexampartners.com/uc/admin/";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error);}


 ?>