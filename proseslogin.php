<?php 
session_start();
include 'koneksi.php';
$pelanggan_nama = $_POST['pelanggan_nama'];
$pelanggan_password = md5($_POST['pelanggan_password']);
$data = mysqli_query($koneksi,"select * from pelanggan where pelanggan_nama='$pelanggan_nama' and pelanggan_password='$pelanggan_password'");
$cek = mysqli_num_rows($data);
$hasil = mysqli_fetch_assoc($data);

if($cek > 0){
    $_SESSION['pelanggan_nama'] = $pelanggan_nama;
    $_SESSION['pelanggan_id'] =  $hasil['pelanggan_id'];
    $_SESSION['status'] = "login";
    header("location:index.php");
}else{
    header("location:login.php?pesan=gagal");
}
?>
