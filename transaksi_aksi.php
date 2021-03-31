<?php
require_once("koneksi.php");
  $id_layanan = $_POST['id_layanan'];
  $transaksi_pelanggan = $_POST['transaksi_pelanggan'];
  $transaksi_jml_sepatu = $_POST['transaksi_jml_sepatu'];
  $transaksi_harga = $_POST['transaksi_harga'];
  $transaksi_status = 0;
  $transaksi_tgl = date('Y-m-d');
      if(!$id_layanan || !$transaksi_jml_sepatu || !$transaksi_harga ){
         echo "<script>alert('Masih ada data Kosong'); window.location.href = 'transaksi_tambah.php';</script>";
      }else{
          $simpan = mysqli_query($koneksi,"INSERT INTO transaksi VALUES(null,
                                                                   '$id_layanan',
                                                                   '$transaksi_pelanggan',
                                                                   '$transaksi_jml_sepatu',
                                                                   '$transaksi_harga',
                                                                   '$transaksi_status',
                                                                   '$transaksi_tgl',
                                                                    null)")or trigger_error(mysqli_error($koneksi)." in ");
      }
      if (!$simpan) {
          echo "<script>alert('Maaf gagal order'); window.location.href = 'transaksi_tambah.php';</script>";
      }else{
        echo "<script>alert('Berhasil order'); window.location.href = 'transaksi.php';</script>";
      }
?>