<?php
include '../koneksi.php';
$id = $_POST['id'];
$pelanggan = $_POST['pelanggan'];
$id_layanan = $_POST['id_layanan'];
$tgl_selesai = $_POST['tgl_selesai'];
$status = $_POST['status'];


$query = mysqli_query($koneksi,"update transaksi set transaksi_pelanggan='$pelanggan',  transaksi_tgl_selesai='$tgl_selesai', transaksi_status='$status' where transaksi_id='$id'")or trigger_error(mysqli_error($koneksi)."in");

$jenis_sepatu = $_POST['jenis_sepatu'];
$jumlah_sepatu = $_POST['jumlah_sepatu'];
mysqli_query($koneksi,"delete from sepatu where sepatu_transaksi='$id'");
for($x=0;$x<count($jenis_sepatu);$x++){
    if($jenis_sepatu[$x] != ""){
        mysqli_query($koneksi,"insert into sepatu values('','$id','$jenis_sepatu[$x]','$jumlah_sepatu[$x]')");

    }
}
header("location:transaksi.php");
?>
