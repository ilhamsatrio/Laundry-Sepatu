<?php
require_once("../koneksi.php");
	$pelanggan_id = $_POST['pelanggan_id'];
	$password = md5($_POST['pelanggan_password']);
	$query=mysqli_query($koneksi,"update pelanggan set pelanggan_password='$password' where pelanggan_id='$pelanggan_id'");
	if($query){
		echo "<script>alert('Data Berhasil diupdate'); window.location.href = 'pelanggan.php';</script>";
	}else{
		echo "<script>alert('Gagal update Data'); window.location.href = 'pelanggan.php';</script>";
		echo mysqli_error();
	}
?>