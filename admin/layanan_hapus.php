<?php
require_once("../koneksi.php");
$id = $_GET['id'];
$sql=mysqli_query($koneksi,"delete from layanan where id_layanan='$id'")or trigger_error(mysqli_error($koneksi)." in ");
if($sql){
	 echo "<script>alert('Data Berhasil dihapus'); window.location.href = 'layanan.php';</script>";
}else{
	echo "<script>alert('Gagal hapus data'); window.location.href = 'layanan.php';</script>";
}
?>