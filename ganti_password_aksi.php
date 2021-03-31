<?php
require_once("koneksi.php");
	$id = $_POST['id'];
	$password_baru = md5($_POST['password_baru']);

	$query=mysqli_query($koneksi,"update pelanggan set pelanggan_password='$password_baru' where pelanggan_id='$id'")or trigger_error(mysqli_error($koneksi)." in ");
	if($query){
		echo "<script>alert('Password Berhasil diupdate'); window.location.href = 'transaksi.php';</script>";
	}else{
		echo "<script>alert('Password update Data'); window.location.href = 'transaksi.php';</script>";
		echo mysqli_error();
	}
?>