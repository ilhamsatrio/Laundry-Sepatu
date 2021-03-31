<?php
include '../koneksi.php';
$nama = $_POST['nama_layanan'];
$harga = $_POST['harga'];
$harga_r = str_replace(".","",$harga);
$deskripsi = $_POST['deskripsi'];
	if(!$nama || !$harga){
	  echo "<script>alert('Masih ada data Kosong'); window.location.href = 'layanan_tambah.php';</script>";
	}else{
	  $simpan = mysqli_query($koneksi,"insert into layanan values(null,'$nama','$deskripsi','$harga_r')")or trigger_error(mysqli_error($koneksi)." in ");
	}
	if (!$simpan) {
        echo "<script>alert('Maaf gagal menambah data'); window.location.href = 'layanan_tambah.php';</script>";
    }else{
        echo "<script>alert('Data Berhasil ditambah'); window.location.href = 'layanan.php';</script>";
    }
?>
