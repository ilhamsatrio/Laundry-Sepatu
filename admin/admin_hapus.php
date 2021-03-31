<?php
require_once("../koneksi.php");
$id = $_GET['id'];
$sql=mysqli_query($koneksi,"delete from admin where id='$id'")or trigger_error(mysqli_error($koneksi)." in ");
if($sql){
	 echo "<script>alert('Data Berhasil dihapus'); window.location.href = 'listadmin.php';</script>";
}else{
	echo "<script>alert('Gagal hapus data'); window.location.href = 'listadmin.php';</script>";
}
?>