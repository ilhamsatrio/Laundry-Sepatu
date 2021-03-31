<?php
require_once("../koneksi.php");
	$id = $_POST['id'];
	$transaksi_tgl_selesai = $_POST['transaksi_tgl_selesai'];
	$status = $_POST['status'];

	$query=mysqli_query($koneksi,"update transaksi set transaksi_tgl_selesai='$transaksi_tgl_selesai', transaksi_status='$status' where transaksi_id='$id'")or trigger_error(mysqli_error($koneksi)." in ");
	if($query){
		echo "<script>alert('Data Berhasil diupdate'); window.location.href = 'transaksi.php';</script>";
	}else{
		echo "<script>alert('Gagal update Data'); window.location.href = 'transaksi.php';</script>";
		echo mysqli_error();
	}
?>