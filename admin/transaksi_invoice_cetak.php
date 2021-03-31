<!DOCTYPE html>
<html>
<head>
<title>SPOKAT WASH</title>
<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
<script type="text/javascript" src="../assets/js/jquery.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
<link rel="shortcut icon" href="../assets/logo/favicon.ico">
</head>
<body>
<!-- cek apakah sudah login -->
<?php
session_start();
if($_SESSION['status']!="login"){
    header("location:../index.php?pesan=belum_login");
}
?>

<?php
include '../koneksi.php';
?>
<div class="container">

    <div class="col-md-10 col-md-offset-1">
        <?php
        $id = $_GET['id'];
        $transaksi = mysqli_query($koneksi,"select pelanggan.*,transaksi.*,layanan.* from transaksi 
                    INNER JOIN pelanggan ON transaksi.transaksi_pelanggan=Pelanggan.pelanggan_id
                    INNER JOIN layanan ON transaksi.id_layanan=layanan.id_layanan where transaksi_id='$id'");
        while($t=mysqli_fetch_array($transaksi)){
            ?>
            <center><h2>SPOKAT SHOES CARE LAUNDRY</h2></center>
            <h3>INVOICE-<?php echo $t['transaksi_id']; ?></h3>
            <br/>
            <table class="table">
                <tr>
                    <th width="20%">Tgl. Laundry</th>
                    <th>:</th>
                    <td><?php echo $t['transaksi_tgl']; ?></td>
                </tr>
                <tr>
                    <th>Nama Pelanggan</th>
                    <th>:</th>
                    <td><?php echo $t['pelanggan_nama']; ?></td>
                </tr>
                <tr>
                    <th>HP</th>
                    <th>:</th>
                    <td><?php echo $t['pelanggan_hp']; ?></td>
                </tr>
                <tr>
					<th>Alamat</th>
                    <th>:</th>
                    <td><?php echo $t['pelanggan_alamat']; ?></td>
                </tr>
                <tr>
                    <th>Jenis Layanan</th>
                    <th>:</th>
                    <td><?php echo $t['nama_layanan']; ?></td>
                </tr>
                <tr>
                    <th>Tgl. Selesai</th>
                    <th>:</th>
                    <td><?php echo $t['transaksi_tgl_selesai']; ?></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <th>:</th>
                    <td>
                        <?php
                        if($t['transaksi_status']=="0"){
                            echo "<div class='label label-warning'>PROSES</div>";
                        }else if($t['transaksi_status']=="1"){
                            echo "<div class='label label-info'>DI CUCI</div>";
                        }else if($t['transaksi_status']=="2"){
                            echo "<div class='label label-success'>SELESAI</div>";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Harga</th>
                    <th>:</th>
                    <td><?php echo "Rp. ".number_format($t['transaksi_harga'])." ,-"; ?></td>
                </tr>
            </table>
            <br/>
            <p><center><i>" SALAM BERSIH, SALAM WANGI ".</i></center></p>
            <?php
            }
            ?>
        </div>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
