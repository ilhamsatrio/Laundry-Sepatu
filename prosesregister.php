<?php
require_once("koneksi.php");
  $nama = $_POST['nama'];
  $hp = $_POST['hp'];
  $alamat = $_POST['alamat'];
  $password = md5($_POST['password']);
  //mengecek username sama atau tidak
  $data = mysqli_query($koneksi,"select * from pelanggan where pelanggan_nama='$nama'");
  $jumlah = mysqli_num_rows($data);
  $hasil = mysqli_fetch_assoc($data);
      if(!$nama || !$hp || !$alamat || !$password ){
         echo "<script>alert('Masih ada data Kosong'); window.location.href = 'transaksi_tambah.php';</script>";
      }else{
          if ($jumlah > 0){
          echo "<script>alert('Nama ada yang sama'); window.location.href = 'register.php';</script>";
          }else{
            $simpan = mysqli_query($koneksi,"INSERT INTO pelanggan VALUES(null,
                                                                   '$nama',
                                                                   '$hp',
                                                                   '$alamat',
                                                                   '$password')")or trigger_error(mysqli_error($koneksi)." in ");
          }
      }
      if (!$simpan) {
          echo "<script>alert('Maaf gagal register'); window.location.href = 'register.php';</script>";
      }else{
        echo "<script>alert('Berhasil register'); window.location.href = 'login.php';</script>";
      }
?>