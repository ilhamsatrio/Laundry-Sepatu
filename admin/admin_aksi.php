<?php
require_once("../koneksi.php");
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  //mengecek username sama atau tidak
  $data = mysqli_query($koneksi,"select * from admin where username='$username'");
  $jumlah = mysqli_num_rows($data);
  $hasil = mysqli_fetch_assoc($data);
      if(!$username || !$password ){
         echo "<script>alert('Masih ada data Kosong'); window.location.href = 'admin_tambah.php';</script>";
      }else{
          if ($jumlah > 0){
          echo "<script>alert('Username ada yang sama'); window.location.href = 'admin_tambah.php';</script>";
          }else{
            $simpan = mysqli_query($koneksi,"INSERT INTO admin VALUES(null,
                                                                   '$username',
                                                                   '$password',
                                                                   'admin')")or trigger_error(mysqli_error($koneksi)." in ");
          }
      }
      if (!$simpan) {
          echo "<script>alert('Maaf gagal menambah admin'); window.location.href ='admin_tambah.php';</script>";
      }else{
        echo "<script>alert('Berhasil menambah admin'); window.location.href = 'listadmin.php';</script>";
      }
?>