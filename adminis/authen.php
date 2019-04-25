<?php
	include '../config/conn.php';
	$konek = mysqli_connect('localhost','root','','anugerah_tech');
	function anti_injec($data){
		global $konek;
    	$filter = mysqli_real_escape_string($konek,stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
    	return $filter;
	}
	$username = anti_injec($_POST['username']);
	$password = md5(anti_injec($_POST['password']));
	$query =  mysqli_query($konek, "SELECT username, password FROM tb_admins WHERE username = '$username' AND password = '$password' ");
	$row = mysqli_num_rows($query);
	$fetch = mysqli_fetch_array($query);
	if($row>0){
		session_start();
		$_SESSION[username]   	= $fetch['username'];
		$_SESSION[password]   	= $fetch['password'];
		header('location:media.php?mod=dashboard');
	}
	else if($username != $fetch['username'] || $password != $fetch['password']){
		header('location:index.php?error=01');
	}
	else{
		printf("Errormessage: %s\n", mysqli_error($konek));
	}

?>