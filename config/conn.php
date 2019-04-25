<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'anugerah_tech';

$conn = mysqli_connect($host, $user, $pass,$db) or die ('Maintance');
		mysqli_select_db($conn,$db); 
?>