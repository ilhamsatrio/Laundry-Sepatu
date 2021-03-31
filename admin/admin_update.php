<?php
require_once("../koneksi.php");
	$id = $_POST['id'];
	$password = md5($_POST['password']);
	$query=mysqli_query($koneksi,"update admin set password='$password' where id='$id'");
	if($query){
		echo "<script>alert('Data Berhasil diupdate'); window.location.href = 'listadmin.php';</script>";
	}else{
		echo "<script>alert('Gagal update Data'); window.location.href = 'listadmin.php';</script>";
		echo mysqli_error();
	}
?>